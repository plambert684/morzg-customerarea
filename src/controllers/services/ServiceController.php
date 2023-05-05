<?php

    require_once('src/lib/Database.php');
    require_once('src/models/users/GetUserModel.php');
    require_once('src/models/services/GetServiceModel.php');
    require_once('src/models/services/settings/GetServiceSettingsModel.php');
    require_once('src/models/proxmoxServer/GetProxmoxServer.php');
    require_once('src/services/proxmox/connectProxmox.php');

    use Clientarea\Lib\Database\DatabaseConnection;
    use Clientarea\Model\Users\Get\UserRepository;
    use Clientarea\Model\Services\Get\ServiceRepository;
    use Clientarea\Model\Services\Settings\Get\ServiceSettingsRepository;
    use Customerarea\Model\ProxmoxServer\Get\ProxmoxServerRepository;
    use Clientarea\Service\Proxmox\Connect;

    function servicePage() {

        $User = new UserRepository();
        $User->connection = new DatabaseConnection();

        $Service = new ServiceRepository();
        $Service->connection = new DatabaseConnection();

        $ServiceSettings = new ServiceSettingsRepository();
        $ServiceSettings->connection = new DatabaseConnection();

        $ProxmoxServer = new ProxmoxServerRepository();
        $ProxmoxServer->connection = new DatabaseConnection();

        $ProxmoxConnect = new Connect();

        $getUser = $User->getUser($_SESSION['user_id']);
        $getServices = $Service->getAll($_SESSION['user_id']);
        $getServiceSettings = $ServiceSettings->get($_GET['id']);
        $getProxmoxServer = $ProxmoxServer->get($getServiceSettings->proxmox_server_id);
        $getProxmoxConnect = $ProxmoxConnect->send($getProxmoxServer->ip_address, $getProxmoxServer->user, $getProxmoxServer->password);

        $lang = $getUser->lang;

        $file = file_get_contents("lang/$lang.json");
        $langData = json_decode($file, true);

        #PROXMOX
        require_once('src/services/proxmox/connectProxmox.php');

        $VMInfo = $getProxmoxConnect->get('/nodes/'. $getProxmoxServer->hostname .'/qemu/'.$getServiceSettings->vm_id.'/status/current');

        $NetworkIN = $VMInfo['data']['nics']['tap' . "$getServiceSettings->vm_id" .'i0']['netin'];
        $sizeInBytes = $NetworkIN; // 2 gigabytes en bytes
        $NetworkIN = $sizeInBytes / pow(1024, 3); // 1024 bytes = 1 kilobyte, 1024 kilobytes = 1 megabyte, 1024 megabytes = 1 gigabyte
        $NetworkIN = round($NetworkIN, 2);

        $NetworkOUT = $VMInfo['data']['nics']['tap' . "$getServiceSettings->vm_id" .'i0']['netout'];
        $sizeInBytes = $NetworkOUT; // 2 gigabytes en bytes
        $NetworkOUT = $sizeInBytes / pow(1024, 3); // 1024 bytes = 1 kilobyte, 1024 kilobytes = 1 megabyte, 1024 megabytes = 1 gigabyte
        $NetworkOUT = round($NetworkOUT, 2);

        #Mettre en forme le pourcentage de CPU utilisé
        $CPUconsumption = $VMInfo['data']['cpu'];
        $CPUconsumption = $CPUconsumption * 100;
        $CPUconsumption = round($CPUconsumption, 2);

        require('views/Services/ServiceView.php');

    }