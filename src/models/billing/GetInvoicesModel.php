<?php

namespace Clientarea\Model\Invoices\Get;

require_once('src/lib/Database.php');

use Clientarea\Lib\Database\DatabaseConnection;

class InvoicesRepository {

    public DatabaseConnection $connection;

    public function get($userId) {

        $invoices = [];

        $statement_invoice = $this->connection->getConnection()->prepare('SELECT * FROM `invoice` WHERE `user_id` = ?');
        $statement_invoice->execute(array($userId));
        while($get_invoice = $statement_invoice->fetch()) {
            $statement_order = $this->connection->getConnection()->prepare('SELECT * FROM `order` WHERE `invoice_id` = ?');
            $statement_order->execute(array($get_invoice['id']));
            $get_order = $statement_order->fetch();

            $invoice = new InvoicesRepository();
            $invoice->id = $get_invoice['id'];
            $invoice->order_date = $get_order['date'];
            $invoice->ttc_price = $get_order['vat_total_price'];
            $invoice->status = $get_invoice['status'];

            $invoices[] = $invoice;

        }

        return $invoices;

    }

}