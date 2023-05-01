<?php

namespace Clientarea\Model\Tickets\Get;

require_once('src/lib/Database.php');

use Clientarea\Lib\Database\DatabaseConnection;

class TicketsRepository {

    public DatabaseConnection $connection;

    public function get($userId) {

        $Tickets = [];

        $statement = $this->connection->getConnection()->prepare('SELECT * FROM `support_ticket` WHERE `user_id` = ?');
        $statement->execute(array($userId));
        while($getTicket = $statement->fetch()) {

            $Ticket = new TicketsRepository();

            $Ticket->id = $getTicket['id'];
            $Ticket->subject = $getTicket['subject'];
            $Ticket->department_id = $getTicket['department_id'];
            $Ticket->service_concerned_id = $getTicket['service_concerned_id'];
            if($getTicket['manager_id'] != null) {
                $Ticket->manager_id = $getTicket['manager_id'];
            }
            $Ticket->user_id = $getTicket['user_id'];
            $Ticket->status = $getTicket['status'];

            $Tickets[] = $Ticket;

        }

        return $Tickets;

    }

}