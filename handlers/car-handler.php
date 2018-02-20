<?php

class CarHandler {
    private function __construct() {
    }

    public static function addCarAction($userId) {
        if (isset($_POST["addCar"])) {
            return self::validateCar($userId);
        }
    }

    public static function addCarWithImage($brand, $model, $year, $license, $color, $file, $userId) {
        $upload = new Upload();

        if ($upload->checkUpload($file)) {
            $sql = "INSERT INTO Car (License, Color, Brand, Model, Year, UserId)
            VALUES ('$license', '$color', '$brand', '$model', $year, $userId)";

            $carId = DatabaseHandler::insert($sql);

            $upload->fileUpload($file, "assets/images/uploads/cars/", "car$carId");
            $fileName = $upload->getFinallyName();

            $sql = "UPDATE Car SET Image = '$fileName' WHERE Id = $carId";

            DatabaseHandler::update($sql);

            self::resetInputs();

            return MessageHandler::success("Your car has been successfully added");
        } else {
            return MessageHandler::error($upload->getErrorMsg());
        }
    }

    public static function addCarWithOutImage($brand, $model, $year, $license, $color, $userId) {
        $sql = "INSERT INTO Car (License, Color, Brand, Model, Year, UserId)
        VALUES ('$license', '$color', '$brand', '$model', $year, $userId)";

        $id = DatabaseHandler::insert($sql);

        self::resetInputs();

        return MessageHandler::success("Your car has been successfully added");
    }

    public static function updateCarWithImage($brand, $model, $year, $license, $color, $file, $carId) {
        $upload = new Upload();

        if ($upload->checkUpload($file)) {
            $upload->fileUpload($file, "assets/images/uploads/cars/", "car$carId");
            $fileName = $upload->getFinallyName();

            $sql = "UPDATE Car SET License = '$license', Color = '$color', Brand = '$brand', Model = '$model', Year = $year, Image = '$fileName' WHERE Id = $carId";
            DatabaseHandler::update($sql);

            return MessageHandler::success("Your cars updates successfully");
        } else {
            return MessageHandler::error($upload->getErrorMsg());
        }
    }

    public static function updateCarWithOutImage($brand, $model, $year, $license, $color, $carId, $existImage) {
        $sql = "UPDATE Car SET License = '$license', Color = '$color', Brand = '$brand', Model = '$model', Year = $year, Image = '$existImage' WHERE Id = $carId";
        DatabaseHandler::update($sql);

        return MessageHandler::success("Your cars updates successfully");
    }

    public static function validateCar($userId, $carId = "") {
        if (empty($_POST["brand$carId"])) {
            $errors[] =  "Brand is required";
        } else if (!preg_match("/^[a-zA-Z ]*$/", $_POST["brand$carId"])) {
            $errors[] =  "Brand is invalid";
        } else {
            $brand = strtolower($_POST["brand$carId"]);
        }
        
        if (empty($_POST["model$carId"])) {
            $errors[] =  "Model is required"; 
        } else if (!preg_match("/^[a-zA-Z0-9 ]*$/", $_POST["model$carId"])) {
            $errors[] =  "Model is invalid";
        } else {
            $model = strtolower($_POST["model$carId"]);
        }
        
        if (empty($_POST["year$carId"])) {
            $errors[] =  "Year is required";
        } else if (!preg_match("/^[0-9]{4}$/", $_POST["year$carId"])) {
            $errors[] =  "Year is invalid";
        } else {
            $year = $_POST["year$carId"];
        }
        
        if (empty($_POST["license$carId"])) {
            $errors[] =  "License is required";
        } else if (!preg_match("/^[0-9-]*$/", $_POST["license$carId"])) {
            $errors[] =  "License is invalid";
        } else {
            $license = $_POST["license$carId"];
        }
        
        if (empty($_POST["color$carId"])) {
            $errors[] =  "Color is required";
        } else if (!preg_match("/^[#]{1}[a-z0-9]{6}$/", $_POST["color$carId"])) {
            $errors[] =  "Color is invalid";
        } else {
            $color   = $_POST["color$carId"];
        }

        if (!empty($_POST["existImage$carId"])) {
            $existImage = $_POST["existImage$carId"];
        } else {
            $existImage = null;
        }

        if (empty($errors)) {
            if (!empty($_FILES["file$carId"]["name"])) {
                $file = $_FILES["file$carId"];
                if (empty($carId)) {
                    return self::addCarWithImage($brand, $model, $year, $license, $color, $file, $userId);
                } else {
                    return self::updateCarWithImage($brand, $model, $year, $license, $color, $file, $carId);
                }
                
            } else {
                if (empty($carId)) {
                    return self::addCarWithOutImage($brand, $model, $year, $license, $color, $userId);
                } else {
                    return self::updateCarWithOutImage($brand, $model, $year, $license, $color, $carId, $existImage);
                }
            }
        } else {
            return MessageHandler::error($errors);
        }
    }

    public static function resetInputs() {
        $_POST["brand"] = "";
        $_POST["model"] = "";
        $_POST["year"] = "";
        $_POST["license"] = "";
        $_POST["color"] = "";
    }

