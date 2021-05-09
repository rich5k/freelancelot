<?php
require_once './controller/database.php';
require_once './models/Student.php';
require_once './models/Organization.php';
require_once './models/Database.php';
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Freelancelot</title>
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <!-- <link rel="stylesheet" href="./css/signUp.css"> -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <!-- navbar container -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light justify-content-between ">
    <div class="container">
        <a class="navbar-brand " href="index.php"><img src="./assets/adleksLogo1.png" alt=""></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="./view/stud_display.php">Find Talent <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="./view/projects.php">Find Work </a>
            </li>
            </ul>
            
            <ul class="navbar-nav my-2 my-lg-0 ml-auto" >
                <li class="nav-item signIn">
                <?php
                //if session variable has been created, put first name and last name in navbar
                if(isset($_SESSION['sessionFname'])&&isset($_SESSION['sessionLname'])){
                    echo '<a href="./view/stud_dashboard.php">';
                    printf('Akwaaba, %s %s', $_SESSION['sessionFname'], $_SESSION['sessionLname']);
                    echo '</a>';
                    echo <<<_SIGNOUTITEM
                    <button type="button" class="btn btn-success"><a id="sign-in" class="nav-link" href="../controller/logout.php">
                            Sign Out 
                        <i class="fa fa-sign-out" aria-hidden="true"></i></a></button>
                    
_SIGNOUTITEM;

                }
                else if(isset($_SESSION['sessionCname'])){
                    echo '<a href="./view/org_dashboard.php">';
                    printf('Akwaaba, %s', $_SESSION['sessionCname']);
                    echo '</a>';
                    echo <<<_SIGNOUTITEM
                    <button type="button" class="btn btn-success"><a id="sign-in" class="nav-link" href="../controller/logout.php">
                            Sign Out 
                        <i class="fa fa-sign-out" aria-hidden="true"></i></a></button>
                    
_SIGNOUTITEM;

                }else{
                            //if not, put the default navitem
                            echo <<<_SIGNINITEM
                            <button type="button" class="btn btn-success"><a id="sign-in" class="nav-link" href="./view/signIn.php">
                                Sign In 
                            <i class="fa fa-user" aria-hidden="true"></i></a></button>
                            
                            _SIGNINITEM;

                            
                        }
                    ?> 
                
            </li>
            
            </ul>
        </div>
    </div>
    </nav>
        
    <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <h1>The nation's competency builder</h1>
                    <h5>Engage the largest network of trusted college students to unlock the 
                    full potential of your business</h5>
                    <div class="row">
                        <div class="col-lg-6">
                            <button type="button" onclick="window.location.href='./view/stud_display.php';" class="btn btn-success btn-sm">Find Talent</button>
                        </div>
                        <div class="col-lg-6">
                            <button type="button" onclick="window.location.href='./view/projects.php';" class="btn btn-outline-success btn-sm">Find Work</button>
                        </div>
                    
                    </div>
                </div>

                <div class="col-lg-6">
                        <div class="row">
                            <div class="col-lg-6">
                                <img src="./assets/homepic1.jpg"  class="rounded img-fluid">
                            </div>
                            <div class="col-lg-6">
                            
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                            
                            </div>
                            <div class="col-lg-6">
                            <img src="./assets/homepic2.jpg"  class="rounded img-fluid">
                            </div>
                        </div>
                </div>
            
            </div>
        <h3> WHAT THEY SAY</h3>
        <div class="row">
            <div class="col-lg-6">
                <img src="./assets/homepic4.jpg"  class="rounded img-fluid">
            </div>
            <div class="col-lg-6">
                <p>
                    "The student talent that I'm able to access created productivity in
                    a way that I don't think any of us thought possible"
                </p>

                <strong>Abena Antwi</strong>
                <h5>Director Strategic Marketing, Tullow GH</h5>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <p>
                    "My relationship with Abena & Tullow GH has grown over the years. We've
                    continued to work together on larger and more technical projects."
                </p>

                <strong>Steven Baidoo</strong>
                <h5>Computer Science Student</h5>
            </div>
            <div class="col-lg-6">
                <img src="./assets/homepic5.jpg"  class="rounded img-fluid">
            </div>
        </div>
    </div>


    <!-- footer -->
    <footer class="pt-5 pb-3 ">
           <div class="credits text-center mt-2">
                <p>Made by KAQA &copy; 2021. All rights reserved.</p>
            </div>
        </div>
    </footer>
                        
    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
	<script type="text/javascript" src="./js/bootstrap.min.js"></script>
</body>
</html>