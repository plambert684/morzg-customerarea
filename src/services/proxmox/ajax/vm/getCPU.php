<?php

    // Require the autoloader
    require_once '/var/www/clientarea/vendor/autoload.php';

    // Use the library namespace
    use ProxmoxVE\Proxmox;

    // Create your credentials array
    $credentials = [
        'hostname' => '178.63.66.159',  // Also can be an IP
        'username' => 'root',
        'password' => 'WfadWcqsumw4LP',
    ];

    // Then simply pass your credentials when creating the API client object.
    $proxmox = new Proxmox($credentials);

    $allNodes = $proxmox->get('/nodes/virt1/qemu/'. $_GET["vmid"] .'/status/current');

    echo $allNodes['data']['cpu'];