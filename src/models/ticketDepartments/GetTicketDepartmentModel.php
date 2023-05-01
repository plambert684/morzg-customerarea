<?php

namespace Clientarea\Model\TicketDepartment;

require_once('src/lib/Database.php');

use Clientarea\Lib\Database\DatabaseConnection;

class TicketDepartmentRepository {

    public DatabaseConnection $connection;

    public function get($ticket_department_id) {

        $statement = $this->connection->getConnection()->prepare('SELECT * FROM `support_ticket_department` WHERE id = ?');
        $statement->execute(array($ticket_department_id));
        $getTicketDepartment = $statement->fetch();
        $checkResult = $statement->rowCount();

        if($checkResult > 0) {
            $TicketDepartment = new TicketDepartmentRepository();
            $TicketDepartment->id = $getTicketDepartment['id'];
            $TicketDepartment->name = $getTicketDepartment['name'];
        } else {
            $TicketDepartment = null;
        }

        return $TicketDepartment;

    }

}