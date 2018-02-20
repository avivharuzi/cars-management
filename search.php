<?php

require_once("auth/config.php");

$tableCars = CarHandler::searchCars($userId);
$carsEditActions = CarHandler::editActions();

$title = "Search";

?>

<?php require_once("layout/header.php"); ?>
<div class="container">
    <div class="row justify-content-md-center">
        <div class="col-lg-6">
            <div class="jumbotron text-center mt-5 bg-secondary text-white">
                <h1>Search</h1>
            </div>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="GET" autocomplete="off" id="search">
                <div class="form-row">
                    <div class="col-lg-6 col-md-12">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-search" aria-hidden="true"></i></span>
                            <input type="search" class="form-control" name="searchValue" placeholder="Type Value..." required autofocus>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-12">
                        <select class="form-control" name="searchBy">
                            <option value="License">License</option>
                            <option value="Color">Color</option>
                            <option value="Brand">Brand</option>
                            <option value="Model">Model</option>
                            <option value="Year">Year</option>         
                        </select>
                    </div>
                    <div class="col-lg-3 col-md-12">
                        <input type="submit" class="btn btn-success w-100" name="search" value="Search">
                    </div>
                </div>
            </form>  
        </div>
    </div>
    <div class="row justify-content-md-center">
        <div class="col-lg-12 mt-5">
        <?php 
        echo $carsEditActions;
        echo $tableCars;
        ?>
        </div>
    </div>
</div>
<?php require_once("layout/footer.php"); ?>
