<?php

class Koneksi
{
    private $dbhost = "localhost";
    private $dbuser = "root";
    private $dbpass = "";
    private $dbname = "lanflix";
    protected $conn;

    function __construct()
    {
        $this->conn = new mysqli($this->dbhost, $this->dbuser, $this->dbpass, $this->dbname);
        // cek koneksi
        if ($this->conn->connect_error) {
            echo 'Koneksi gagal!';
        } else {
            return $this->conn;
        }
    } //construct 

} // class
