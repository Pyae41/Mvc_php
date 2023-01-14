<?php

namespace app\core;

use Dotenv\Dotenv;
use PDO;
use PDOException;

trait Database
{

    private function connect()
    {
        $dotenv = Dotenv::createImmutable(dirname(__DIR__));
        $dotenv->load();
        try{
            $pdo = new PDO("mysql:host=" . $_ENV["DB_HOST"] . ";port=" . $_ENV["DB_PORT"] . ";dbname=" . $_ENV["DB_NAME"], $_ENV["DB_USERNAME"], $_ENV["DB_PASSWORD"]);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        catch(PDOException $e){
            echo $e->getMessage();
        }

        return $pdo;
    }
    public function query($query, $data = [])
    {
        $con = $this->connect();
        $stm = $con->prepare($query);

        $check = $stm->execute($data);

        if ($check) {
            $result = $stm->fetchAll(PDO::FETCH_ASSOC);
            if (is_array($result) && count($result)) {
                return $result;
            }
        }

        return false;
    }

    public function updateQuery($query, $data = [])
    {

        $con = $this->connect();
        $stm = $con->prepare($query);

        return $stm->execute($data);
    }
    public function saveQuery($query, $data = [])
    {
        $con = $this->connect();
        $stm = $con->prepare($query);

        return $stm->execute($data);
    }
    public function deleteQuery($query)
    {
        $con = $this->connect();
        $stm = $con->prepare($query);

        return $stm->execute();
    }
}
