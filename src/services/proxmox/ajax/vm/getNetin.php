<?php

    require_once('src/models/services/GetServiceModel.php');
    require_once('src/models/services/settings/GetServiceSettingsModel.php');
    require_once('src/models/proxmoxServer/GetProxmoxServer.php');
    require_once('src/services/proxmox/connectProxmox.php');

    use Clientarea\Model\Services\Get\ServiceRepository;
    use Clientarea\Model\Services\Settings\Get\ServiceSettingsRepository;
    use Customerarea\Model\ProxmoxServer\Get\ProxmoxServerRepository;
    use Clientarea\Service\Proxmox\Connect;

    $Service = new ServiceRepository();
    $Service->connection = new DatabaseConnection();

    $ServiceSettings = new ServiceSettingsRepository();
    $ServiceSettings->connection = new DatabaseConnection();

    $ProxmoxServer = new ProxmoxServerRepository();
    $ProxmoxServer->connection = new DatabaseConnection();

    $ProxmoxConnect = new Connect();

    $getServices = $Service->getAll($_SESSION['user_id']);
    $getServiceSettings = $ServiceSettings->get($_GET['id']);
    $getProxmoxServer = $ProxmoxServer->get($getServiceSettings->proxmox_server_id);
    $getProxmoxConnect = $ProxmoxConnect->send($getProxmoxServer->ip_address, $getProxmoxServer->user, $getProxmoxServer->password);

    $VMInfo = $getProxmoxConnect->get('/nodes/virt1/qemu/'. $_GET["vmid"] .'/status/current');

    $NetworkIN = $VMInfo['data']['nics']['tap' . $_GET["vmid"] .'i0']['netin'];
    $sizeInBytes = $NetworkIN; // 2 gigabytes en bytes
    $NetworkIN = $sizeInBytes / pow(1024, 3); // 1024 bytes = 1 kilobyte, 1024 kilobytes = 1 megabyte, 1024 megabytes = 1 gigabyte
    $NetworkIN = round($NetworkIN, 2);

    echo $NetworkIN;