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
                            <!-- Page pre-title -->
                            <div class="page-pretitle">
                                Domaine
                            </div>
                            <h2 class="page-title">
                                <?=$getServiceSettings->domain?> - <?=$getServiceSettings->ip_address?>
                            </h2>
                        </div>
                        <!-- Page title actions -->
                        <div class="col-auto ms-auto d-print-none">
                            <div class="btn-list">
                                <a href="#" class="btn btn-primary d-none d-sm-inline-block" data-bs-toggle="modal" data-bs-target="#modal-report">
                                    <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 5l0 14" /><path d="M5 12l14 0" /></svg>
                                    Ajouter une règle
                                </a>
                                <a href="#" class="btn btn-primary d-sm-none btn-icon" data-bs-toggle="modal" data-bs-target="#modal-report" aria-label="Create new report">
                                    <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 5l0 14" /><path d="M5 12l14 0" /></svg>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Page body -->
            <div class="page-body">
                <div class="container-xl">
                    <div class="col-12">
                        <?php if(isset($_SESSION['message'])) { echo $_SESSION['message']; }?>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 col-lg-3">
                            <div class="dropdown-menu dropdown-menu-demo">
                                <a href="index.php?page=Service&id=<?=$_GET['id']?>" class="dropdown-item"><!-- Download SVG icon from http://tabler-icons.io/i/activity -->
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon dropdown-item-icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <path d="M15 9a6 6 0 0 1 4.891 9.476l2.816 2.817a1 1 0 0 1 -1.32 1.497l-.094 -.083l-2.817 -2.816a6 6 0 0 1 -9.472 -4.666l-.004 -.225l.004 -.225a6 6 0 0 1 5.996 -5.775zm0 3a1 1 0 0 0 -.993 .883l-.007 .117v1h-1l-.117 .007a1 1 0 0 0 0 1.986l.117 .007h1v1l.007 .117a1 1 0 0 0 1.986 0l.007 -.117v-1h1l.117 -.007a1 1 0 0 0 0 -1.986l-.117 -.007h-1v-1l-.007 -.117a1 1 0 0 0 -.993 -.883z" stroke-width="0" fill="currentColor"></path>
                                        <path d="M3 14a1 1 0 0 1 .993 .883l.007 .117v1a1 1 0 0 0 .883 .993l.117 .007h1a1 1 0 0 1 .117 1.993l-.117 .007h-1a3 3 0 0 1 -2.995 -2.824l-.005 -.176v-1a1 1 0 0 1 1 -1z" stroke-width="0" fill="currentColor"></path>
                                        <path d="M3 9a1 1 0 0 1 .993 .883l.007 .117v1a1 1 0 0 1 -1.993 .117l-.007 -.117v-1a1 1 0 0 1 1 -1z" stroke-width="0" fill="currentColor"></path>
                                        <path d="M6 2a1 1 0 0 1 .117 1.993l-.117 .007h-1a1 1 0 0 0 -.993 .883l-.007 .117v1a1 1 0 0 1 -1.993 .117l-.007 -.117v-1a3 3 0 0 1 2.824 -2.995l.176 -.005h1z" stroke-width="0" fill="currentColor"></path>
                                        <path d="M11 2a1 1 0 0 1 .117 1.993l-.117 .007h-1a1 1 0 0 1 -.117 -1.993l.117 -.007h1z" stroke-width="0" fill="currentColor"></path>
                                        <path d="M16 2a3 3 0 0 1 2.995 2.824l.005 .176v1a1 1 0 0 1 -1.993 .117l-.007 -.117v-1a1 1 0 0 0 -.883 -.993l-.117 -.007h-1a1 1 0 0 1 -.117 -1.993l.117 -.007h1z" stroke-width="0" fill="currentColor"></path>
                                    </svg>
                                    Vue d'ensemble
                                </a>
                                <h6 class="dropdown-header">Paramètres</h6>
                                <a href="#" class="dropdown-item"><!-- Download SVG icon from http://tabler-icons.io/i/edit -->
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon dropdown-item-icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <path d="M3 4m0 3a3 3 0 0 1 3 -3h12a3 3 0 0 1 3 3v2a3 3 0 0 1 -3 3h-12a3 3 0 0 1 -3 -3z"></path>
                                        <path d="M12 20h-6a3 3 0 0 1 -3 -3v-2a3 3 0 0 1 3 -3h10.5"></path>
                                        <path d="M18 18m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0"></path>
                                        <path d="M18 14.5v1.5"></path>
                                        <path d="M18 20v1.5"></path>
                                        <path d="M21.032 16.25l-1.299 .75"></path>
                                        <path d="M16.27 19l-1.3 .75"></path>
                                        <path d="M14.97 16.25l1.3 .75"></path>
                                        <path d="M19.733 19l1.3 .75"></path>
                                        <path d="M7 8v.01"></path>
                                        <path d="M7 16v.01"></path>
                                    </svg>
                                    Gérer le proxy
                                </a>
                                <a href="#" class="dropdown-item"><!-- Download SVG icon from http://tabler-icons.io/i/edit -->
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon dropdown-item-icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <path d="M5 13a2 2 0 0 1 2 -2h10a2 2 0 0 1 2 2v6a2 2 0 0 1 -2 2h-10a2 2 0 0 1 -2 -2v-6z"></path>
                                        <path d="M11 16a1 1 0 1 0 2 0a1 1 0 0 0 -2 0"></path>
                                        <path d="M8 11v-4a4 4 0 1 1 8 0v4"></path>
                                    </svg>
                                    Certificat SSL
                                </a>
                                <h6 class="dropdown-header">Réseau</h6>
                                <a href="index.php?page=ServiceFirewall&id=<?=$_GET['id']?>" class="dropdown-item active"><!-- Download SVG icon from http://tabler-icons.io/i/edit -->
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon dropdown-item-icon icon-tabler-wall" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <path d="M4 4m0 2a2 2 0 0 1 2 -2h12a2 2 0 0 1 2 2v12a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2z"></path>
                                        <path d="M4 8h16"></path>
                                        <path d="M20 12h-16"></path>
                                        <path d="M4 16h16"></path>
                                        <path d="M9 4v4"></path>
                                        <path d="M14 8v4"></path>
                                        <path d="M8 12v4"></path>
                                        <path d="M16 12v4"></path>
                                        <path d="M11 16v4"></path>
                                    </svg>
                                    Firewall
                                </a>
                            </div>
                        </div>
                        <div class="col-md-9">
                            <div class="card">
                                <div class="card-header">
                                    <ul class="nav nav-tabs card-header-tabs" data-bs-toggle="tabs">
                                        <li class="nav-item">
                                            <a href="#tabs-home-13" class="nav-link active" data-bs-toggle="tab"><!-- Download SVG icon from http://tabler-icons.io/i/home -->
                                                <svg xmlns="http://www.w3.org/2000/svg" class="icon me-2" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                    <path d="M13 5h8"></path>
                                                    <path d="M13 9h5"></path>
                                                    <path d="M13 15h8"></path>
                                                    <path d="M13 19h5"></path>
                                                    <path d="M3 4m0 1a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v4a1 1 0 0 1 -1 1h-4a1 1 0 0 1 -1 -1z"></path>
                                                    <path d="M3 14m0 1a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v4a1 1 0 0 1 -1 1h-4a1 1 0 0 1 -1 -1z"></path>
                                                </svg>
                                                Liste des règles</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="#tabs-profile-13" class="nav-link" data-bs-toggle="tab"><!-- Download SVG icon from http://tabler-icons.io/i/user -->
                                                <svg xmlns="http://www.w3.org/2000/svg" class="icon me-2" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                    <path d="M3 15m0 2a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v2a2 2 0 0 1 -2 2h-2a2 2 0 0 1 -2 -2z"></path>
                                                    <path d="M15 15m0 2a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v2a2 2 0 0 1 -2 2h-2a2 2 0 0 1 -2 -2z"></path>
                                                    <path d="M9 3m0 2a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v2a2 2 0 0 1 -2 2h-2a2 2 0 0 1 -2 -2z"></path>
                                                    <path d="M6 15v-1a2 2 0 0 1 2 -2h8a2 2 0 0 1 2 2v1"></path>
                                                    <path d="M12 9l0 3"></path>
                                                </svg>
                                                Groupe d'IP/CIDR</a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="card-body">
                                    <div class="tab-content">
                                        <div class="tab-pane active show" id="tabs-home-13">
                                            <h4>Liste des règles</h4>
                                            <div class="col-lg-12">
                                                <div class="card">
                                                    <div class="table-responsive">
                                                        <table
                                                                class="table table-vcenter card-table">
                                                            <thead>
                                                            <tr>
                                                                <th>ID</th>
                                                                <th>Type</th>
                                                                <th>Src</th>
                                                                <th>Dst</th>
                                                                <th>Action</th>
                                                                <th>Service</th>
                                                                <th class="w-1"></th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            <?php

                                                            $count = -1;
                                                            foreach($VMFirewallRules['data'] as $element) {
                                                                $count++;

                                                                ?>
                                                                <tr>
                                                                    <td ><?=$VMFirewallRules['data'][$count]['pos']?></td>
                                                                    <td class="text-muted" >
                                                                        <?=$VMFirewallRules['data'][$count]['type']?>
                                                                    </td>
                                                                    <td ><?php if(isset($VMFirewallRules['data'][$count]['source'])) { echo $VMFirewallRules['data'][$count]['source']; } else { echo('-'); }?></td>
                                                                    <td ><?php if(isset($VMFirewallRules['data'][$count]['dest'])) { echo $VMFirewallRules['data'][$count]['dest']; } else { echo('-'); }?></td>
                                                                    <td class="text-muted" ><?=$VMFirewallRules['data'][$count]['action']?></td>
                                                                    <td class="text-muted" >
                                                                        <?=$VMFirewallRules['data'][$count]['macro']?>
                                                                    </td>
                                                                    <td>
                                                                        <a href="#">Edit</a>
                                                                    </td>
                                                                </tr>
                                                            <?php }?>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane" id="tabs-profile-13">
                                            <h4>Groupe d'IP/CIDR</h4>
                                            <div class="col-lg-12">
                                                <div class="card">
                                                    <div class="table-responsive">
                                                        <table
                                                                class="table table-vcenter card-table">
                                                            <thead>
                                                            <tr>
                                                                <th>ID</th>
                                                                <th>Name</th>
                                                                <th class="w-1"></th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            <?php

                                                            $count = -1;
                                                            foreach($VMFirewallIPset['data'] as $element) {
                                                                $count++;

                                                                ?>
                                                                <tr>
                                                                    <td ><?=$count?></td>
                                                                    <td class="text-muted" >
                                                                        <?=$VMFirewallIPset['data'][$count]['name']?>
                                                                    </td>
                                                                    <td>
                                                                        <a href="#">Edit</a>
                                                                    </td>
                                                                </tr>
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
                        </div>
                    </div>
                </div>
            </div>
            <?php require_once('views/includes/footer.php');?>
        </div>
    </div>
    <div class="modal modal-blur fade" id="modal-report" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">New report</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Name</label>
                        <input type="text" class="form-control" name="example-text-input" placeholder="Your report name">
                    </div>
                    <label class="form-label">Report type</label>
                    <div class="form-selectgroup-boxes row mb-3">
                        <div class="col-lg-6">
                            <label class="form-selectgroup-item">
                                <input type="radio" name="report-type" value="1" class="form-selectgroup-input" checked>
                                <span class="form-selectgroup-label d-flex align-items-center p-3">
                        <span class="me-3">
                          <span class="form-selectgroup-check"></span>
                        </span>
                        <span class="form-selectgroup-label-content">
                          <span class="form-selectgroup-title strong mb-1">Simple</span>
                          <span class="d-block text-muted">Provide only basic data needed for the report</span>
                        </span>
                      </span>
                            </label>
                        </div>
                        <div class="col-lg-6">
                            <label class="form-selectgroup-item">
                                <input type="radio" name="report-type" value="1" class="form-selectgroup-input">
                                <span class="form-selectgroup-label d-flex align-items-center p-3">
                        <span class="me-3">
                          <span class="form-selectgroup-check"></span>
                        </span>
                        <span class="form-selectgroup-label-content">
                          <span class="form-selectgroup-title strong mb-1">Advanced</span>
                          <span class="d-block text-muted">Insert charts and additional advanced analyses to be inserted in the report</span>
                        </span>
                      </span>
                            </label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="mb-3">
                                <label class="form-label">Report url</label>
                                <div class="input-group input-group-flat">
                        <span class="input-group-text">
                          https://tabler.io/reports/
                        </span>
                                    <input type="text" class="form-control ps-0"  value="report-01" autocomplete="off">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="mb-3">
                                <label class="form-label">Visibility</label>
                                <select class="form-select">
                                    <option value="1" selected>Private</option>
                                    <option value="2">Public</option>
                                    <option value="3">Hidden</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label class="form-label">Client name</label>
                                <input type="text" class="form-control">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label class="form-label">Reporting period</label>
                                <input type="date" class="form-control">
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div>
                                <label class="form-label">Additional information</label>
                                <textarea class="form-control" rows="3"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <a href="#" class="btn btn-link link-secondary" data-bs-dismiss="modal">
                        Cancel
                    </a>
                    <a href="#" class="btn btn-primary ms-auto" data-bs-dismiss="modal">
                        <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 5l0 14" /><path d="M5 12l14 0" /></svg>
                        Create new report
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- Libs JS -->
    <script src="./dist/libs/apexcharts/dist/apexcharts.min.js?1674944402" defer></script>
    <script src="./dist/libs/jsvectormap/dist/js/jsvectormap.min.js?1674944402" defer></script>
    <script src="./dist/libs/jsvectormap/dist/maps/world.js?1674944402" defer></script>
    <script src="./dist/libs/jsvectormap/dist/maps/world-merc.js?1674944402" defer></script>
    <!-- Tabler Core -->
    <script src="./dist/js/tabler.min.js?1674944402" defer></script>
    <script src="./dist/js/demo.min.js?1674944402" defer></script>

<?php $content = ob_get_clean(); ?>

<?php require('views/layouts/services/ServiceFirewallLayout.php') ?>