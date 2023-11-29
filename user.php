<?php

class User{
    public $email = "";
    public $password = "";
    public $password_hash = "";
    public $token = "";
    private $connection;

    function __contruct($connection, $email, $password) {
        $this->email = mysqli_real_escape_string($connection, $email);
        $this->password = password_hash($connection, $password);

        $this->token = md5(rand().time());
        $this->password_hash = password_hash($password, PASSWORD_BCRYPT);

        $this->connection = $connection;
    }
    
    function insert() {
        $sql ="
        INSERT INTO users (
            email,
            password,
            token,
            is_active
            ) VALUES (
                '{$this->email}',
                '{$this->password_hash}',
                '{$this->token}',
                '0'
            )
        ";//sql query
    
        $sqlQuery = $this->connection->query($sql);
    
        if(!sqlQuery){
            die("MySQL query failed" . mysqli_error($this->connection));
        }
    }
}
