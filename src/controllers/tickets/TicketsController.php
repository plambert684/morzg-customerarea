<?php

require_once('src/lib/Database.php');
require_once('src/models/users/GetUserModel.php');
require_once('src/models/tickets/GetTicketsModel.php');
require_once('src/models/ticketStatus/GetTicketStatusModel.php');
require_once('src/models/ticketStatus/GetTicketStatusesModel.php');
require_once('src/models/ticketDepartments/GetTicketDepartmentModel.php');
require_once('src/models/ticketDepartments/GetTicketDepartmentsModel.php');
require_once('src/models/services/GetServiceModel.php');
require_once('src/models/products/GetProductModel.php');
require_once('src/models/productCategories/GetProductCategoryModel.php');

use Clientarea\Lib\Database\DatabaseConnection;
use Clientarea\Model\Users\Get\UserRepository;
use Clientarea\Model\Tickets\Get\TicketsRepository;
use Clientarea\Model\TicketStatus\TicketStatusRepository;
use Clientarea\Model\TicketStatuses\TicketStatusesRepository;
use Clientarea\Model\TicketDepartment\TicketDepartmentRepository;
use Clientarea\Model\TicketDepartments\TicketDepartmentsRepository;
use Clientarea\Model\Services\Get\ServiceRepository;
use Clientarea\Model\Products\Get\ProductRepository;
use Clientarea\Model\ProductCategories\Get\ProductCategoryRepository;

function ticketsPage() {

    $User = new UserRepository();
    $User->connection = new DatabaseConnection();

    $Tickets = new TicketsRepository();
    $Tickets->connection = new DatabaseConnection();

    $TicketStatus = new TicketStatusRepository();
    $TicketStatus->connection = new DatabaseConnection();

    $TicketStatuses = new TicketStatusesRepository();
    $TicketStatuses->connection = new DatabaseConnection();

    $TicketDepartment = new TicketDepartmentRepository();
    $TicketDepartment->connection = new DatabaseConnection();

    $TicketDepartments = new TicketDepartmentsRepository();
    $TicketDepartments->connection = new DatabaseConnection();

    $Service = new ServiceRepository();
    $Service->connection = new DatabaseConnection();

    $Product = new ProductRepository();
    $Product->connection = new DatabaseConnection();

    $ProductCategory = new ProductCategoryRepository();
    $ProductCategory->connection = new DatabaseConnection();

    $getUser = $User->getUser($_SESSION['user_id']);
    $getTickets = $Tickets->get($_SESSION['user_id']);
    $getTicketStatuses = $TicketStatuses->get();
    $getTicketDepartments = $TicketDepartments->get();
    $getServices = $Service->getAll($_SESSION['user_id']);
    $getProductCategories = $ProductCategory->getAll($_SESSION['user_id']);

    $lang = $getUser->lang;

    $file = file_get_contents("lang/$lang.json");
    $langData = json_decode($file, true);

    if(isset($_GET['status'])) {
        $getTicketStatus = $TicketStatus->get($_GET['status']);
        if($getTicketStatus == null) {
            $_SESSION['message'] = '<div class="alert alert-important alert-danger alert-dismissible" role="alert"><div class="d-flex"><div><svg xmlns="http://www.w3.org/2000/svg" class="icon alert-icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0" /><path d="M12 8l0 4" /><path d="M12 16l.01 0" /></svg></div><div>' . $langData["invoicesPage"]["alert"]["error"]["filter-not-found"] . '</div></div><a class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="close"></a></div>';
        }
    }

    require('views/tickets/TicketsView.php');

}