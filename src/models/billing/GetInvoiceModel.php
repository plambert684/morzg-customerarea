<?php

    namespace Clientarea\Model\Invoice\Get;

    require_once('src/lib/Database.php');

    use Clientarea\Lib\Database\DatabaseConnection;

    class InvoiceRepository {

        public DatabaseConnection $connection;

        public function count($userId) {

            $counter = 0;
            $statement = $this->connection->getConnection()->prepare('SELECT * FROM `invoice` WHERE `user_id` = ?');
            $statement->execute(array($userId));
            while($getInvoice = $statement->fetch()) {
                $counter = $counter + 1;
            }

            return $counter;


        }

        public function get($invoiceId) {

            $statement_invoice = $this->connection->getConnection()->prepare('SELECT * FROM `invoice` WHERE `id` = ? ');
            $statement_invoice->execute(array($invoiceId));
            $get_invoice = $statement_invoice->fetch();
            $checkResult = $statement_invoice->rowCount();

            if($checkResult != 0) {
                $statement_order = $this->connection->getConnection()->prepare('SELECT * FROM `order` WHERE `invoice_id` = ?');
                $statement_order->execute(array($get_invoice['id']));
                $get_order = $statement_order->fetch();

                $invoice = new InvoiceRepository();
                $invoice->id = $get_invoice['id'];
                $invoice->user_id = $get_invoice['user_id'];
                $invoice->order_date = $get_order['date'];
                $invoice->ttc_price = $get_order['vat_total_price'];
                $invoice->status = $get_invoice['status'];
                $invoice->order_id = $get_order['id'];

            } else {
                $invoice = null;
            }

            return $invoice;

        }

    }