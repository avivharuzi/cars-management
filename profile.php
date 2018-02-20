<?php

require_once("auth/config.php");

$updateProfileImageAction = UserHandler::updateProfileImage($userId);

$title = "Profile";

?>

<?php require_once("layout/header.php"); ?>
<div class="container">
    <div class="row justify-content-md-center">
        <div class='col-md-6'>
            <div class="card w-100 mt-5">
                <?php
                echo UserHandler::getUserProfileImage($userId);
                ?>
                <div class="card-body">
                    <?php
                    echo $updateProfileImageAction;
                    ?>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" enctype="multipart/form-data" autocomplete="off" id="uploadForm">
                        <div id="main-progress" class="progress m-3">
                            <div id="progress-bar" class="progress-bar bg-success progress-bar-striped progress-bar-animated" role="progressbar" style="width:0%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">0%</div>
                        </div>
                        <div class="row justify-content-center">
                            <div class="form-group col-md-6">
                                <input type="file" name="file" id="file" class="form-control" required>
                            </div>
                        </div>
                        <div class="row justify-content-center">
                            <div class="form-group col-md-6 m-0">
                                <input type="submit" value="Change Picture" name="upload" id="upload" class="form-control btn btn-info">
                            </div>
                        </div>
                    </form>
                </div>
                <?php
                echo UserHandler::userDetailsCard($userId);
                ?>
            </div>
        </div>
    </div>
</div>
<?php require_once("layout/footer.php"); ?>
