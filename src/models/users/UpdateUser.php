<?php

    namespace Clientarea\Model\Users\Update;

    require_once('src/lib/Database.php');

    use Clientarea\Lib\Database\DatabaseConnection;

    class UpdateUserRepository {

        public DatabaseConnection $connection;

        public function updatePreference($userId, $lang) {

            $statement = $this->connection->getConnection()->prepare('UPDATE user SET lang = ? WHERE id = ?');
            $statement->execute(array("$lang", $userId));

        }

        public function updateUserPersonalInformation(int $userId, string $email, string $firstName, string $lastName) {

            $statement = $this->connection->getConnection()->prepare('UPDATE user SET `email` = ?, `first_name` = ?, `last_name` = ? WHERE id = ?');
            $statement->execute(array($email, $firstName, $lastName, $userId));

        }

    }



