<?php
namespace App\Models;

class Validator
{
    private $db;
    private $data;
    private $errors = [];
    // private static $inputs = ['username', 'password', 'password2'];

    public function __construct($post_data)
    {
        $this->db = new Database;
        $this->data = $post_data;
    }

    public function validateForm()
    {

        // foreach (self::$inputs as $input) {
        //     if (!array_key_exists($input, $this->data)) {
        //         trigger_error("$input is not in data");
        //         return;
        //     }
        // }

        $this->validateUsername();
        $this->validatePassword();
        $this->confirmPassword();
        return $this->errors;

    }

    private function validateUsername()
    {
        $val = trim($this->data['username']);
        if (isset($_POST['register'])) {
            if (empty($val)) {
                $this->addError('username', 'Username cannot be empty');
            } elseif (!preg_match("/^[a-zA-Z0-9]{6,12}$/", $val)) {
                $this->addError('username', 'Username must be 6-12 chars long and contain only letters and numbers');
            } else {
                $this->db->query("SELECT username FROM users WHERE username = :name");
                $this->db->bind(':name', $val);
                $results = $this->db->resultSetArray();
                if ((array_filter($results))) {
                    $this->addError('username', 'Username already exists');
                }
            }} elseif (isset($_POST['login'])) {
            if (empty($val)) {
                $this->addError('username', 'Username cannot be empty');
            }
        }

    }
    private function validatePassword()
    {
        $val = trim($this->data['password']);
        if (isset($_POST['register'])) {
            if (empty($val)) {
                $this->addError('password', 'Password cannot be empty');
            } elseif (!preg_match('/^[a-zA-Z0-9]{6,12}$/', $val)) {
                $this->addError('password', 'Password must be 6-12 chars long and contain only letters and numbers');
            }
        } elseif (isset($_POST['login'])) {
            if (empty($val)) {
                $this->addError('password', 'Password cannot be empty');
            }
        }
    }
    private function confirmPassword()
    {
        if (isset($_POST['register'])) {
            $password1 = trim($this->data['password']);
            $password2 = trim($this->data['password2']);
            if ($password2 !== $password1) {
                $this->addError('password2', 'Password did not match');
            }
        }
    }
    private function addError($key, $val)
    {
        $this->errors[$key] = $val;
    }

}
