<?php

namespace Clientarea\Model\TicketStatuses;

require_once('src/lib/Database.php');

use Clientarea\Lib\Database\DatabaseConnection;

class TicketStatusesRepository {

    public DatabaseConnection $connection;

    public function get() {

        $TicketStatuses = [];

        $statement = $this->connection->getConnection()->prepare('SELECT * FROM `support_ticket_status`');
        $statement->execute();
        while($getTicketStatuses = $statement->fetch()) {
            $TicketStatus = new TicketStatusesRepository();
            $TicketStatus->id = $getTicketStatuses['id'];
            $TicketStatus->name = $getTicketStatuses['name'];
            $TicketStatus->color = $getTicketStatuses['color'];
            $TicketStatus->icon = $getTicketStatuses['icon'];

            $TicketStatuses[] = $TicketStatus;
        }

        return $TicketStatuses;

    }

}