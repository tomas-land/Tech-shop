<?php

namespace App\Models;
use Steampixel\Route;




require_once './vendor/autoload.php';
require_once 'config.php';
include 'init.php';
include 'view/inc/header.php';


Route::add('/', function() {
  require 'view/homepage.php';
 });

Route::add('/register', function() {
  require_once 'view/register.php';
 });
Route::add('/login', function() {
  require 'view/login.php';
 });
 
 // Run the router
 Route::run('/tech3');





  


include 'view/inc/footer.php';

?>

