<?php

namespace Clientarea\Model\Services\Analystics;

require_once('src/lib/Database.php');

use Clientarea\Lib\Database\DatabaseConnection;

class ServiceCPUAnalysticsRepository {

    public DatabaseConnection $connection;

    public function get($serviceId) {

        $ServiceCPUAnalystics = [];

        $statement = $this->connection->getConnection()->prepare('SELECT * FROM `service_cpu_analystic` WHERE `service_id` = ? ORDER BY id ASC LIMIT 10');
        $statement->execute(array($serviceId));
        while($getServiceCPUAnalystic = $statement->fetch()) {

            $ServiceCPUAnalystic = new ServiceCPUAnalysticsRepository();

            $ServiceCPUAnalystic->id = $getServiceCPUAnalystic['id'];
            $ServiceCPUAnalystic->value = $getServiceCPUAnalystic['value'];
            $ServiceCPUAnalystic->date = $getServiceCPUAnalystic['date'];

            $ServiceCPUAnalystics[] = $ServiceCPUAnalystic;
        }

        return $ServiceCPUAnalystics;

    }

    public function post($value, $date, $serviceId) {

        $statement = $this->connection->getConnection()->prepare('INSERT INTO `service_cpu_analystic` (value, date, service_id) VALUES (?, ?, ?)');
        $statement->execute(array($value, $date, $serviceId));

    }

}