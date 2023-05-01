<?php

    // Require the autoloader
    require_once 'vendor/autoload.php';

    // Use the library namespace
    use ProxmoxVE\Proxmox;

    // Create your credentials array
    $credentials = [
        'hostname' => '192.168.2.43',  // Also can be an IP
        'username' => 'root',
        'password' => 'Paul123/',
    ];

    // Then simply pass your credentials when creating the API client object.
    $proxmox = new Proxmox($credentials);
