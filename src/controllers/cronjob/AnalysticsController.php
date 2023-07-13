<?php

require_once('src/lib/Database.php');
require_once('src/models/services/GetServiceModel.php');

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

function AnalysticsCronjob() {

    $Service = new ServiceRepository();
    $Service->connection = new DatabaseConnection();

    $ServiceSettings = new ServiceSettingsRepository();
    $ServiceSettings->connection = new DatabaseConnection();

    $ProxmoxServer = new ProxmoxServerRepository();
    $ProxmoxServer->connection = new DatabaseConnection();

    $ServiceCPUAnalystics = new ServiceCPUAnalysticsRepository();
    $ServiceCPUAnalystics->connection = new DatabaseConnection();

    $ProxmoxConnect = new Connect();

    $getAllServices = $Service->getAll();

    foreach ($getAllServices as $GetService) {
        $getServiceSettings = $ServiceSettings->get($GetService->id);
        $getProxmoxServer = $ProxmoxServer->get($getServiceSettings->proxmox_server_id);
        $getProxmoxConnect = $ProxmoxConnect->send($getProxmoxServer->ip_address, $getProxmoxServer->user, $getProxmoxServer->password);

        #PROXMOX
        require_once('src/services/proxmox/connectProxmox.php');

        $VMInfo = $getProxmoxConnect->get('/nodes/'. $getProxmoxServer->hostname .'/qemu/'.$getServiceSettings->vm_id.'/status/current');

        #Mettre en forme le pourcentage de CPU utilisé
        $CPUconsumption = $VMInfo['data']['cpu'];
        $CPUconsumption = $CPUconsumption * 100;
        $CPUconsumption = round($CPUconsumption, 2);

        $time = date("H:i");

        $ServiceCPUAnalystics->post($CPUconsumption, $time, $GetService->id);
    }

}