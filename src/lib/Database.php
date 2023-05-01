<?php

namespace Clientarea\Lib\Database;

use PDO;

class DatabaseConnection
{
    public ?PDO $database = null;

    public function getConnection(): PDO
    {
        if ($this->database === null) {
            $this->database = new PDO('mysql:host=localhost;dbname=clientarea;charset=utf8', 'u_clientarea', ':C[g864Quk(M');
        }

        return $this->database;
    }
}
