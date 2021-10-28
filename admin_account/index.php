admin
<?php
session_start();
var_dump($_SESSION);

if(!isset($_SESSION['role']) && ($_SESSION['role'] != 1)) {
    header("location: ../login.php");
    exit;
}

session_destroy();
