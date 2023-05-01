<?php

require_once('src/lib/Database.php');
require_once('src/models/users/GetUserModel.php');
require_once('src/models/billing/GetInvoiceModel.php');
require_once('src/models/orders/GetOrderModel.php');
require_once('src/models/orders/GetOrderDetailsModel.php');

use Clientarea\Lib\Database\DatabaseConnection;
use Clientarea\Model\Users\Get\UserRepository;
use Clientarea\Model\Invoice\Get\InvoiceRepository;
use Clientarea\Model\Orders\Get\OrderRepository;
use Clientarea\Model\Orders\OrderDetails\Get\OrderDetailsRepository;

function invoicePage() {

    $User = new UserRepository();
    $User->connection = new DatabaseConnection();

    $Invoice = new InvoiceRepository();
    $Invoice->connection = new DatabaseConnection();

    $Order = new OrderRepository();
    $Order->connection = new DatabaseConnection();

    $OrderDetails = new OrderDetailsRepository();
    $OrderDetails->connection = new DatabaseConnection();

    $getUser = $User->getUser($_SESSION['user_id']);
    $getInvoice = $Invoice->get($_GET['id']);

    if($getInvoice != null) {
        if($getInvoice->user_id != $_SESSION['user_id']) {
            header('Location: index.php?page=Invoices');
        } else {
            $getOrder = $Order->getByInvoice($getInvoice->id);
            $getOrderDetails = $OrderDetails->getByOrder($getOrder->id);
            $total_price = 0;
            foreach ($getOrderDetails as $getOrderDetail) {
                $total_price = $total_price + $getOrderDetail->price;
            }

            //On calcul le prix TTC à partir du prix HT (TVA de 0%)
            $vat_total_price = $total_price * 1;
        }
    }

    $lang = $getUser->lang;

    $file = file_get_contents("lang/$lang.json");
    $langData = json_decode($file, true);

    require('views/billing/InvoiceView.php');

}