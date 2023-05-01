<?php

namespace Clientarea\Model\TicketDepartments;

require_once('src/lib/Database.php');

use Clientarea\Lib\Database\DatabaseConnection;

class TicketDepartmentsRepository {

    public DatabaseConnection $connection;

    public function get() {

        $TicketDepartments = [];

        $statement = $this->connection->getConnection()->prepare('SELECT * FROM `support_ticket_department`');
        $statement->execute();
        while($getTicketDepartment = $statement->fetch()) {
            $TicketDepartment = new TicketDepartmentsRepository();
            $TicketDepartment->id = $getTicketDepartment['id'];
            $TicketDepartment->name = $getTicketDepartment['name'];

            $TicketDepartments[] = $TicketDepartment;
        }

        return $TicketDepartments;

    }

}