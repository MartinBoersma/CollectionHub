<?php

session_start();

// check if user is logged in, if not then redirect to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}

include 'REST.php';

$resultCategory = $conn->query("SELECT * FROM categories WHERE UserID=$_SESSION[UserID]") or die($conn->error());
?>

<!DOCTYPE html>

<html lang="en">

    <head>

        <title>CollectionHub</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

        <!-- <link rel="stylesheet" href="main.css"> -->

        <style>
            <?php include "main.css" ?> 
            /* using php to connect to a css file */
        </style>
      
    </head>
    
    <body>

    <div class="main">
        <nav class="navbar navbar-expand-md">
            <a class="navbar-brand" href="index.php">CollectionHub</a>
            <button class="navbar-toggler navbar-dark" type="button" data-toggle="collapse" data-target="#main-navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="main-navigation">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="#"></a>                        
                        <div class="form-group has-search">
                            <span class="fa fa-search form-control-feedback"></span>
                            <input type="text" class="form-control" placeholder="Search">
                          </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Profile</a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>

            <header class="page-header header container-fluid">

                <div class="overlay"></div> <!--this is the fading color overlay for the background image-->

                <!--this is the main text at the center of the page-->
                <div class="description">
                    <h1>Welcome to CollectionHub!</h1><br><br>
                    <!-- <p>Lorem iue interdum quam odio, quis placerat ante luctus eu. 
                       Sed aliquet dolor id sapien rutrum, id vulputate quam iaculis. Suspendisse consectetur mi id libero fringilla, in pharetra sem ullamcorper.</p>
                     -->
                    <a href="category.php" class="btn btn-outline-secondary btn-lg" role="button" ><?php if (!$row = $resultCategory->fetch_assoc()): ?>Click here to create your first Collection!<?php else:?>Click here to see your collections<?php endif; ?></a> <!--THIS LINKS TO THE CREATE PAGE-->
                </div> 

                

            </header>


        <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>


        
    </body>
    
</html>