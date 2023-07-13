<?php

    require_once('src/lib/Database.php');
    require_once('src/models/users/GetUserModel.php');
    require_once('src/models/services/GetServiceModel.php');
    require_once('src/models/services/settings/GetServiceSettingsModel.php');

    require_once('src/models/services/analystics/GetServiceCPUModel.php');

    require_once('src/models/proxmoxServer/GetProxmoxServer.php');
    require_once('src/services/proxmox/connectProxmox.php');

    use Clientarea\Lib\Database\DatabaseConnection;
    use Clientarea\Model\Users\Get\UserRepository;
    use Clientarea\Model\Services\Get\ServiceRepository;
    use Clientarea\Model\Services\Settings\Get\ServiceSettingsRepository;

    use Clientarea\Model\Services\Analystics\ServiceCPUAnalysticsRepository;

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

        $ServiceCPUAnalystics = new ServiceCPUAnalysticsRepository();
        $ServiceCPUAnalystics->connection = new DatabaseConnection();

        $ProxmoxConnect = new Connect();

        $getUser = $User->getUser($_SESSION['user_id']);
        $getServices = $Service->getAllByUser($_SESSION['user_id']);
        $getServiceSettings = $ServiceSettings->get($_GET['id']);
        $getProxmoxServer = $ProxmoxServer->get($getServiceSettings->proxmox_server_id);
        $getServiceCPUAnalystics = $ServiceCPUAnalystics->get($_GET['id']);
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

        if($CPUconsumption > 50) {
            $_SESSION['message'] = '<div class="alert alert-important alert-info alert-dismissible" role="alert"><div class="d-flex"><div><svg xmlns="http://www.w3.org/2000/svg" class="icon alert-icon" width="44" height="44" viewBox="0 0 24 24" stroke-width="1.5" stroke="#ffffff" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M5 5m0 1a1 1 0 0 1 1 -1h12a1 1 0 0 1 1 1v12a1 1 0 0 1 -1 1h-12a1 1 0 0 1 -1 -1z" /><path d="M8 10v-2h2m6 6v2h-2m-4 0h-2v-2m8 -4v-2h-2" /><path d="M3 10h2" /><path d="M3 14h2" /><path d="M10 3v2" /><path d="M14 3v2" /><path d="M21 10h-2" /><path d="M21 14h-2" /><path d="M14 21v-2" /><path d="M10 21v-2" /></svg></div><div>La consomation du CPU est relativement élevée.</div></div>';
        } if($CPUconsumption > 95) {
            $_SESSION['message'] = '<div class="alert alert-important alert-danger alert-dismissible" role="alert"><div class="d-flex"><div><svg xmlns="http://www.w3.org/2000/svg" class="icon alert-icon" width="44" height="44" viewBox="0 0 24 24" stroke-width="1.5" stroke="#ffffff" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M5 5m0 1a1 1 0 0 1 1 -1h12a1 1 0 0 1 1 1v12a1 1 0 0 1 -1 1h-12a1 1 0 0 1 -1 -1z" /><path d="M8 10v-2h2m6 6v2h-2m-4 0h-2v-2m8 -4v-2h-2" /><path d="M3 10h2" /><path d="M3 14h2" /><path d="M10 3v2" /><path d="M14 3v2" /><path d="M21 10h-2" /><path d="M21 14h-2" /><path d="M14 21v-2" /><path d="M10 21v-2" /></svg></div><div>La consomation du CPU est relativement excessive.</div></div>';
        }

        require('views/Services/ServiceView.php');

    }