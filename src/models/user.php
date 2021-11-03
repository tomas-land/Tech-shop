<?php
namespace App\Models;

class User
{

    private $db;
    public $log_error;
    public $logedin;
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
        $this->db->query("SELECT id,username,password,role FROM users WHERE username = :username");
        $this->db->bind(":username", $username);
        $user_data = $this->db->resultSetArray();
        if (!empty($user_data)) {
            foreach ($user_data as $data) {
                $user_id = $data['id'];
                $user_name = $data['username'];
                $user_hashed_pass = $data['password'];
                $user_role = $data['role'];
            }
            if (password_verify($password, $user_hashed_pass)) {
                $_SESSION['logedin'] = true;
                $_SESSION['username'] = $user_name;
                $_SESSION['userid'] = $user_id;
                $_SESSION['role'] = $user_role;

                $this->logedin = true;
            } else {
                $this->log_error = 'Incorrect username or password';
            }

        } else {
            $this->log_error = 'Incorrect username or password';
        }

    }
}
