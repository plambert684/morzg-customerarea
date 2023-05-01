<?php

namespace Clientarea\Model\Ticket\Get;

require_once('src/lib/Database.php');

use Clientarea\Lib\Database\DatabaseConnection;

class TicketRepository {

    public DatabaseConnection $connection;

    public function count($userId) {

        $counter = 0;
        $statement = $this->connection->getConnection()->prepare('SELECT * FROM `support_ticket` WHERE `user_id` = ?');
        $statement->execute(array($userId));
        while($getTicket = $statement->fetch()) {
            $counter = $counter + 1;
        }

        return $counter;


    }

}