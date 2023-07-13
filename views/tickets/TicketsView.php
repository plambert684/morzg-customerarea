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
                                    <?=$langData["ticketsPage"]["title"]?>
                                </div>
                                <h2 class="page-title">
                                    <?=$getCategory->name?>
                                </h2>
                            <?php } else {?>
                                <div class="page-pretitle">
                                    <?=$langData["ticketsPage"]["pre-title"]?>
                                </div>
                                <h2 class="page-title">
                                    <?=$langData["ticketsPage"]["title"]?>
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
                                    <?=$langData["ticketsPage"]["new-ticket-button"]?>
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
                                <a href="index.php?page=Tickets" class="dropdown-item <?php if(!isset($_GET['status'])||($getTicketStatus == null)){ echo('active'); }?>">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon dropdown-item-icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <path d="M13 5h8"></path>
                                        <path d="M13 9h5"></path>
                                        <path d="M13 15h8"></path>
                                        <path d="M13 19h5"></path>
                                        <path d="M3 4m0 1a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v4a1 1 0 0 1 -1 1h-4a1 1 0 0 1 -1 -1z"></path>
                                        <path d="M3 14m0 1a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v4a1 1 0 0 1 -1 1h-4a1 1 0 0 1 -1 -1z"></path>
                                    </svg>

                                    <?=$langData["ticketsPage"]["menu"]["all"]?>
                                </a>
                                <?php foreach ($getTicketStatuses as $getTicketStatus) {?>
                                    <a href="index.php?page=Tickets&status=<?=$getTicketStatus->id?>" class="dropdown-item <?php if(isset($_GET['status'])) { if($getTicketStatus->id == $_GET['status']) { echo('active'); } }?>">
                                        <?=$getTicketStatus->icon?>
                                        <?=$langData["ticketsPage"]["menu"]["$getTicketStatus->name"]?>
                                    </a>
                                <?php }?>
                            </div>
                        </div>
                        <div class="col-lg-9">
                            <div class="card">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-vcenter">
                                            <thead>
                                            <tr>
                                                <th><?=$langData["ticketsPage"]["table"]["subject"]?></th>
                                                <th><?=$langData["ticketsPage"]["table"]["department"]?></th>
                                                <th><?=$langData["ticketsPage"]["table"]["status"]?></th>
                                                <th class="w-1"></th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php foreach ($getTickets as $getTicket) {
                                                $getTicketDepartment = $TicketDepartment->get($getTicket->department_id);
                                                if(isset($_GET['status'])) {
                                                    if($getTicket->status == $_GET['status']) {?>
                                                        <tr>
                                                            <td class="text-muted" >
                                                                <?=$getTicket->subject?>
                                                            </td>
                                                            <td class="text-muted" >
                                                                <?=$langData["ticketsPage"]["table"]["department-title"]["$getTicketDepartment->name"]?>
                                                            </td>
                                                            <td class="text-muted" >
                                                                <?php

                                                                    if($getTicket->status == 1) {
                                                                        echo('<span class="badge bg-success">' . $langData["ticketsPage"]["table"]["status-badge"]["open"] .'</span>');
                                                                    } if($getTicket->status == 2) {
                                                                        echo('<span class="badge bg-secondary">' . $langData["ticketsPage"]["table"]["status-badge"]["closed"] .'</span>');
                                                                    } if($getTicket->status == 3) {
                                                                        echo('<span class="badge bg-danger">' . $langData["ticketsPage"]["table"]["status-badge"]["waiting-customer-reply"] .'</span>');
                                                                    } if($getTicket->status == 4) {
                                                                        echo('<span class="badge bg-info">' . $langData["ticketsPage"]["table"]["status-badge"]["waiting-staff-reply"] .'</span>');
                                                                    }

                                                                ?>
                                                            </td>
                                                            <td>
                                                                <a href="#"><?=$langData["ticketsPage"]["table"]["management-button"]?></a>
                                                            </td>
                                                        </tr>
                                                    <?php }?>
                                                <?php } else {?>
                                                    <tr>
                                                        <td class="text-muted" >
                                                            <?=$getTicket->subject?>
                                                        </td>
                                                        <td class="text-muted" >
                                                            <?=$langData["ticketsPage"]["table"]["department-title"]["$getTicketDepartment->name"]?>
                                                        </td>
                                                        <td>
                                                            <?php

                                                                if($getTicket->status == 1) {
                                                                    echo('<span class="badge bg-success">' . $langData["ticketsPage"]["table"]["status-badge"]["open"] .'</span>');
                                                                } if($getTicket->status == 2) {
                                                                    echo('<span class="badge bg-secondary">' . $langData["ticketsPage"]["table"]["status-badge"]["closed"] .'</span>');
                                                                } if($getTicket->status == 3) {
                                                                    echo('<span class="badge bg-danger">' . $langData["ticketsPage"]["table"]["status-badge"]["waiting-customer-reply"] .'</span>');
                                                                } if($getTicket->status == 4) {
                                                                    echo('<span class="badge bg-info">' . $langData["ticketsPage"]["table"]["status-badge"]["waiting-staff-reply"] .'</span>');
                                                                }

                                                            ?>
                                                        </td>
                                                        <td>
                                                            <a href="#"><?=$langData["ticketsPage"]["table"]["management-button"]?></a>
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

<?php require('views/layouts/tickets/TicketsLayout.php') ?>