    public static function getCarsList($userId) {
        $cars = DatabaseHandler::whereMany("Car", "UserId", $userId);

        if ($cars) {
            $table = self::headerTable();
            
            foreach ($cars as $key => $value) {
                $table .= self::tableData($value);
            }

            $table .= self::bottomTable();

            return $table;
        } else {
            return MessageHandler::warning("There are no cars on your list right now");
        }
    }
    
    public static function deleteCars() {
        if (isset($_POST["deleteCustom"])) {
            if (!empty($_POST["cb"])) {
                foreach ($_POST["cb"] as $key => $value) {
                    self::checkImageAndDelete($value);
                    DatabaseHandler::delete("Car", "Id", $value);
                }
                return MessageHandler::success("Cars deleted successfully");
            }
        }
    }

    public static function updateCars() {
        if (isset($_POST["save"])) {
            $carId = $_POST["save"];
            return self::validateCar("", $carId);
        }
    }

    public static function checkImageAndDelete($carId) {
        $car = DatabaseHandler::find("Car", $carId);

        if ($car) {
            if ($car->Image !== "image-not-found.jpg") {
                unlink("assets/images/uploads/cars/$car->Image");
            } 
        }
    }

    public static function searchCars($userId) {
        if (isset($_GET["search"])) {
            $searchValue = DatabaseHandler::escape(strtolower($_GET["searchValue"]));
            $searchBy = DatabaseHandler::escape($_GET["searchBy"]);
            $sql = "SELECT * FROM Car WHERE $searchBy = '$searchValue' AND userId = $userId";

            $cars = $GLOBALS["conn"]->getFullData($sql, "Car");
        
            if ($cars) {
                $table =
                "<div class='col-md-12'>
                <div class='jumbotron text-center bg-info text-white'>
                    <h3>" . count($cars) . " Matches Found</h3>
                </div>" . CarHandler::headerTable();
        
                foreach ($cars as $key => $value) {
                    $table .= self::tableData($value);
                }

                $table .= CarHandler::bottomTable();

                return $table;
            } else {
                return MessageHandler::errorBig("No Results");
            }
        }
    }

    public static function headerTable() {
        return
        "<div class='col-md-12'>
        <form action='" . htmlspecialchars($_SERVER["PHP_SELF"]) . "' method='POST' autocomplete='off' enctype='multipart/form-data'>
        <table class='table table-hovered table-striped table-hover table-responsive table-cars'>
            <thead>
                <tr>
                    <th>Brand</th>
                    <th>Model</th>
                    <th>Year</th>
                    <th>License</th>
                    <th>Color</th>
                    <th>Image</th>
                    <th></th>
                    <th colspan='2'><button class='btn btn-danger text-center' name='deleteCustom'><i class='fa fa-trash'></i></button></th>
                </tr>
            </thead>
        <tbody>";
    }

    public static function bottomTable() {
        return "</tbody></table></form></div>";
    }

    public static function tableData($car) {
        if ($car->Image == 'image-not-found.jpg') {
            $path = "assets/images/defaults/image-not-found.jpg";
        } else {
            $path = "assets/images/uploads/cars/" . $car->Image;
        }

        return
        "<tr>
            <td>" . ucwords($car->Brand) . "</td>
            <td>" . ucwords($car->Model) . "</td>
            <td>$car->Year</td>
            <td>$car->License</td>
            <td style='background-color:$car->Color;'></td>
            <td><a data-fancybox='gallery' href='$path'><img src='$path' alt='car' width='64px' height='auto'></a></td>
            <td><a href='$path' download><i class='fa fa-download'></i></td>
            <td><input type='checkbox' class='css-checkbox' name='cb[]' id='cb$car->Id' value='$car->Id'><label for='cb$car->Id' class='css-label'></label></td>
            <td class='icon-edit'><img src='assets/images/icons/edit.png'></td>
        </tr>
        <tr class='tr-edit'>
            <td><input type='text' class='form-control' name='brand$car->Id' placeholder='Brand' autofocus></td>
            <td><input type='text' class='form-control' name='model$car->Id' placeholder='Model'></td>
            <td><input type='text' class='form-control' name='year$car->Id' placeholder='Year'></td>
            <td><input type='text' class='form-control' name='license$car->Id' placeholder='License'></td>
            <td><input type='color' class='form-control' style='height:38px;' name='color$car->Id' placeholder='Color'></td>
            <td><input type='file' class='form-control' style='height:38px;' name='file$car->Id'></td>
            <td></td>
            <td class='cancel-edit'><img src='assets/images/icons/cancel.png'></td>
            <td><input type='image' src='assets/images/icons/save.png' name='save' value='$car->Id'></td>
        </tr>
        <div class='d-none'><input type='hidden' class='form-control' name='existImage$car->Id' value='$car->Image'></div>
        ";
    }

    public static function editActions() {
        $deleteCarsAction = self::deleteCars();
        $updateCarsAction = self::updateCars();

        if (!empty($deleteCarsAction)) {
            return $deleteCarsAction;
        }

        if (!empty($updateCarsAction)) {
            return $updateCarsAction;
        }
    }
}

?>
