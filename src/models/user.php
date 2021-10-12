<?php
namespace App\Models;
use PDO;
use PDOException;
class User
{
    // protected $username = 'plll';
    // protected $password = 'fefef';
    private $db;
    // public $user;
    // public $pass;

    public function __construct()
    {
        $this->db = new Database;

    }

    public function addUser($user,$pass)
    {
        // $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->dbname;

        // $options = array(
        //     PDO::ATTR_PERSISTENT => true,
        //     PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,

        // );
        // try {
        //     $this->dbh = new PDO($dsn, $this->user, $this->pass, $options);
        // } catch (PDOException $e) {
        //     $this->error = $e->getMessage();
        // }
        // $query=("INSERT INTO users (username, password) VALUES (:username, :password)");
        // $this->stmt = $this->dbh->prepare($query);

        // $this->stmt->bindValue(':username', $userf, PDO::PARAM_STR);
        // $this->stmt->bindValue(':password', $passf, PDO::PARAM_STR);

        // $this->stmt->execute();

        
  $this->db->query("INSERT INTO users (username, password) VALUES (:username, :password)");
        $this->db->bind(':username', $user);
        $this->db->bind(':password', $pass);
        $this->db->execute();

}
 

}