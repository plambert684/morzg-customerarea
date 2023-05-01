<?php

    namespace Clientarea\Model\Orders\Get;

    require_once('src/lib/Database.php');

    use Clientarea\Lib\Database\DatabaseConnection;

    class OrderRepository {

        public DatabaseConnection $connection;

        public function count($userId) {

            $counter = 0;
            $statement = $this->connection->getConnection()->prepare('SELECT * FROM `order` WHERE `user_id` = ?');
            $statement->execute(array($userId));
            while($getOrder = $statement->fetch()) {
                $counter = $counter + 1;
            }

            return $counter;


        }

        public function getByInvoice($invoiceId) {

            $statement = $this->connection->getConnection()->prepare('SELECT * FROM `order` WHERE `invoice_id` = ?');
            $statement->execute(array($invoiceId));
            $get_order = $statement->fetch();

            $order = new OrderRepository();

            $order->id = $get_order['id'];
            $order->date = $get_order['date'];
            $order->total_price = $get_order['total_price'];

            return $order;

        }

    }