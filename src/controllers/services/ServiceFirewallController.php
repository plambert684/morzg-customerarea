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

function serviceFirewallPage() {

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

    $VMFirewallRules = $getProxmoxConnect->get('/nodes/'. $getProxmoxServer->hostname .'/qemu/'.$getServiceSettings->vm_id.'/firewall/rules');
    $VMFirewallIPset = $getProxmoxConnect->get('/nodes/'. $getProxmoxServer->hostname .'/qemu/'.$getServiceSettings->vm_id.'/firewall/ipset');
    $VMFirewallAliases = $getProxmoxConnect->get('/nodes/'. $getProxmoxServer->hostname .'/qemu/'.$getServiceSettings->vm_id.'/firewall/aliases');


    $count = 0;
    foreach($VMFirewallIPset['data'] as $element) {
        $count++;
    }

    if($count == 0) {
        $_SESSION['message'] = '<div class="alert alert-important alert-info alert-dismissible" role="alert"><div class="d-flex"><div><!-- Download SVG icon from http://tabler-icons.io/i/info-circle --><svg xmlns="http://www.w3.org/2000/svg" class="icon alert-icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0" /><path d="M12 8l.01 0" /><path d="M11 12l1 0l0 4l1 0" /></svg></div><div>Pour créer des règles vous devez ajouter au moins un groupe d\'IP/CIDR</div></div>';
    }

    if(isset($_POST['submit'])) {
        extract($_POST);
        $direction = htmlspecialchars($direction);
        $action = htmlspecialchars($action);
        $service = htmlspecialchars($service);
        $src = htmlspecialchars($src);
        $dst = htmlspecialchars($dst);
        $priority = htmlspecialchars($priority);
        if(($service == "HTTP")||($service == "HTTPS")||($service == "Ping")) {
            $firewallRuleData = [
                'type' => $direction,
                'action' => $action,
                'macro' => $service,
                'source' => $src,
                'dest' => $dst,
                'pos' => $priority,
                'enable' => '1',
            ];

            try {
                $getProxmoxConnect->create('/nodes/'. $getProxmoxServer->hostname .'/qemu/'.$getServiceSettings->vm_id.'/firewall/rules', $firewallRuleData);
            } catch (Exception $error_message) {
                $_SESSION['message'] = '<div class="alert alert-important alert-danger alert-dismissible" role="alert"><div class="d-flex"><div><svg xmlns="http://www.w3.org/2000/svg" class="icon alert-icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M9 9v-1a3 3 0 0 1 6 0v1"></path><path d="M8 9h8a6 6 0 0 1 1 3v3a5 5 0 0 1 -10 0v-3a6 6 0 0 1 1 -3"></path><path d="M3 13l4 0"></path><path d="M17 13l4 0"></path><path d="M12 20l0 -6"></path><path d="M4 19l3.35 -2"></path><path d="M20 19l-3.35 -2"></path><path d="M4 7l3.75 2.4"></path><path d="M20 7l-3.75 2.4"></path></svg></div><div>Une erreur système est survenue. Veuillez réessayez.</div></div>';
            }

            if(!isset($error_message)) {
                header('Location: index.php?page=ServiceFirewall&id='. $_GET['id']);
            }

        } else {
            $_SESSION['message'] = '<div class="alert alert-important alert-danger alert-dismissible" role="alert"><div class="d-flex"><div><!-- Download SVG icon from http://tabler-icons.io/i/info-circle --><svg xmlns="http://www.w3.org/2000/svg" class="icon alert-icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0" /><path d="M12 8l.01 0" /><path d="M11 12l1 0l0 4l1 0" /></svg></div><div>L\'un des champs n\'est pas correct, veuillez réessayez.</div></div>';
        }
    }

    if(isset($_POST['submitCreateIPCIDRGroup'])) {
        extract($_POST);
        $name = htmlspecialchars($name);
        if(isset($name)) {
            $ipsetData = [
                'name' => $name,
            ];

            try {
                $getProxmoxConnect->create('/nodes/'. $getProxmoxServer->hostname .'/qemu/'.$getServiceSettings->vm_id.'/firewall/ipset', $ipsetData);
            } catch (Exception $error_message) {
                $_SESSION['message'] = '<div class="alert alert-important alert-danger alert-dismissible" role="alert"><div class="d-flex"><div><svg xmlns="http://www.w3.org/2000/svg" class="icon alert-icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M9 9v-1a3 3 0 0 1 6 0v1"></path><path d="M8 9h8a6 6 0 0 1 1 3v3a5 5 0 0 1 -10 0v-3a6 6 0 0 1 1 -3"></path><path d="M3 13l4 0"></path><path d="M17 13l4 0"></path><path d="M12 20l0 -6"></path><path d="M4 19l3.35 -2"></path><path d="M20 19l-3.35 -2"></path><path d="M4 7l3.75 2.4"></path><path d="M20 7l-3.75 2.4"></path></svg></div><div>Une erreur système est survenue. Veuillez réessayez.</div></div>';
            }

            if(!isset($error_message)) {
                header('Location: index.php?page=ServiceFirewall&id='. $_GET['id']);
            }

        } else {
            $_SESSION['message'] = '<div class="alert alert-important alert-danger alert-dismissible" role="alert"><div class="d-flex"><div><!-- Download SVG icon from http://tabler-icons.io/i/info-circle --><svg xmlns="http://www.w3.org/2000/svg" class="icon alert-icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0" /><path d="M12 8l.01 0" /><path d="M11 12l1 0l0 4l1 0" /></svg></div><div>L\'un des champs n\'est pas correct, veuillez réessayez.</div></div>';
        }
    }

    if(isset($_POST['submitCreateIPCIDR'])) {
        extract($_POST);
        $name = htmlspecialchars($name);
        $ipcidr = htmlspecialchars($ipcidr);
        if(isset($name)) {
            $cidrData = [
                'name' => $name,
                'cidr' => $ipcidr,
            ];

            try {
                $getProxmoxConnect->create('/nodes/'. $getProxmoxServer->hostname .'/qemu/'.$getServiceSettings->vm_id.'/firewall/aliases', $cidrData);
            } catch (Exception $error_message) {
                $_SESSION['message'] = '<div class="alert alert-important alert-danger alert-dismissible" role="alert"><div class="d-flex"><div><svg xmlns="http://www.w3.org/2000/svg" class="icon alert-icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M9 9v-1a3 3 0 0 1 6 0v1"></path><path d="M8 9h8a6 6 0 0 1 1 3v3a5 5 0 0 1 -10 0v-3a6 6 0 0 1 1 -3"></path><path d="M3 13l4 0"></path><path d="M17 13l4 0"></path><path d="M12 20l0 -6"></path><path d="M4 19l3.35 -2"></path><path d="M20 19l-3.35 -2"></path><path d="M4 7l3.75 2.4"></path><path d="M20 7l-3.75 2.4"></path></svg></div><div>Une erreur système est survenue. Veuillez réessayez.</div></div>';
            }

            if(!isset($error_message)) {
                header('Location: index.php?page=ServiceFirewall&id='. $_GET['id']);
            }

        } else {
            $_SESSION['message'] = '<div class="alert alert-important alert-danger alert-dismissible" role="alert"><div class="d-flex"><div><!-- Download SVG icon from http://tabler-icons.io/i/info-circle --><svg xmlns="http://www.w3.org/2000/svg" class="icon alert-icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0" /><path d="M12 8l.01 0" /><path d="M11 12l1 0l0 4l1 0" /></svg></div><div>L\'un des champs n\'est pas correct, veuillez réessayez.</div></div>';
        }
    }

    require('views/Services/ServiceFirewallView.php');

}