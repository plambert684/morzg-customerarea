<?php

    require_once('src/lib/Database.php');
    require_once('src/models/users/GetUserModel.php');
    require_once('src/models/services/GetServiceModel.php');
    require_once('src/models/orders/GetOrderModel.php');
    require_once('src/models/tickets/GetTicketModel.php');
    require_once('src/models/billing/GetInvoiceModel.php');
    require_once('src/models/products/GetProductModel.php');
    require_once('src/models/productCategories/GetProductCategoryModel.php');

    use Clientarea\Lib\Database\DatabaseConnection;
    use Clientarea\Model\Users\Get\UserRepository;
    use Clientarea\Model\Services\Get\ServiceRepository;
    use Clientarea\Model\Orders\Get\OrderRepository;
    use Clientarea\Model\Ticket\Get\TicketRepository;
    use Clientarea\Model\Invoice\Get\InvoiceRepository;
    use Clientarea\Model\Products\Get\ProductRepository;
    use Clientarea\Model\ProductCategories\Get\ProductCategoryRepository;

    function dashboardPage() {

        $User = new UserRepository();
        $User->connection = new DatabaseConnection();

        $Service = new ServiceRepository();
        $Service->connection = new DatabaseConnection();

        $Order = new OrderRepository();
        $Order->connection = new DatabaseConnection();

        $Ticket = new TicketRepository();
        $Ticket->connection = new DatabaseConnection();

        $Invoice = new InvoiceRepository();
        $Invoice->connection = new DatabaseConnection();

        $Product = new ProductRepository();
        $Product->connection = new DatabaseConnection();

        $ProductCategory = new ProductCategoryRepository();
        $ProductCategory->connection = new DatabaseConnection();

        $getUser = $User->getUser($_SESSION['user_id']);
        $getServices = $Service->getAll($_SESSION['user_id']);
        $getProductCategories = $ProductCategory->getAll($_SESSION['user_id']);

        $totalService = $Service->count($_SESSION['user_id']);
        $totalOrder = $Order->count($_SESSION['user_id']);
        $totalTicket = $Ticket->count($_SESSION['user_id']);
        $totalInvoice = $Invoice->count($_SESSION['user_id']);

        $lang = $getUser->lang;

        $file = file_get_contents("lang/$lang.json");
        $langData = json_decode($file, true);

        require('views/DashboardView.php');

    }