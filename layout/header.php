<!DOCTYPE html>
<html lang="en-us">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="add and edit cars by your choice">
        <meta name="keywords" content="cars,edit,table">
        <meta name="author" content="Aviv Haruzi">
        <title><?php if(isset($title)) { echo $title; } ?></title>
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="assets/css/lib/bootstrap/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="assets/css/lib/fancybox/jquery.fancybox.min.css">
        <link rel="stylesheet" type="text/css" href="assets/css/styles.css">        
        <link rel="icon" type="image/x-icon" href="assets/images/web-icons/favicon.ico">
        <link rel="shortcut icon" type="image/x-icon" href="assets/images/web-icons/icon.png">
    </head>
    <body>
        <?php if (isset($_SESSION["isLoggedIn"]) == true) { ?>
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
            <div class="container">
                <button class="navbar-toggler" data-toggle="collapse" data-target="#navbar" aria-expanded="false"><span class="navbar-toggler-icon"></span></button>
                <div id="navbar" class="collapse navbar-collapse">
                    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                        <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="add.php">Add Cars</a></li>
                        <li class="nav-item"><a class="nav-link" href="list.php">List</a></li>
                        <li class="nav-item"><a class="nav-link" href="search.php">Search</a></li>
                    </ul>
                    <ul class="navbar-nav my-2 my-lg-0">
                        <li class="nav-item float-right"><a class="nav-link" href="profile.php"><?php echo ucwords($_SESSION["user"]); ?></a></li>
                        <li class="nav-item float-right"><a class="nav-link" href="logout.php"><i class="fa fa-sign-out mr-2"></i>Logout</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <?php } ?>
