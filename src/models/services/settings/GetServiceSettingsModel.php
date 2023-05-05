<?php

    namespace Clientarea\Model\Services\Settings\Get;

    require_once('src/lib/Database.php');

    use Clientarea\Lib\Database\DatabaseConnection;

    class ServiceSettingsRepository {

        public DatabaseConnection $connection;

        public function get($serviceId) {

            $statement = $this->connection->getConnection()->prepare('SELECT * FROM `service_setting` WHERE `service_id` = ?');
            $statement->execute(array($serviceId));
            $result = $statement->fetch();
            $ServiceSettings = new ServiceSettingsRepository();

            $ServiceSettings->id = $result['id'];
            $ServiceSettings->domain = $result['domain'];
            $ServiceSettings->ip_address = $result['ip_address'];
            $ServiceSettings->vm_id = $result['vm_id'];
            $ServiceSettings->proxmox_server_id = $result['proxmox_server_id'];
            $ServiceSettings->service_id = $result['service_id'];

            return $ServiceSettings;

        }

    }