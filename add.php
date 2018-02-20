<?php

require_once("auth/config.php");

$carAction = CarHandler::addCarAction($userId);

$title = "Add Cars";

?>

<?php require_once("layout/header.php"); ?>
<div class="container">
    <div class="row justify-content-md-center">
        <div class="col-lg-6">
            <div class="jumbotron text-center mt-5 bg-secondary text-white">
                <h1>Add Cars</h1>
            </div>
            <?php echo $carAction ?>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" autocomplete="off" enctype="multipart/form-data">
                <div class="form-group">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-car"></i></span>
                        <select class="form-control" name="brand" id="brand">
                            <option selected disabled>Brand</option>
                            <option value="Alfa Romeo">Alfa Romeo</option>
                            <option value="Aston Martin">Aston Martin</option>
                            <option value="Audi">Audi</option>
                            <option value="Bentley">Bentley</option>
                            <option value="Bowler">Bowler</option>
                            <option value="BMW">BMW</option>
                            <option value="Bugatti">Bugatti</option>
                            <option value="Buick">Buick</option>
                            <option value="Cadillac">Cadillac</option>
                            <option value="Chevrolet">Chevrolet</option>
                            <option value="Chrysler">Chrysler</option>
                            <option value="Citroen">Citroen</option>
                            <option value="Corvette">Corvette</option>
                            <option value="Dacia">Dacia</option>
                            <option value="Daihatsu">Daihatsu</option>
                            <option value="Dodge">Dodge</option>
                            <option value="Ferrari">Ferrari</option>
                            <option value="Fiat">Fiat</option>
                            <option value="Ford">Ford</option>
                            <option value="GMC">GMC</option>
                            <option value="Honda">Honda</option>
                            <option value="Hyundai">Hyundai</option>
                            <option value="Infiniti">Infiniti</option>
                            <option value="Isuzu">Isuzu</option>
                            <option value="Jaguar">Jaguar</option>
                            <option value="Jeep">Jeep</option>
                            <option value="Kia">Kia</option>
                            <option value="Lamborghini">Lamborghini</option>
                            <option value="Land Rover">Land Rover</option>
                            <option value="Lexus">Lexus</option>
                            <option value="Lotus">Lotus</option>
                            <option value="Maserati">Maserati</option>
                            <option value="Mazda">Mazda</option>
                            <option value="McLaren">McLaren</option>
                            <option value="Mercedes">Mercedes</option>
                            <option value="MG Motor">MG Motor</option>
                            <option value="Mini">Mini</option>
                            <option value="Mitsubishi">Mitsubishi</option>
                            <option value="Nissan">Nissan</option>
                            <option value="Opel">Opel</option>
                            <option value="Pagani">Pagani</option>
                            <option value="Peugeot">Peugeot</option>
                            <option value="Porsche">Porsche</option>
                            <option value="Renault">Renault</option>
                            <option value="Seat">Seat</option>
                            <option value="Ford">Ford</option>
                            <option value="Porsche">Porsche</option>
                            <option value="Fiat">Fiat</option>
                            <option value="Subaru">Subaru</option>
                            <option value="Suzuki">Suzuki</option>
                            <option value="Tesla">Tesla</option>
                            <option value="Toyota">Toyota</option>
                            <option value="Volkswagen">Volkswagen</option>
                            <option value="Volvo">Volvo</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-car"></i></span>
                        <input type="text" class="form-control" name="model" id="model"
                        value="<?php echo ValidationHandler::preserveValue("model") ?>" placeholder="Model" required>
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-calendar-o"></i></span>
                        <select class="form-control" name="year" id="year">
                            <option selected disabled>Year</option>
                            <option value="2017">2017</option>	
                            <option value="2016">2016</option>	
                            <option value="2015">2015</option>	
                            <option value="2014">2014</option>	
                            <option value="2013">2013</option>	
                            <option value="2012">2012</option>	
                            <option value="2011">2011</option>	
                            <option value="2010">2010</option>	
                            <option value="2009">2009</option>	
                            <option value="2008">2008</option>	
                            <option value="2007">2007</option>	
                            <option value="2006">2006</option>	
                            <option value="2005">2005</option>	
                            <option value="2004">2004</option>	
                            <option value="2003">2003</option>	
                            <option value="2002">2002</option>	
                            <option value="2001">2001</option>	
                            <option value="2000">2000</option>	
                            <option value="1999">1999</option>	
                            <option value="1998">1998</option>	
                            <option value="1997">1997</option>	
                            <option value="1996">1996</option>	
                            <option value="1995">1995</option>	
                            <option value="1994">1994</option>	
                            <option value="1993">1993</option>	
                            <option value="1992">1992</option>	
                            <option value="1991">1991</option>	
                            <option value="1990">1990</option>	
                            <option value="1989">1989</option>	
                            <option value="1988">1988</option>	
                            <option value="1987">1987</option>	
                            <option value="1986">1986</option>	
                            <option value="1985">1985</option>	
                            <option value="1984">1984</option>	
                            <option value="1983">1983</option>	
                            <option value="1982">1982</option>	
                            <option value="1981">1981</option>	
                            <option value="1980">1980</option>	
                            <option value="1979">1979</option>	
                            <option value="1978">1978</option>	
                            <option value="1977">1977</option>	
                            <option value="1976">1976</option>	
                            <option value="1975">1975</option>	
                            <option value="1974">1974</option>	
                            <option value="1973">1973</option>	
                            <option value="1972">1972</option>	
                            <option value="1971">1971</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-sort-numeric-asc"></i></span>
                        <input type="text" class="form-control" name="license" id="license"
                        value="<?php echo ValidationHandler::preserveValue("license") ?>" placeholder="License" maxlength="9" required>
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-eyedropper"></i></span>
                        <input type="color" class="form-control" style="height:38px;" name="color" id="color"
                        value="<?php echo ValidationHandler::preserveValue("color") ?>">
                    </div>
                </div>
                <div class="form-group">
                    <input type="file" name="file" id="file" class="form-control">
                </div>
                <input type="submit" class="btn btn-success btn-block" name="addCar" value="Submit">
            </form>
        </div>
    </div>
</div>
<?php require_once("layout/footer.php"); ?>
