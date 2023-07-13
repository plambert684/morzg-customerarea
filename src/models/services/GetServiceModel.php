<?php

    namespace Clientarea\Model\Services\Get;

    require_once('src/lib/Database.php');

    use Clientarea\Lib\Database\DatabaseConnection;

    class ServiceRepository {

        public DatabaseConnection $connection;

        public function count($userId) {

            $counter = 0;
            $statement = $this->connection->getConnection()->prepare('SELECT * FROM `service` WHERE `user_id` = ?');
            $statement->execute(array($userId));
            while($getService = $statement->fetch()) {
                $counter = $counter + 1;
            }

            return $counter;

        }

        public function getAll() {

            $Services = [];

            $statement = $this->connection->getConnection()->prepare('SELECT * FROM `service`');
            $statement->execute();
            while($getService = $statement->fetch()) {
                $Service = new ServiceRepository();
                $Service->id = $getService['id'];
                $Service->order_date = $getService['order_date'];
                $Service->due_date = $getService['due_date'];
                if($getService['end_date'] != null) {
                    $Service->order_date = $getService['end_date'];
                }
                $Service->product_id = $getService['product_id'];
                $Service->order_id = $getService['order_id'];
                $Service->user_id = $getService['user_id'];
                $Service->status = $getService['status'];

                $Services[] = $Service;

            }

            return $Services;

        }

        public function getAllByUser($userId) {

            $Services = [];

            $statement = $this->connection->getConnection()->prepare('SELECT * FROM `service` WHERE `user_id` = ?');
            $statement->execute(array($userId));
            while($getService = $statement->fetch()) {
                $Service = new ServiceRepository();
                $Service->id = $getService['id'];
                $Service->order_date = $getService['order_date'];
                $Service->due_date = $getService['due_date'];
                if($getService['end_date'] != null) {
                    $Service->order_date = $getService['end_date'];
                }
                $Service->product_id = $getService['product_id'];
                $Service->order_id = $getService['order_id'];
                $Service->user_id = $getService['user_id'];
                $Service->status = $getService['status'];

                $Services[] = $Service;

            }

            return $Services;

        }

        public function getByProduct($productId) {

            $Services = [];

            $statement = $this->connection->getConnection()->prepare('SELECT * FROM `service` WHERE `product_id` = ?');
            $statement->execute(array($productId));
            while($getService = $statement->fetch()) {
                $Service = new ServiceRepository();
                $Service->id = $getService['id'];
                $Service->order_date = $getService['order_date'];
                $Service->due_date = $getService['due_date'];
                if($getService['end_date'] != null) {
                    $Service->order_date = $getService['end_date'];
                }
                $Service->product_id = $getService['product_id'];
                $Service->order_id = $getService['order_id'];
                $Service->user_id = $getService['user_id'];
                $Service->status = $getService['status'];

                $Services[] = $Service;

            }

            return $Services;

        }

    }