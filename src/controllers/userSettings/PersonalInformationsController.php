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

    function userPersonalInformationsPage() {

        $User = new UserRepository();
        $User->connection = new DatabaseConnection();

        $getUser = $User->getUser($_SESSION['user_id']);

        $lang = $getUser->lang;

        $file = file_get_contents("lang/$lang.json");
        $langData = json_decode($file, true);

        require('views/userSettings/PersonalInformationsView.php');

    }

    function updateUserPersonalInformation($post) {

        $updateUser = new UpdateUserRepository();
        $updateUser->connection = new DatabaseConnection();

        $User = new UserRepository();
        $User->connection = new DatabaseConnection();

        $getUser = $User->getUser($_SESSION['user_id']);

        $lang = $getUser->lang;

        $file = file_get_contents("lang/$lang.json");
        $langData = json_decode($file, true);

        extract($post);
        if(isset($first_name) && ($last_name) && ($email)) {
            $email = htmlspecialchars($email);
            $first_name = htmlspecialchars($first_name);
            $last_name = htmlspecialchars($last_name);
            $_SESSION['message'] = '<div class="alert alert-important alert-success alert-dismissible" role="alert"><div class="d-flex"><div>      <svg xmlns="http://www.w3.org/2000/svg" class="icon alert-icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M5 12l5 5l10 -10" /></svg></div><div>' . $langData["userPage"]["personal-informations"]['update-message-confirmation'] . '</div></div><a class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="close"></a></div>';
            $updateUser->updateUserPersonalInformation($_SESSION['user_id'], $email, $first_name, $last_name);
        } else {
            $_SESSION['message'] = '<div class="alert alert-important alert-danger alert-dismissible" role="alert"><div class="d-flex"><div>            <svg xmlns="http://www.w3.org/2000/svg" class="icon alert-icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0" /><path d="M12 8l0 4" /><path d="M12 16l.01 0" /></svg></div><div>' . $langData["userPage"]["personal-informations"]['update-fields-error'] . '</div></div><a class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="close"></a></div>';
        }
    }