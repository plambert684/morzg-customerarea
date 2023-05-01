<?php

namespace Clientarea\Model\Products\Get;

require_once('src/lib/Database.php');

use Clientarea\Lib\Database\DatabaseConnection;
use Clientarea\Model\Products\Get\ServiceRepository;

class ProductRepository {

    public DatabaseConnection $connection;

    public function get($productId) {

        $statement = $this->connection->getConnection()->prepare('SELECT * FROM `product` WHERE `id` = ?');
        $statement->execute(array($productId));
        $checkResult = $statement->rowCount();
        if($checkResult > 0) {
            while($getProduct = $statement->fetch()) {
                $Product = new ProductRepository();
                $Product->id = $getProduct['id'];
                $Product->name = $getProduct['name'];
                $Product->category_id = $getProduct['category_id'];
                $Product->description = $getProduct['description'];
            }
        } else {
            $Product = null;
        }

        return $Product;

    }

}