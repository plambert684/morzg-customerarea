<?php

    session_start();

    require_once('src/controllers/authentification/LoginController.php');
    require_once('src/controllers/DashboardController.php');
    require_once('src/controllers/ServicesController.php');
    require_once('src/controllers/services/ServiceController.php');
    require_once('src/controllers/services/ServiceFirewallController.php');
    require_once('src/controllers/billing/InvoicesController.php');
    require_once('src/controllers/billing/InvoiceController.php');
    require_once('src/controllers/tickets/TicketsController.php');

    #User settings
    require_once('src/controllers/userSettings/PreferencesController.php');
    require_once('src/controllers/userSettings/PersonalInformationsController.php');

    //Si action définie, et que...
    if (isset($_GET['action'])) {
        //cette dernière est égale à "login", alors on tente de connecter l'utilisateur.
        if ($_GET['action'] === "login") {
            login($_POST);
        }
        if ($_GET['action'] === "logout") {
            session_unset();
            session_destroy();
            header("Location: index.php");
        }
        if ($_GET['action'] === "updatePreferences") {
            updateUserPreference($_POST);
        } if ($_GET['action'] === "updatePersonalInformations") {
            updateUserPersonalInformation($_POST);
        }
    }

    if (isset($_GET['system'])) {
        if($_GET['system'] == "cronjob") {
            if(isset($_GET['id'])) {
                if($_GET['id'] == '1') {
                    
                }
            }
        }
    }

    if(!isset($_SESSION['user_id'])) {
        loginPage();
    } else {
        if (isset($_GET['page'])) {
            if($_GET['page'] == "Services") {
                servicesPage();
            } if($_GET['page'] == "Service") {
                if(isset($_GET['id'])) {
                    servicePage();
                } else {
                    servicesPage();
                }
            } if($_GET['page'] == "ServiceFirewall") {
                serviceFirewallPage();
            } if ($_GET['page'] == "Invoices") {
                invoicesPage();
            } if($_GET['page'] == "Invoice") {
                invoicePage();
            } if($_GET['page'] == "Tickets") {
                ticketsPage();
            } if ($_GET['page'] == "PreferencesSettings") {
                userPreferencesPage();
            } if($_GET['page'] == "PersonalInformationsSettings") {
                userPersonalInformationsPage();
            }
        } else {
            dashboardPage();
        }
    }

    unset($_SESSION['message']);