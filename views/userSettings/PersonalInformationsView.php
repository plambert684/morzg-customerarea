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
                        <div class="page-pretitle">
                            <?=$langData["userPage"]["pre-title"]?>
                        </div>
                        <h2 class="page-title">
                            <?=$langData["userPage"]["title"]?>
                        </h2>
                    </div>
                </div>
            </div>
        </div>
        <!-- Page body -->
        <div class="page-body">
            <div class="container-xl">
                <div class="card">
                    <div class="row g-0">
                        <div class="col-3 d-none d-md-block border-end">
                            <div class="card-body">
                                <div class="list-group list-group-transparent">
                                    <a href="index.php?page=PreferencesSettings" class="list-group-item list-group-item-action d-flex align-items-center"><?=$langData["userPage"]["menu"]["preferences"]?></a>
                                    <a href="" class="list-group-item list-group-item-action d-flex align-items-center"><?=$langData["userPage"]["menu"]["billing-informations"]?></a>
                                    <a href="index.php?page=PersonalInformationsSettings" class="list-group-item list-group-item-action d-flex align-items-center active"><?=$langData["userPage"]["menu"]["personal-informations"]?></a>
                                    <a href="./settings-plan.html" class="list-group-item list-group-item-action d-flex align-items-center"><?=$langData["userPage"]["menu"]["payment-methods"]?></a>
                                </div>
                            </div>
                        </div>
                        <div class="col d-flex flex-column">
                            <form action="index.php?page=PersonalInformationsSettings&action=updatePersonalInformations" method="post">
                                <div class="card-body">
                                    <?php

                                        if(isset($_SESSION['message'])) {
                                            echo $_SESSION['message'];
                                        }

                                    ?>
                                    <h2 class="mb-4"><?=$langData["userPage"]["personal-informations"]['title']?></h2>
                                    <div class="row g-3">
                                        <div class="col-md">
                                            <div class="form-label"><?=$langData["userPage"]["personal-informations"]["fields"]["first-name"]?></div>
                                            <input type="text" id="first_name" name="first_name" class="form-control" value='<?=$getUser->first_name?>'>
                                        </div>
                                        <div class="col-md">
                                            <div class="form-label"><?=$langData["userPage"]["personal-informations"]["fields"]["last-name"]?></div>
                                            <input type="text" id="last_name" name="last_name" class="form-control" value="<?=$getUser->last_name?>">
                                        </div>
                                        <div class="col-md">
                                            <div class="form-label"><?=$langData["userPage"]["personal-informations"]["fields"]["email"]?></div>
                                            <input type="mail" id="email" name="email" class="form-control" value="<?=$getUser->email?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer bg-transparent mt-auto">
                                    <div class="btn-list justify-content-end">
                                        <button class="btn btn-primary" type="submit" name="submit" id="submit"><?=$langData["userPage"]["personal-informations"]['button']?></button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <footer class="footer footer-transparent d-print-none">
            <div class="container-xl">
                <div class="row text-center align-items-center flex-row-reverse">
                    <div class="col-lg-auto ms-lg-auto">
                        <ul class="list-inline list-inline-dots mb-0">
                            <li class="list-inline-item"><a href="./docs/" class="link-secondary">Documentation</a></li>
                            <li class="list-inline-item"><a href="./license.html" class="link-secondary">License</a></li>
                            <li class="list-inline-item"><a href="https://github.com/tabler/tabler" target="_blank" class="link-secondary" rel="noopener">Source code</a></li>
                            <li class="list-inline-item">
                                <a href="https://github.com/sponsors/codecalm" target="_blank" class="link-secondary" rel="noopener">
                                    <!-- Download SVG icon from http://tabler-icons.io/i/heart -->
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon text-pink icon-filled icon-inline" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M19.5 12.572l-7.5 7.428l-7.5 -7.428a5 5 0 1 1 7.5 -6.566a5 5 0 1 1 7.5 6.572" /></svg>
                                    Sponsor
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-12 col-lg-auto mt-3 mt-lg-0">
                        <ul class="list-inline list-inline-dots mb-0">
                            <li class="list-inline-item">
                                Copyright &copy; 2023
                                <a href="." class="link-secondary">Tabler</a>.
                                All rights reserved.
                            </li>
                            <li class="list-inline-item">
                                <a href="./changelog.html" class="link-secondary" rel="noopener">
                                    v1.0.0-beta17
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </footer>
    </div>
</div>
<!-- Libs JS -->
<!-- Tabler Core -->
<script src="./dist/js/tabler.min.js?1674944402" defer></script>
<script src="./dist/js/demo.min.js?1674944402" defer></script>

<?php $content = ob_get_clean(); ?>

<?php require('views/layouts/userSettings/PersonalInformationsLayout.php') ?>