<?php

    require_once('src/lib/Database.php');
    require_once('src/models/users/GetUserModel.php');
    require_once('src/models/users/UpdateUser.php');

    use Clientarea\Lib\Database\DatabaseConnection;
    use Clientarea\Model\Users\Get\UserRepository;
    use Clientarea\Model\Users\Update\UpdateUserRepository;

    if(!isset($_SESSION['csrf_token'])) {
        $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
    }

    function userPreferencesPage() {

        $User = new UserRepository();
        $User->connection = new DatabaseConnection();

        $getUser = $User->getUser($_SESSION['user_id']);

        $lang = $getUser->lang;

        $file = file_get_contents("lang/$lang.json");
        $langData = json_decode($file, true);

        require('views/userSettings/PreferencesView.php');

    }

    function updateUserPreference($post) {
        $updateUser = new UpdateUserRepository();
        $updateUser->connection = new DatabaseConnection();

        extract($post);

        // Vérifier le jeton CSRF
        if (isset($csrf_token) && $csrf_token === $_SESSION['csrf_token']) {
            if (isset($lang)) {
                $lang = htmlspecialchars($lang);
                if ($lang == "fr" or $lang == "en" or $lang == "hu") {
                    // Mettre à jour la préférence de l'utilisateur
                    $_SESSION['message'] = '<div class="alert alert-important alert-success alert-dismissible" role="alert"><div class="d-flex"><div>      <svg xmlns="http://www.w3.org/2000/svg" class="icon alert-icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M5 12l5 5l10 -10" /></svg></div><div>The language has been changed.</div></div><a class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="close"></a></div>';
                    $updateUser->updatePreference($_SESSION['user_id'], $lang);
                } else {
                    $_SESSION['message'] = '<div class="alert alert-important alert-danger alert-dismissible" role="alert"><div class="d-flex"><div>            <svg xmlns="http://www.w3.org/2000/svg" class="icon alert-icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0" /><path d="M12 8l0 4" /><path d="M12 16l.01 0" /></svg></div><div>La langue demandée n\'est pas prises en charge ou est invalide.</div></div><a class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="close"></a></div>';
                }
            }
        } else {
            // Le jeton CSRF est invalide ou manquant
            $_SESSION['message'] = '<div class="alert alert-important alert-danger alert-dismissible" role="alert"><div class="d-flex"><div>            <svg xmlns="http://www.w3.org/2000/svg" class="icon alert-icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0" /><path d="M12 8l0 4" /><path d="M12 16l.01 0" /></svg></div><div>Le jeton est invalide.</div></div><a class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="close"></a></div>';
        }
    }