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
                                    <?=$langData["invoicesPage"]["title"]?>
                                </div>
                                <h2 class="page-title">
                                    <?=$langData["invoicesPage"]["status"]["$getCategory->name"]?>
                                </h2>
                            <?php } else {?>
                                <div class="page-pretitle">
                                    <?=$langData["invoicesPage"]["pre-title"]?>
                                </div>
                                <h2 class="page-title">
                                    <?=$langData["invoicesPage"]["title"]?>
                                </h2>
                            <?php }?>
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
                                <a href="index.php?page=Invoices" class="dropdown-item <?php if((!isset($_GET['status']))||($getCategory == null)) { echo('active'); }?>">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon dropdown-item-icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <path d="M13 5h8"></path>
                                        <path d="M13 9h5"></path>
                                        <path d="M13 15h8"></path>
                                        <path d="M13 19h5"></path>
                                        <path d="M3 4m0 1a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v4a1 1 0 0 1 -1 1h-4a1 1 0 0 1 -1 -1z"></path>
                                        <path d="M3 14m0 1a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v4a1 1 0 0 1 -1 1h-4a1 1 0 0 1 -1 -1z"></path>
                                    </svg>
                                    <?=$langData["invoicesPage"]["menu"]["all"]?>
                                </a>
                                <?php foreach ($getInvoicesCategories as $getInvoiceCategory) {?>
                                    <a href="index.php?page=Invoices&status=<?=$getInvoiceCategory->id?>" class="dropdown-item <?php if(isset($_GET['status'])) { if($getInvoiceCategory->id == $_GET['status']) { echo('active'); } }?>">
                                        <?=$getInvoiceCategory->icon?>
                                        <?=$langData["invoicesPage"]["menu"]["$getInvoiceCategory->name"]?>
                                    </a>
                                <?php }?>
                            </div>
                        </div>
                        <div class="col-lg-9">
                            <div class="card">
                                <div class="card-body">
                                    <h3 class="card-title"><?=$langData["invoicesPage"]['all-invoices']["title"]?></h3>
                                    <div class="table-responsive">
                                        <table class="table table-vcenter">
                                            <thead>
                                            <tr>
                                                <th><?=$langData["invoicesPage"]["all-invoices"]["table"]["number"]?></th>
                                                <th><?=$langData["invoicesPage"]["all-invoices"]["table"]["order-date"]?></th>
                                                <th><?=$langData["invoicesPage"]["all-invoices"]["table"]["ttc-price"]?></th>
                                                <th><?=$langData["invoicesPage"]["all-invoices"]["table"]["status"]?></th>
                                                <th class="w-1"></th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php foreach ($getInvoices as $getInvoice) {
                                                if(isset($_GET['status'])) {
                                                    if($getInvoice->status == $_GET['status']) {?>
                                                        <tr>
                                                            <td class="text-muted" >
                                                                <?=$getInvoice->id?>
                                                            </td>
                                                            <td class="text-muted" >
                                                                <?=$getInvoice->order_date?>
                                                            </td>
                                                            <td class="text-muted" >
                                                                <?=$getInvoice->ttc_price?>
                                                            </td>
                                                            <td class="text-muted" >
                                                                <?php

                                                                if($getInvoice->status == 1) {
                                                                    echo('<span class="badge bg-teal">' . $langData["invoicesPage"]["status"]["paid"] .'</span>');
                                                                } if($getInvoice->status == 2) {
                                                                    echo('<span class="badge bg-orange">' . $langData["invoicesPage"]["status"]["unpaid"] .'</span>');
                                                                } if($getInvoice->status == 3) {
                                                                    echo('<span class="badge bg-yellow">' . $langData["invoicesPage"]["status"]["canceled"] .'</span>');
                                                                } if($getInvoice->status == 4) {
                                                                    echo('<span class="badge bg-cyan">' . $langData["invoicesPage"]["status"]["refunded"] .'</span>');
                                                                } if($getInvoice->status == 5) {
                                                                    echo('<span class="badge bg-red">' . $langData["invoicesPage"]["status"]["fraud"] .'</span>');
                                                                }

                                                                ?>
                                                            </td>
                                                            <td>
                                                                <a href="index.php?page=Invoice&id=<?=$getInvoice->id?>"><?=$langData["invoicesPage"]["all-invoices"]["table"]["management-button"]?></a>
                                                            </td>
                                                        </tr>
                                                    <?php }?>
                                                <?php } else {?>
                                                    <tr>
                                                        <td class="text-muted" >
                                                            <?=$getInvoice->id?>
                                                        </td>
                                                        <td class="text-muted" >
                                                            <?=$getInvoice->order_date?>
                                                        </td>
                                                        <td class="text-muted" >
                                                            <?=$getInvoice->ttc_price?>
                                                        </td>
                                                        <td class="text-muted" >
                                                            <?php

                                                            if($getInvoice->status == 1) {
                                                                echo('<span class="badge bg-teal">' . $langData["invoicesPage"]["status"]["paid"] .'</span>');
                                                            } if($getInvoice->status == 2) {
                                                                echo('<span class="badge bg-orange">' . $langData["invoicesPage"]["status"]["unpaid"] .'</span>');
                                                            } if($getInvoice->status == 3) {
                                                                echo('<span class="badge bg-yellow">' . $langData["invoicesPage"]["status"]["canceled"] .'</span>');
                                                            } if($getInvoice->status == 4) {
                                                                echo('<span class="badge bg-cyan">' . $langData["invoicesPage"]["status"]["refunded"] . '</span>');
                                                            } if($getInvoice->status == 5) {
                                                                echo('<span class="badge bg-red">' . $langData["invoicesPage"]["status"]["fraud"] .'</span>');
                                                            }

                                                            ?>
                                                        </td>
                                                        <td>
                                                            <a href="index.php?page=Invoice&id=<?=$getInvoice->id?>"><?=$langData["invoicesPage"]["all-invoices"]["table"]["management-button"]?></a>
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

<?php require('views/layouts/billing/InvoicesLayout.php') ?>