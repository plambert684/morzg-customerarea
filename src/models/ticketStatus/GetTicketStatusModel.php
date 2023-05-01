<?php

namespace Clientarea\Model\TicketStatus;

require_once('src/lib/Database.php');

use Clientarea\Lib\Database\DatabaseConnection;

class TicketStatusRepository {

    public DatabaseConnection $connection;

    public function get($ticket_status_id) {

        $statement = $this->connection->getConnection()->prepare('SELECT * FROM `support_ticket_status` WHERE id = ?');
        $statement->execute(array($ticket_status_id));
        $getTicketStatus = $statement->fetch();
        $checkResult = $statement->rowCount();

        if($checkResult > 0) {
            $TicketStatus = new TicketStatusRepository();
            $TicketStatus->id = $getTicketStatus['id'];
            $TicketStatus->name = $getTicketStatus['name'];
        } else {
            $TicketStatus = null;
        }

        return $TicketStatus;

    }

}