<?php

require_once("auth/config.php");

$carsList = CarHandler::getCarsList($userId);
$carsEditActions = CarHandler::editActions();

$title = "Cars List";

?>

<?php require_once("layout/header.php"); ?>
<div class="container">
    <div class="row justify-content-md-center">
        <div class="col-lg-6">
            <div class="jumbotron text-center mt-5 bg-secondary text-white">
                <h1>Cars List</h1>
            </div>
        </div>
    </div>
    <div class="row justify-content-md-center">
        <div class="col-lg-12">
            <?php
            if ($carsEditActions) {
                echo $carsEditActions;
                $carsList = CarHandler::getCarsList($userId);
            }
            echo $carsList
            ?>
        </div>
    </div>
</div>
<?php require_once("layout/footer.php"); ?>
