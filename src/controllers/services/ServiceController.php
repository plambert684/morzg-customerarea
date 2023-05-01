<?php

require_once('src/lib/Database.php');
require_once('src/models/users/GetUserModel.php');
require_once('src/models/services/GetServiceModel.php');
require_once('src/models/services/settings/GetServiceSettingsModel.php');
require_once('src/models/products/GetProductModel.php');
require_once('src/models/productCategories/GetProductCategoryModel.php');

use Clientarea\Lib\Database\DatabaseConnection;
use Clientarea\Model\Users\Get\UserRepository;
use Clientarea\Model\Services\Get\ServiceRepository;
use Clientarea\Model\Services\Settings\Get\ServiceSettingsRepository;
use Clientarea\Model\Products\Get\ProductRepository;
use Clientarea\Model\ProductCategories\Get\ProductCategoryRepository;

function servicePage() {

    $User = new UserRepository();
    $User->connection = new DatabaseConnection();

    $Service = new ServiceRepository();
    $Service->connection = new DatabaseConnection();

    $Product = new ProductRepository();
    $Product->connection = new DatabaseConnection();

    $ServiceSettings = new ServiceSettingsRepository();
    $ServiceSettings->connection = new DatabaseConnection();

    $ProductCategory = new ProductCategoryRepository();
    $ProductCategory->connection = new DatabaseConnection();

    $getUser = $User->getUser($_SESSION['user_id']);
    $getServices = $Service->getAll($_SESSION['user_id']);
    $getServiceSettings = $ServiceSettings->get($_GET['id']);
    $getProductCategories = $ProductCategory->getAll($_SESSION['user_id']);

    $lang = $getUser->lang;

    $file = file_get_contents("lang/$lang.json");
    $langData = json_decode($file, true);

    #PROXMOX
    require_once('src/services/proxmox/connectProxmox.php');

    $VMInfo = $proxmox->get('/nodes/pve/qemu/'.$getServiceSettings->vm_id.'/status/current');

    require('views/Services/ServiceView.php');

}