<?php

require_once("auth/config.php");

$loginAction = AuthHandler::login();

$title = "Log In";

?>

<?php require_once("layout/header.php"); ?>
<div class="container">
    <div class="row justify-content-md-center">
        <div class="col-lg-6">
            <div class="jumbotron text-center mt-5 bg-dark text-white">
                <h1>Log In</h1>
            </div>
            <?php echo $loginAction; ?>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" autocomplete="off">
                <div class="form-group">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-user"></i></span>
                        <input type="text" class="form-control" name="userName" id="userName" placeholder="Username" autofocus required>
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-key"></i></span>
                        <input type="password" class="form-control" name="password" id="password" placeholder="Password" required>
                    </div>
                </div>
                <label class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" name="remember" value="true">
                    <span class="custom-control-indicator"></span>
                    <span class="custom-control-description">Remember me</span>
                </label>
                <div class="form-group">
                    <small class="text-muted">Not a member yet? <a href="register.php">Register</a></small>
                </div>
                <div class="form-group">
                    <div class="input-group">
                        <input type="submit" class="btn btn-success btn-block" name="login" value="Submit">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<?php require_once("layout/footer.php"); ?>
