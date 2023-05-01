<?php

require_once('src/lib/Database.php');
require('src/models/users/GetUserModel.php');

use Clientarea\Lib\Database\DatabaseConnection;
use Clientarea\Model\Users\Get\UserRepository;

function loginPage() {

    require('views/authentification/LoginView.php');

}

function login(array $post) {

    if (!empty($post['email']) && !empty($post['password'])) {
        if(filter_var($post['email'], FILTER_VALIDATE_EMAIL)){

            $getUser = null;

            $User = new Clientarea\Model\Users\Get\UserRepository();
            $User->connection = new DatabaseConnection();

            $getUser = $User->getUserForLogin($post['email']);

            $_SESSION['message'] = '';

            if (($getUser != null) && password_verify($post['password'], $getUser->password)) {
                if ($getUser->status == 1) {
                    // Générer un jeton CSRF unique
                    $csrf_token = bin2hex(random_bytes(32));

                    // Stocker le jeton CSRF dans la variable de session
                    $_SESSION['csrf_token'] = $csrf_token;

                    // Ajouter le jeton CSRF en tant que champ caché dans le formulaire de connexion
                    echo '<input type="hidden" name="csrf_token" value="' . $csrf_token . '">';

                    $_SESSION['user_id'] = $getUser->id;
                    header('Location: index.php');
                }
            } else {
                $_SESSION['message'] = '<div class="alert alert-important alert-danger alert-dismissible" role="alert"><div class="d-flex"><div><svg xmlns="http://www.w3.org/2000/svg" class="icon alert-icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0" /><path d="M12 8l0 4" /><path d="M12 16l.01 0" /></svg></div><div>The password for this account is incorrect.</div></div><a class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="close"></a></div>';
            }
        } else {
            $_SESSION['message'] = '<div class="alert alert-important alert-danger alert-dismissible" role="alert"><div class="d-flex"><div><svg xmlns="http://www.w3.org/2000/svg" class="icon alert-icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0" /><path d="M12 8l0 4" /><path d="M12 16l.01 0" /></svg></div><div>The email address provided is invalid.</div></div><a class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="close"></a></div>';
        }
    } else {
        $_SESSION['message'] = '<div class="alert alert-important alert-danger alert-dismissible" role="alert"><div class="d-flex"><div><svg xmlns="http://www.w3.org/2000/svg" class="icon alert-icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0" /><path d="M12 8l0 4" /><path d="M12 16l.01 0" /></svg></div><div>Please complete all fields.</div></div><a class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="close"></a></div>';
    }

}