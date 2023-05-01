<?php

namespace Clientarea\Model\Orders\OrderDetails\Get;

require_once('src/lib/Database.php');

use Clientarea\Lib\Database\DatabaseConnection;

class OrderDetailsRepository {

    public function getByOrder($orderId) {
        
        $order_details = [];

        $statement = $this->connection->getConnection()->prepare('SELECT * FROM `order_detail` WHERE `order_id` = ?');
        $statement->execute(array($orderId));
        while($get_order_details = $statement->fetch()) {

            $order_detail = new OrderDetailsRepository();

            $order_detail->id = $get_order_details['id'];
            $order_detail->price = $get_order_details['price'];
            $order_detail->product_name = $get_order_details['product_name'];

            $order_details[] = $order_detail;

        }

        return $order_details;

    }

}