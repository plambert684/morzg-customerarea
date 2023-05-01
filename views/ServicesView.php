<?php ob_start(); ?>
<script src="./dist/js/demo-theme.min.js?1674944402"></script>
<div class="page">
    <?php require_once('views/includes/navbar.php');?>
    <div class="page-wrapper">
        <!-- Page header -->
        <div class="page-header d-print-none">
            <div class="container-xl">
                <?php

                    if(isset($_SESSION['message'])) {
                        echo $_SESSION['message'];
                    }

                ?>
                <div class="row g-2 align-items-center">
                    <div class="col">
                        <?php if(isset($getCategory)) {?>
                            <div class="page-pretitle">
                                <?=$langData["servicesPage"]["title"]?>
                            </div>
                            <h2 class="page-title">
                                <?=$getCategory->name?>
                            </h2>
                        <?php } else {?>
                            <div class="page-pretitle">
                                <?=$langData["servicesPage"]["pre-title"]?>
                            </div>
                            <h2 class="page-title">
                                <?=$langData["servicesPage"]["title"]?>
                            </h2>
                        <?php }?>
                    </div>
                    <!-- Page title actions -->
                    <div class="col-auto ms-auto d-print-none">
                        <div class="btn-list">
                            <a href="index.php?Order" class="btn btn-primary d-none d-sm-inline-block">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-square-plus" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path d="M3 3m0 2a2 2 0 0 1 2 -2h14a2 2 0 0 1 2 2v14a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2z"></path>
                                    <path d="M9 12l6 0"></path>
                                    <path d="M12 9l0 6"></path>
                                </svg>
                                <?=$langData["servicesPage"]["order-button"]?>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Page body -->
        <div class="page-body">
            <div class="container-xl">
                <div class="row">
                    <div class="col-sm-6 col-lg-3">
                        <div class="dropdown-menu dropdown-menu-demo">
                            <a href="index.php?page=Services" class="dropdown-item <?php if((!isset($_GET['category']))||($getCategory == null)) { echo('active'); }?>">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon dropdown-item-icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path d="M13 5h8"></path>
                                    <path d="M13 9h5"></path>
                                    <path d="M13 15h8"></path>
                                    <path d="M13 19h5"></path>
                                    <path d="M3 4m0 1a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v4a1 1 0 0 1 -1 1h-4a1 1 0 0 1 -1 -1z"></path>
                                    <path d="M3 14m0 1a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v4a1 1 0 0 1 -1 1h-4a1 1 0 0 1 -1 -1z"></path>
                                </svg>
                                <?=$langData["servicesPage"]["menu"]["all-services"]?>
                            </a>
                            <?php foreach ($getProductCategories as $getProductCategory) {?>
                                <a href="index.php?page=Services&category=<?=$getProductCategory->id?>" class="dropdown-item <?php if(isset($_GET['category'])) { if($getProductCategory->id == $_GET['category']) { echo('active'); } }?>">
                                    <img src="<?=$getProductCategory->icon?>" class="icon dropdown-item-icon" width="32" height="32">
                                    <?=$getProductCategory->name?>
                                </a>
                            <?php }?>
                        </div>
                    </div>
                    <div class="col-lg-9">
                        <div class="card">
                            <div class="card-body">
                                <h3 class="card-title"><?=$langData["servicesPage"]["all-services"]["title"]?></h3>
                                <div class="table-responsive">
                                    <table class="table table-vcenter">
                                        <thead>
                                        <tr>
                                            <th><?=$langData["servicesPage"]["all-services"]["table"]["name"]["service"]?></th>
                                            <th><?=$langData["servicesPage"]["all-services"]["table"]["name"]["order-date"]?></th>
                                            <th><?=$langData["servicesPage"]["all-services"]["table"]["name"]["due-date"]?></th>
                                            <th><?=$langData["servicesPage"]["all-services"]["table"]["name"]["status"]?></th>
                                            <th class="w-1"></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php foreach ($getServices as $getService) {
                                            if(isset($getCategory)) {
                                                $getProduct = $Product->get($getService->product_id);
                                                if($getProduct != null) {
                                                    $getCategory = $ProductCategory->get($getProduct->category_id);
                                                    if($getProduct->category_id == $_GET['category']) {?>
                                                        <tr>
                                                            <td class="text-muted" >
                                                                <?=$getProduct->name?>
                                                            </td>
                                                            <td class="text-muted" >
                                                                <?=$getService->order_date?>
                                                            </td>
                                                            <td class="text-muted" >
                                                                <?=$getService->due_date?>
                                                            </td>
                                                            <td class="text-muted" >
                                                                <?php

                                                                    if($getService->status == 1) {
                                                                        echo('<span class="badge bg-teal">' . $langData["servicesPage"]["status"]["active"] .'</span>');
                                                                    } if($getService->status == 2) {
                                                                        echo('<span class="badge bg-orange">' . $langData["servicesPage"]["status"]["suspended"] .'</span>');
                                                                    } if($getService->status == 3) {
                                                                        echo('<span class="badge bg-cyan">' . $langData["servicesPage"]["status"]["ended"] .'</span>');
                                                                    } if($getService->status == 4) {
                                                                        echo('<span class="badge bg-yellow">' . $langData["servicesPage"]["status"]["canceled"] .'</span>');
                                                                    } if($getService->status == 5) {
                                                                        echo('<span class="badge bg-red">' . $langData["servicesPage"]["status"]["fraud"] .'</span>');
                                                                    }

                                                                ?>
                                                            </td>
                                                            <td>
                                                                <a href="#"><?=$langData["servicesPage"]["all-services"]["table"]["content"]["management-button"]?></a>
                                                            </td>
                                                        </tr>
                                                    <?php }?>
                                                <?php }?>
                                            <?php } else {
                                                $getProduct = $Product->get($getService->product_id);?>
                                                <tr>
                                                    <td class="text-muted" >
                                                        <?=$getProduct->name?>
                                                    </td>
                                                    <td class="text-muted" >
                                                        <?=$getService->order_date?>
                                                    </td>
                                                    <td class="text-muted" >
                                                        <?=$getService->due_date?>
                                                    </td>
                                                    <td class="text-muted" >
                                                        <?php

                                                            if($getService->status == 1) {
                                                                echo('<span class="badge bg-teal">' . $langData["servicesPage"]["status"]["active"] .'</span>');
                                                            } if($getService->status == 2) {
                                                                echo('<span class="badge bg-orange">' . $langData["servicesPage"]["status"]["suspended"] .'</span>');
                                                            } if($getService->status == 3) {
                                                                echo('<span class="badge bg-cyan">' . $langData["servicesPage"]["status"]["ended"] .'</span>');
                                                            } if($getService->status == 4) {
                                                                echo('<span class="badge bg-yellow">' . $langData["servicesPage"]["status"]["canceled"] .'</span>');
                                                            } if($getService->status == 5) {
                                                                echo('<span class="badge bg-red">' . $langData["servicesPage"]["status"]["fraud"] .'</span>');
                                                            }

                                                        ?>
                                                    </td>
                                                    <td>
                                                        <a href="#"><?=$langData["servicesPage"]["all-services"]["table"]["content"]["management-button"]?></a>
                                                    </td>
                                                </tr>
                                            <?php }?>
                                        <?php }?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php require_once("views/includes/footer.php");?>
    </div>
</div>
<!-- Libs JS -->
<!-- Tabler Core -->
<script src="./dist/js/tabler.min.js?1674944402" defer></script>
<script src="./dist/js/demo.min.js?1674944402" defer></script>

<?php $content = ob_get_clean(); ?>

<?php require('views/layouts/ServicesLayout.php') ?>