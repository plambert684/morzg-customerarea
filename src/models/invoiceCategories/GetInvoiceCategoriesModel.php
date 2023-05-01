<?php

namespace Clientarea\Model\InvoiceCategories;

require_once('src/lib/Database.php');

use Clientarea\Lib\Database\DatabaseConnection;

class InvoiceCategoriesRepository {

    public DatabaseConnection $connection;

    public function get() {

        $InvoiceCategories = [];

        $statement = $this->connection->getConnection()->prepare('SELECT * FROM `invoice_status`');
        $statement->execute();
        while($getInvoiceCategory = $statement->fetch()) {
            $InvoiceCategory = new InvoiceCategoriesRepository();
            $InvoiceCategory->id = $getInvoiceCategory['id'];
            $InvoiceCategory->name = $getInvoiceCategory['name'];
            $InvoiceCategory->color = $getInvoiceCategory['color'];
            $InvoiceCategory->icon = $getInvoiceCategory['icon'];

            $InvoiceCategories[] = $InvoiceCategory;
        }

        return $InvoiceCategories;

    }

}