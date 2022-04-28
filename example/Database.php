<?php

class Database
{
    public PDO $connect;

    public function __construct()
    {

        try {

            $config = include 'config.php';
            $this->connect = new PDO("mysql:host=" . $config['host'] . ";dbname=" . $config['database'], $config['user'], $config['password'], [PDO::ATTR_EMULATE_PREPARES => false, PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
        }
         catch (PDOException $exception) {

            echo "Błąd połączenia z bazą danych:" . '<br><br>';
            ?>
            <a href="index.php">Wróć</a></br>
            <?php
            exit();
        }
    }

    public function runQuery($sql) {

        $query = $this->connect->prepare($sql);   
         return $query; 
    }
}

?>