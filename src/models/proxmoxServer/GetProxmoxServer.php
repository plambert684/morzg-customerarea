<?php

    namespace Customerarea\Model\proxmoxServer\Get;

    require_once('src/lib/Database.php');

    use Clientarea\Lib\Database\DatabaseConnection;

    class ProxmoxServerRepository {

        public DatabaseConnection $connection;

        public function get($proxmoxServerID) {

            $statement = $this->connection->getConnection()->prepare('SELECT * FROM `proxmox_server` WHERE `id` = ?');
            $statement->execute(array($proxmoxServerID));
            $result = $statement->fetch();
            $checkResult = $statement->rowCount();
            if($checkResult > 0) {
                $ProxmoxServer = new ProxmoxServerRepository();
                $ProxmoxServer->id = $result['id'];
                $ProxmoxServer->hostname = $result['hostname'];
                $ProxmoxServer->ip_address = $result['ip_address'];
                $ProxmoxServer->user = $result['user'];
                $ProxmoxServer->password = $result['password'];
            } else {
                $ProxmoxServer = null;
            }

            return $ProxmoxServer;

        }

    }