<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link rel="stylesheet" href="public/assets/css/main.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title><?php SITE_TITLE?></title>
</head>
<header class="p-3 bg-dark text-white">
    <div class="container">
      <div class="d-flex flex-wrap align-items-center justify-content-center ">
        <a href="/tech3" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none text-lg fs-1 text-decoration-underline">
         TechShop
        </a>

        <ul class="nav col-6 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
        </ul>

        <!-- <form class="col-5 col-lg-auto mb-3 mb-lg-0 me-lg-3">
          <input type="search" class="form-control form-control-dark" placeholder="Search..." aria-label="Search">
        </form> -->
        <div class="text-end">

          <a href="cart.php" class="card-link p-5 "><button type="button" class="btn btn-warning my-2">Your Cart <?php ?><i class="fas fa-shopping-cart"></i></button></a>
          <?php
          if (logedin()) {
          ?>
           <a href="customer_account/index.php">Account</a>
          <?php
          } else {
          ?>
          <a href="login.php"><button type="button" class="btn btn-outline-light me-2">Login</button></a>
          <a href="register.php"><button type="button" class="btn btn-success">Register</button></a>
          <?php
          }
          ?>
        </div>
      </div>
    </div>
  </header>
<body>
    <div class="container">
