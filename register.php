<?php
namespace App\Models;

require_once 'init.php';
include 'includes/header.php';
if (isset($_POST['register'])) {
    $validation = new Validator($_POST);
    $errors = $validation->validateForm();
    var_dump($errors);
    if(empty($errors)){
        $user= new User;
        $user->createUser($_POST['username'],$_POST['password']);
        header("location: login.php");
    }
}
// var_dump($_POST);
// var_dump($request = $_SERVER['REQUEST_URI'])  // /tech3/register.php;
// var_dump(__DIR__); //  C:\Program Files\Ampps\www\tech3

?>
    <div class="wrapper col-6 mt-5 mx-auto" style="height: 60vh;">
        <h2>Sign Up</h2>
        <p>Please fill this form to create an account.</p>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group">
                <label>Username</label>
                <input type="text" name="username" class="form-control <?php echo (!empty($errors['username']) ? 'is-invalid' : '') ?>" value="<?=$_POST['username']?>">
                <div class="invalid-feedback"><?php echo $errors['username'] ?></div>
                <label>Password</label>
                <input type="password" name="password" class="form-control <?php echo (!empty($errors['password']) ? 'is-invalid' : '') ?>" value="<?=$_POST['password']?>">
                <div class="invalid-feedback"><?php echo $errors['password'] ?></div>
                <label>Confirm password</label>
                <input type="password" name="password2" class="form-control <?php echo (!empty($errors['password2']) ? 'is-invalid' : '') ?>" value="">
                <div class="invalid-feedback"><?php echo $errors['password2'] ?></div>
            </div>
            <button type="submit" name="register" class="btn btn-primary mt-3">Submit</button>
            <p>Already have an account? <a href="login.php">Login here</a>.</p>
        </form>

    </div>

    <?php
include 'includes/footer.php';

?>