<?php
class Database
{
    var $host;
    var $user;
    var $password;
    var $database;
    var $connection;

    public function connect()
    {
        if ($_SERVER['SERVER_NAME'] == 'stockcar.budaweb.com.br') {
            $this->host = "localhost";
            $this->user = "budaweb_stockcar";
            $this->password = "key!stockcar";
            $this->database   = "budaweb_stockcar";
        } else {
            if ($_SERVER['SERVER_PORT'] == "80") {
                $this->host = "localhost";
            } else {
                $this->host = "db:3355";
            }
            $this->user = "budaweb_stockcar";
            $this->password = "key!stockcar";
            $this->database   = "budaweb_stockcar";
        }

        $this->connection = new mysqli($this->host, $this->user, $this->password, $this->database);
        if ($this->connection->connect_error) {
            die("Falha na conexão com o banco de dados: " . $this->connection->connect_error);
        }
        $this->connection->set_charset('utf8');
    }

    public function query($sql)
    {
        $result = $this->connection->query($sql);
        if ($result === false) {
            die("Erro na consulta: " . $this->connection->error);
        }
        return $result;
    }

    public function disconnect()
    {
        $this->connection->close();
    }
}
