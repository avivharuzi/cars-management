<?php

require_once("auth/config.php");

$registerAction = AuthHandler::register();

$title = "Register";

?>

<?php require_once("layout/header.php"); ?>
<div class="container">
    <div class="row justify-content-md-center">
        <div class="col-lg-6">
            <div class="jumbotron text-center mt-5 bg-dark text-white">
                <h1>Register</h1>
            </div>
            <?php echo $registerAction; ?>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" autocomplete="off" id="registerForm">
                <div class="form-group">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-user"></i></span>
                        <input type="text" class="form-control" name="userName" id="userName" placeholder="Username"
                        value="<?php echo ValidationHandler::preserveValue('userName') ?>" autofocus required>
                    </div>
                    <div class="invalid-feedback" id="errUserName">Username is invalid</div>
                </div>
                <div class="form-group">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-user"></i></span>
                        <input type="text" class="form-control" name="firstName" id="firstName" placeholder="First Name"
                        value="<?php echo ValidationHandler::preserveValue('firstName') ?>" required>
                    </div>
                    <div class="invalid-feedback" id="errFirstName">First name is invalid</div>
                </div>
                <div class="form-group">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-user"></i></span>
                        <input type="text" class="form-control" name="lastName" id="lastName" placeholder="Last Name"
                        value="<?php echo ValidationHandler::preserveValue('lastName') ?>" required>
                    </div>
                    <div class="invalid-feedback" id="errLastName">Last name is invalid</div>
                </div>
                <div class="form-group">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                        <input type="email" class="form-control" name="email" id="email" placeholder="Email"
                        value="<?php echo ValidationHandler::preserveValue('email') ?>" required>
                    </div>
                    <div class="invalid-feedback" id="errEmail">Email is invali</div>
                </div>
                <div class="form-group">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-key"></i></span>
                        <input type="password" class="form-control" name="password" id="password" placeholder="Password"
                        value="<?php echo ValidationHandler::preserveValue('password') ?>" required>
                    </div>
                    <div class="invalid-feedback" id="errPassword">Password is invalid!</div>
                    <div class="invalid-feedback" id="errPasswordNotSame">Passwords are not the same!</div>
                </div>
                <div class="form-group">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-key"></i></span>
                        <input type="password" class="form-control" name="confirmPassword" id="confirmPassword" placeholder="Confirm Password"
                        value="<?php echo ValidationHandler::preserveValue('confirmPassword') ?>" required>
                    </div>
                    <div class="invalid-feedback" id="errConfirmPassword">Password is invalid!</div>
                    <div class="invalid-feedback" id="errConfirmPasswordNotSame">Passwords are not the same!</div>
                </div>
                <div class="form-group">
                    <small class="text-muted">Already have an account? <a href="login.php">Log In</a></small>
                </div>
                <input type="submit" class="btn btn-success btn-block" name="register" value="Submit">
            </form>
        </div>
    </div>
</div>
<?php require_once("layout/footer.php"); ?>
