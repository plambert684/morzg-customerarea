<?php ob_start(); ?>
<script src="./dist/js/demo-theme.min.js?1674944402"></script>
<div class="page">
    <?php require_once('views/includes/navbar.php');?>
    <div class="page-wrapper">
        <!-- Page header -->
        <div class="page-header d-print-none">
            <div class="container-xl">
                <div class="row g-2 align-items-center">
                    <div class="col">
                        <h2 class="page-title">
                            <?=$langData["invoicePage"]["title"] . ' - ' . $getInvoice->id?>
                        </h2>
                    </div>
                    <!-- Page title actions -->
                    <div class="col-auto ms-auto d-print-none">
                        <button type="button" class="btn btn-primary" onclick="javascript:window.print();">
                            <!-- Download SVG icon from http://tabler-icons.io/i/printer -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M17 17h2a2 2 0 0 0 2 -2v-4a2 2 0 0 0 -2 -2h-14a2 2 0 0 0 -2 2v4a2 2 0 0 0 2 2h2" /><path d="M17 9v-4a2 2 0 0 0 -2 -2h-6a2 2 0 0 0 -2 2v4" /><path d="M7 13m0 2a2 2 0 0 1 2 -2h6a2 2 0 0 1 2 2v4a2 2 0 0 1 -2 2h-6a2 2 0 0 1 -2 -2z" /></svg>
                            <?=$langData["invoicePage"]['print-button']?>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Page body -->
        <div class="page-body">
            <div class="container-xl">
                <div class="card card-lg">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-6">
                                <img src="./static/logo.svg" width="32" height="32" class="navbar-brand-image">
                                <p></p>
                                <p class="h3">CoreHost Solutions</p>
                                <address>
                                    <strong>TVA</strong> : FR46902299023<br>
                                    1 rue Maurice Denis<br>
                                    Saint-Germain-en-Laye<br>
                                    Yvelines, 78100<br>
                                    France<br>
                                    contact@corehost-solutions.com<br>
                                </address>
                            </div>
                            <div class="col-6 text-end">
                                <p class="h3"><?=$getUser->first_name . " " . $getUser->last_name?></p>
                                <address>
                                    <?=$getUser->address?><br>
                                    <?=$getUser->city?><br>
                                    <?=$getUser->state . ", " . $getUser->postal_code?><br>
                                    <?=$getUser->country?><br>
                                    <?=$getUser->email?>
                                </address>
                            </div>
                            <div class="col-12 my-5">
                                <?php

                                    if($getInvoice->status == 1) {
                                        $badge = '<span class="badge bg-teal">' . $langData["invoicePage"]["status"]["paid"] . '</span>';
                                    } if($getInvoice->status == 2) {
                                        $badge = '<span class="badge bg-orange">' . $langData["invoicePage"]["status"]["unpaid"] . '</span>';
                                    } if($getInvoice->status == 3) {
                                        $badge = '<span class="badge bg-yellow">' . $langData["invoicePage"]["status"]["canceled"] . '</span>';
                                    } if($getInvoice->status == 4) {
                                        $badge = '<span class="badge bg-cyan">' . $langData["invoicePage"]["status"]["refunded"] . '</span>';
                                    } if($getInvoice->status == 5) {
                                        $badge = '<span class="badge bg-red">' . $langData["invoicePage"]["status"]["fraud"] . '</span>';                                    } if($getInvoice->status == 3) {
                                    }
                                ?>
                                <h1><?=$badge . " " . $langData["invoicePage"]["invoice"]['title'] . ' #' . $getInvoice->id?></h1>
                            </div>
                        </div>
                        <table class="table table-transparent table-responsive">
                            <thead>
                            <tr>
                                <th class="text-center" style="width: 1%"></th>
                                <th><?=$langData["invoicePage"]["invoice"]['table']['product']?></th>
                                <th class="text-center" style="width: 1%"></th>
                                <th class="text-end" style="width: 1%"></th>
                                <th class="text-end" style="width: 1%"><?=$langData["invoicePage"]["invoice"]['table']['amount']?></th>
                            </tr>
                            </thead>
                            <?php

                                $count = 0;
                                foreach($getOrderDetails as $getOrderDetail) {
                                    $count = $count + 1;?>
                                        <tr>
                                            <td class="text-center"><?=$count?></td>
                                            <td>
                                                <p class="strong mb-1"><?=$getOrderDetail->product_name?></p>
                                            </td>
                                            <td class="text-center">

                                            </td>
                                            <td class="text-end"></td>
                                            <td class="text-end"><?=$getOrderDetail->price?></td>
                                        </tr>
                                <?php }?>
                            <tr>
                                <td colspan="4" class="strong text-end"><?=$langData["invoicePage"]["invoice"]['table']['without-taxe-price']?></td>
                                <td class="text-end"><?=$total_price?></td>
                            </tr>
                            <tr>
                                <td colspan="4" class="strong text-end"><?=$langData["invoicePage"]["invoice"]['table']['vat-value']?></td>
                                <td class="text-end">0%</td>
                            </tr>
                            <tr>
                                <td colspan="4" class="strong text-end"><?=$langData["invoicePage"]["invoice"]['table']['vat-price']?></td>
                                <td class="text-end"><?=$vat_total_price?></td>
                            </tr>
                        </table>
                        <p class="text-muted text-center mt-5"><?=$langData["invoicePage"]["invoice"]['vat-message']?></p>
                    </div>
                </div>
            </div>
        </div>
        <?php require_once('views/includes/footer.php');?>
    </div>
</div>
<!-- Libs JS -->
<!-- Tabler Core -->
<script src="./dist/js/tabler.min.js?1674944402" defer></script>
<script src="./dist/js/demo.min.js?1674944402" defer></script>

<?php $content = ob_get_clean(); ?>

<?php require('views/layouts/billing/InvoiceLayout.php') ?>