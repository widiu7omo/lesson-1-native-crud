<?php

class Database
{
    private $dbUrl = "mysql:host=localhost;dbname=akademik;";
    private $user = 'root';
    private $password = '';

    private $instance;

    public function __construct()
    {
        try {
            $this->instance = new PDO($this->dbUrl, $this->user, $this->password);
        } catch (PDOException $exception) {
            file_put_contents('PDOErrors.txt', $exception->getMessage(), FILE_APPEND);
            echo 'Tidak bisa terkoneksi ke database. Periksa errornya di PDOErrors.txt';
        }
    }

    public function query($query, $payload = []): array
    {
        try {
            $statement = $this->instance->prepare($query);
            $statusQuery = $statement->execute($payload);
            $this->instance = null;
            return [$statusQuery, $statement];
        } catch (PDOException $exception) {
            file_put_contents('PDOErrors.txt', $exception->getMessage(), FILE_APPEND);
            echo 'Query Error. Periksa errornya di PDOErrors.txt';
            $this->instance = null;
            return [false, null];
        }
    }

    public function get($query, $payload = [])
    {
        [$result, $data] = $this->query($query, $payload);
        $data->setFetchMode(PDO::FETCH_OBJ);
        if ($result) {
            return $data->fetchAll();
        }
        $this->instance = null;
        return $result;
    }
}