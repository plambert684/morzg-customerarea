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

    $VMInfo = $proxmox->get('/nodes/virt1/qemu/'. $_GET["vmid"] .'/status/current');

    $NetworkIN = $VMInfo['data']['nics']['tap' . $_GET["vmid"] .'i0']['netin'];
    $sizeInBytes = $NetworkIN; // 2 gigabytes en bytes
    $NetworkIN = $sizeInBytes / pow(1024, 3); // 1024 bytes = 1 kilobyte, 1024 kilobytes = 1 megabyte, 1024 megabytes = 1 gigabyte
    $NetworkIN = round($NetworkIN, 2);

    echo $NetworkIN;