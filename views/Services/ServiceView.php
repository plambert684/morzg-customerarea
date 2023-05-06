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
                              <span class="d-none d-sm-inline">
                                <a href="#" class="btn">
                                  New view
                                </a>
                              </span>
                                <a href="#" class="btn btn-primary d-none d-sm-inline-block" data-bs-toggle="modal" data-bs-target="#modal-report">
                                    <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 5l0 14" /><path d="M5 12l14 0" /></svg>
                                    Create new report
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
                    <div class="row row-deck row-cards">
                        <div class="col-sm-6 col-lg-3">
                            <div class="dropdown-menu dropdown-menu-demo">
                                <a href="index.php?page=Service&id=<?=$_GET['id']?>" class="dropdown-item active"><!-- Download SVG icon from http://tabler-icons.io/i/activity -->
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
                                <a href="index.php?page=ServiceFirewall&id=<?=$_GET['id']?>" class="dropdown-item"><!-- Download SVG icon from http://tabler-icons.io/i/edit -->
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
                        <div class="col-lg-9">
                            <div class="row row-cards">
                                <div class="col-sm-6 col-lg-4">
                                    <div class="card card-sm">
                                        <div class="card-body">
                                            <div class="row align-items-center">
                                                <div class="col-auto">
                                                    <span class="bg-primary text-white avatar"><!-- Download SVG icon from http://tabler-icons.io/i/currency-dollar -->
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-cpu-2" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                           <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                           <path d="M5 5m0 1a1 1 0 0 1 1 -1h12a1 1 0 0 1 1 1v12a1 1 0 0 1 -1 1h-12a1 1 0 0 1 -1 -1z"></path>
                                                           <path d="M8 10v-2h2m6 6v2h-2m-4 0h-2v-2m8 -4v-2h-2"></path>
                                                           <path d="M3 10h2"></path>
                                                           <path d="M3 14h2"></path>
                                                           <path d="M10 3v2"></path>
                                                           <path d="M14 3v2"></path>
                                                           <path d="M21 10h-2"></path>
                                                           <path d="M21 14h-2"></path>
                                                           <path d="M14 21v-2"></path>
                                                           <path d="M10 21v-2"></path>
                                                        </svg>
                                                    </span>
                                                </div>
                                                <div class="col">
                                                    <div class="font-weight-medium">
                                                        <span id="cpu"><?=$CPUconsumption?></span>%
                                                    </div>
                                                    <div class="text-muted">
                                                        Total : <?=$VMInfo['data']['cpus']?> vCores
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-lg-4">
                                    <div class="card card-sm">
                                        <div class="card-body">
                                            <div class="row align-items-center">
                                                <div class="col-auto">
                                                    <span class="bg-green text-white avatar"><!-- Download SVG icon from http://tabler-icons.io/i/shopping-cart -->
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-download" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                           <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                           <path d="M4 17v2a2 2 0 0 0 2 2h12a2 2 0 0 0 2 -2v-2"></path>
                                                           <path d="M7 11l5 5l5 -5"></path>
                                                           <path d="M12 4l0 12"></path>
                                                        </svg>
                                                    </span>
                                                </div>
                                                <div class="col">
                                                    <div class="font-weight-medium">
                                                        <span id="netin"><?=$NetworkIN?></span> GB
                                                    </div>
                                                    <div class="text-muted">
                                                        Réseau entrant (total)
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-lg-4">
                                    <div class="card card-sm">
                                        <div class="card-body">
                                            <div class="row align-items-center">
                                                <div class="col-auto">
                                                    <span class="bg-yellow text-white avatar"><!-- Download SVG icon from http://tabler-icons.io/i/brand-twitter -->
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-upload" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                           <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                           <path d="M4 17v2a2 2 0 0 0 2 2h12a2 2 0 0 0 2 -2v-2"></path>
                                                           <path d="M7 9l5 -5l5 5"></path>
                                                           <path d="M12 4l0 12"></path>
                                                        </svg>
                                                    </span>
                                                </div>
                                                <div class="col">
                                                    <div class="font-weight-medium">
                                                        <span id="netout"><?=$NetworkOUT?></span> GB
                                                    </div>
                                                    <div class="text-muted">
                                                        Réseau sortant (total)
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

    <script>
        const cpuUrl = "http://192.168.2.17/src/services/proxmox/ajax/vm/getCPU.php?vmid=<?=$getServiceSettings->vm_id?>";
        const netoutUrl = "http://192.168.2.17/src/services/proxmox/ajax/vm/getNetout.php?vmid=<?=$getServiceSettings->vm_id?>";
        const netinUrl = "http://192.168.2.17/src/services/proxmox/ajax/vm/getNetin.php?vmid=<?=$getServiceSettings->vm_id?>";

        function fetchData(url) {
            return fetch(url)
                .then(response => response.text())
                .then(data => parseFloat(data));
        }

        function updateData() {
            Promise.all([
                fetchData(cpuUrl),
                fetchData(netoutUrl),
                fetchData(netinUrl)
            ]).then(([cpu, netout, netin]) => {
                document.getElementById("cpu").innerHTML = (cpu * 100).toFixed(2);
                document.getElementById("netout").innerHTML = netout;
                document.getElementById("netin").innerHTML = netin;
            });
        }

        setInterval(updateData, 2000);
    </script>

<?php $content = ob_get_clean(); ?>

<?php require('views/layouts/services/ServiceFirewallLayout.php') ?>