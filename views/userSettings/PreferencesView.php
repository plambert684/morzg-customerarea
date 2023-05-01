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
                                        <a href="index.php?page=PreferencesSettings" class="list-group-item list-group-item-action d-flex align-items-center active"><?=$langData["userPage"]["menu"]["preferences"]?></a>
                                        <a href="" class="list-group-item list-group-item-action d-flex align-items-center"><?=$langData["userPage"]["menu"]["billing-informations"]?></a>
                                        <a href="index.php?page=PersonalInformationsSettings" class="list-group-item list-group-item-action d-flex align-items-center"><?=$langData["userPage"]["menu"]["personal-informations"]?></a>
                                        <a href="./settings-plan.html" class="list-group-item list-group-item-action d-flex align-items-center"><?=$langData["userPage"]["menu"]["payment-methods"]?></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col d-flex flex-column">
                                <form action="index.php?page=PreferencesSettings&action=updatePreferences" method="post">
                                    <div class="card-body">
                                        <?php

                                            if(isset($_SESSION['message'])) {
                                                echo $_SESSION['message'];
                                            }

                                        ?>
                                        <h2 class="mb-4"><?=$langData["userPage"]["preferences"]["title"]?></h2>
                                        <div class="row g-3">
                                            <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">
                                            <div class="mb-3">
                                                <label class="form-label"><?=$langData["userPage"]["preferences"]["language-title"]?></h2></label>
                                                <select type="text" id="lang" name="lang" class="form-select" id="select-countries" value="">
                                                    <option value="fr" data-custom-properties="&lt;span class=&quot;flag flag-xs flag-country-fr&quot;&gt;&lt;/span&gt;">Français</option>
                                                    <option value="en" data-custom-properties="&lt;span class=&quot;flag flag-xs flag-country-en&quot;&gt;&lt;/span&gt;">English</option>
                                                    <option value="hu" data-custom-properties="&lt;span class=&quot;flag flag-xs flag-country-en&quot;&gt;&lt;/span&gt;">Magyar</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer bg-transparent mt-auto">
                                        <div class="btn-list justify-content-end">
                                            <button type="submit" id="submit" name="submit" class="btn btn-primary">
                                                <?=$langData["userPage"]["preferences"]["button"]?>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php require_once('views/includes/footer.php');?>
        </div>
    </div>
    <!-- Libs JS -->
    <script src="./dist/libs/nouislider/dist/nouislider.min.js?1674944402" defer></script>
    <script src="./dist/libs/litepicker/dist/litepicker.js?1674944402" defer></script>
    <script src="./dist/libs/tom-select/dist/js/tom-select.base.min.js?1674944402" defer></script>
    <!-- Tabler Core -->
    <script src="./dist/js/tabler.min.js?1674944402" defer></script>
    <script src="./dist/js/demo.min.js?1674944402" defer></script>

<?php $content = ob_get_clean(); ?>

<?php require('views/layouts/userSettings/PreferencesLayout.php') ?>