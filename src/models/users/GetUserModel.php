<?php

    namespace Clientarea\Model\Users\Get;

    require_once('src/lib/Database.php');

    use Clientarea\Lib\Database\DatabaseConnection;

    class UserRepository {

        public DatabaseConnection $connection;

        public function getUserForLogin($email) {

            $checkResult = 0;
            $statement = $this->connection->getConnection()->prepare('SELECT id, email, password, status FROM user WHERE email = ?');
            $statement->execute(array($email));
            $result = $statement->fetch();

            if($result > 0) {
                $User = new UserRepository();
                $User->id = $result['id'];
                $User->email = $result['email'];
                $User->password = $result['password'];
                $User->status = $result['status'];

                return $User;

            } else {
                return $result;
            }

        }

        public function getUser($id) {

            $checkResult = 0;
            $statement = $this->connection->getConnection()->prepare('SELECT * FROM user WHERE id = ?');
            $statement->execute(array($id));
            $result = $statement->fetch();

            if($result > 0) {
                $User = new UserRepository();
                $User->id = $result['id'];
                $User->email = $result['email'];
                $User->username = $result['username'];
                $User->first_name = $result['first_name'];
                $User->last_name = $result['last_name'];
                $User->address = $result['address'];
                $User->city = $result['city'];
                $User->state = $result['state'];
                $User->postal_code = $result['postal_code'];
                $User->country = $result['country'];
                $User->password = $result['password'];
                $User->credit = $result['credit'];
                $User->lang = $result['lang'];
                $User->status = $result['status'];

                return $User;

            } else {
                return $result;
            }

        }

    }



