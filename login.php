<?php
namespace App\Models;

require_once 'init.php';
include 'includes/header.php';

if (isset($_POST['login'])) {
    $validation = new Validator($_POST);
    $errors = $validation->validateForm();
    if (empty($errors)) {
        $user = new User;
        $user->loginUser($_POST['username'], $_POST['password']);
        if (!$user->logedin) {
            $log_error = $user->log_error;
        } else {
            if($_SESSION['role'] == null){
                redirect('customer_account/index.php');
            } else {
                redirect('admin_account/index.php');
            }
            }
        }
    }

// if (isset($_SESSION["logedin"]) && $_SESSION["logedin"] === true) {
//     header("location: index.php");
//     exit;
// }
var_dump($_SESSION);
// session_destroy();
?>
<div class="wrapper col-6 mt-5 mx-auto" style="height: 60vh;">
        <h2>Login</h2>
        <p>Please fill this form to login.</p>
        <div class="" style="color: red;"><?php print($log_error)?></div>
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

?>

