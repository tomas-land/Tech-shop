<?php
function logedin(){
   return (isset($_SESSION['logedin']) && $_SESSION['logedin']===true);
      
}