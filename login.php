<?php
namespace App\Models;

use App\Models\Validator;
require_once 'init.php';
include 'includes/header.php';
if (isset($_POST['login'])) {
    $validation = new Validator($_POST);
    $errors = $validation->validateForm();

    echo "<pre>";
    //        var_dump($errors);
    // var_dump($_POST);
    echo "</pre>";

    if (empty($errors)) {
        $user = new User;
        $user->loginUser($_POST['username'], $_POST['password']);
        
        if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
            header("location: account/index.php");
            exit;
        }
    }

}
var_dump($_SESSION);
// session_destroy();
?>
<div class="wrapper col-6 mt-5 mx-auto" style="height: 60vh;">
        <h2>Login</h2>
        <p>Please fill this form to login.</p>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group">
                <label>Username</label>
                  <input type="text" name="username" class="form-control <?php echo (!empty($errors['username']) ? 'is-invalid' : '') ?>" value="<?=$_POST['username']?>">
                <div class="invalid-feedback"><?php echo $errors['username'] ?></div>
                <label>Password</label>
                <input type="password" name="password" class="form-control <?php echo (!empty($errors['password']) ? 'is-invalid' : '') ?>" value="">
                <div class="invalid-feedback"><?php echo $errors['password'] ?></div>
            </div>
            <button type="submit" name="login" class="btn btn-primary mt-3">Submit</button>
        </form>
    </div>


    <?php
include 'includes/footer.php';

// issue:validating inputs

?>

