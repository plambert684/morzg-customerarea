<?php

require_once('src/lib/Database.php');
require_once('src/models/users/GetUserModel.php');
require_once('src/models/services/GetServiceModel.php');
require_once('src/models/products/GetProductModel.php');
require_once('src/models/billing/GetInvoicesModel.php');
require_once('src/models/productCategories/GetProductCategoryModel.php');
require_once('src/models/invoiceCategories/GetInvoiceCategoryModel.php');
require_once('src/models/invoiceCategories/GetInvoiceCategoriesModel.php');

use Clientarea\Lib\Database\DatabaseConnection;
use Clientarea\Model\Users\Get\UserRepository;
use Clientarea\Model\Invoices\Get\InvoicesRepository;
use Clientarea\Model\InvoiceCategory\InvoiceCategoryRepository;
use Clientarea\Model\InvoiceCategories\InvoiceCategoriesRepository;

function invoicesPage() {

    $User = new UserRepository();
    $User->connection = new DatabaseConnection();

    $Invoices = new InvoicesRepository();
    $Invoices->connection = new DatabaseConnection();

    $InvoiceCategory = new InvoiceCategoryRepository();
    $InvoiceCategory->connection = new DatabaseConnection();

    $InvoiceCategories = new InvoiceCategoriesRepository();
    $InvoiceCategories->connection = new DatabaseConnection();

    $getUser = $User->getUser($_SESSION['user_id']);
    $getInvoicesCategories = $InvoiceCategories->get();

    $getInvoices = $Invoices->get($_SESSION['user_id']);

    $lang = $getUser->lang;

    $file = file_get_contents("lang/$lang.json");
    $langData = json_decode($file, true);

    if(isset($_GET['status'])) {
        $getCategory = $InvoiceCategory->get($_GET['status']);
        if($getCategory == null) {
            $_SESSION['message'] = '<div class="alert alert-important alert-danger alert-dismissible" role="alert"><div class="d-flex"><div><svg xmlns="http://www.w3.org/2000/svg" class="icon alert-icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0" /><path d="M12 8l0 4" /><path d="M12 16l.01 0" /></svg></div><div>' . $langData["invoicesPage"]["alert"]["error"]["filter-not-found"] . '</div></div><a class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="close"></a></div>';
        }
    }

    require('views/billing/InvoicesView.php');

}