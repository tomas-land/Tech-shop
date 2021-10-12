<?php
use App\Models\User;

$new_user = new User;
if(isset($_POST['submit'])){
    $user = $_POST['username'];
    $pass = $_POST['password'];
$new_user->addUser($user,$pass);    
  }

?>