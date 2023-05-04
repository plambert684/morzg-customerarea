<?php

    namespace Clientarea\Service\Proxmox;

    // Require the autoloader
    require_once('vendor/autoload.php');

    // Use the library namespace
    use ProxmoxVE\Proxmox;

    class Connect {

        public function send($ipaddress, $user, $password) {

            // Create your credentials array
            $credentials = [
                'hostname' => $ipaddress,  // Also can be an IP
                'username' => $user,
                'password' => $password,
            ];

            // Then simply pass your credentials when creating the API client object.
            $proxmox = new Proxmox($credentials);

            return $proxmox;
        }

    }
