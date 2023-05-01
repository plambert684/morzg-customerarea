<?php

namespace Clientarea\Model\ProductCategories\Get;

require_once('src/lib/Database.php');

use Clientarea\Lib\Database\DatabaseConnection;

class ProductCategoryRepository {

    public DatabaseConnection $connection;

    public function getAll() {

        $ProductCategories = [];

        $statement = $this->connection->getConnection()->prepare('SELECT * FROM `product_category`');
        $statement->execute();
        while($getProduct = $statement->fetch()) {
            $ProductCategory = new ProductCategoryRepository();
            $ProductCategory->id = $getProduct['id'];
            $ProductCategory->name = $getProduct['name'];
            $ProductCategory->color = $getProduct['color'];
            $ProductCategory->icon = $getProduct['icon'];

            $ProductCategories[] = $ProductCategory;
        }

        return $ProductCategories;

    }

    public function get($categoryId) {

        $statement = $this->connection->getConnection()->prepare('SELECT * FROM `product_category` WHERE `id` = ?');
        $statement->execute(array($categoryId));
        $getProduct = $statement->fetch();
        $checkResult = $statement->rowCount();
        if($checkResult > 0) {
            $ProductCategory = new ProductCategoryRepository();
            $ProductCategory->id = $getProduct['id'];
            $ProductCategory->name = $getProduct['name'];
            $ProductCategory->color = $getProduct['color'];
            $ProductCategory->icon = $getProduct['icon'];
        } else {
            $ProductCategory = null;
        }

        return $ProductCategory;

    }

}