<?php
namespace App\Models;

// not sure about sanitizing inputs before using pdo
class User
{

    private $db;

    public function __construct()
    {

        $this->db = new Database;

    }

    public function createUser($username, $password)
    {
        $password = password_hash($password, PASSWORD_DEFAULT);
        $this->db->query("INSERT INTO users (username, password) VALUES (:username, :password)");
        $this->db->bind(':username', $username);
        $this->db->bind(':password', $password);
        $this->db->execute();

    }
    public function loginUser($username, $password)
    {

        // taking data from form and compare with db data
        // assign var  to session
        $this->db->query("SELECT id,username,password FROM users WHERE username = :username");
        $this->db->bind(":username", $username);
        $this->db->execute();
        $user_data = $this->db->resultSetArray();
        //    echo "<pre>";
        //    var_dump($user_data);
        //    echo "</pre>";
        if (!empty($user_data)) {
            foreach ($user_data as $data) {
                $user_id = $data['id'];
                $user_name = $data['username'];
                $user_hash_pass = $data['password'];
            }
            if (password_verify($password, $user_hash_pass)) {
                $_SESSION['loggedin']= true;
                $_SESSION['username']= $user_name;
                $_SESSION['userid']= $user_id;
            }
        }

    }
}
