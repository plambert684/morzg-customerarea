<?php

namespace Clientarea\Model\InvoiceCategory;

require_once('src/lib/Database.php');

use Clientarea\Lib\Database\DatabaseConnection;

class InvoiceCategoryRepository {

    public DatabaseConnection $connection;

    public function get($categoryId) {

        $statement = $this->connection->getConnection()->prepare('SELECT * FROM `invoice_status` WHERE `id` = ?');
        $statement->execute(array($categoryId));
        $getInvoiceCategory = $statement->fetch();
        $checkResult = $statement->rowCount();
        if($checkResult > 0) {
            $InvoiceCategory = new InvoiceCategoryRepository();
            $InvoiceCategory->id = $getInvoiceCategory['id'];
            $InvoiceCategory->name = $getInvoiceCategory['name'];
            $InvoiceCategory->color = $getInvoiceCategory['color'];
            $InvoiceCategory->icon = $getInvoiceCategory['icon'];
        } else {
            $InvoiceCategory = null;
        }

        return $InvoiceCategory;

    }

}