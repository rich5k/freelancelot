<?php
require_once '../controller/database.php';
require_once '../models/Organization.php';
require_once '../models/Student.php';
require_once '../models/Database.php';
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>End Project</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/project.css">
    <link rel="stylesheet" href="../css/rating.css">
    
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
            <li class="nav-item ">
                <a class="nav-link" href="./stud_display.php">Find Talent </a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="./projects.php">Find Work <span class="sr-only">(current)</span></a>
            </li>
            </ul>
            
            <ul class="navbar-nav my-2 my-lg-0 ml-auto" >
                <li class="nav-item signIn">
                <?php
                //if session variable has been created, put first name and last name in navbar
                if(isset($_SESSION['sessionFname'])&&isset($_SESSION['sessionLname'])){
                    echo '<a href="stud_dashboard.php">';
                    printf('Akwaaba, %s %s', $_SESSION['sessionFname'], $_SESSION['sessionLname']);
                    echo '</a>';
                    echo <<<_SIGNOUTITEM
                    <button type="button" class="btn btn-success"><a id="sign-in" class="nav-link" href="../controller/logout.php">
                            Sign Out 
                        <i class="fa fa-sign-out" aria-hidden="true"></i></a></button>
                    
_SIGNOUTITEM;

                }
                else if(isset($_SESSION['sessionCname'])){
                    echo '<a href="org_dashboard.php">';
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
                            <button type="button" class="btn btn-success"><a id="sign-in" class="nav-link" href="./signIn.php">
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
        
    <img src="../assets/img1.jpg" class="img-fluid" alt="Responsive image" style="
    height: 350px;
    width: 100%;">
    <div class="container">
        <div class="jumbotron">
            <?php
                if(isset($_POST['submit'])){
                    //Instantiate Organization
                    $organization= new Organization();
                    
                    
                    $orgData=[
                        'organID'=>$_POST['organID']
                    ];
                    $orgName= $organization->getOrgName($orgData);
                    echo '<h3>Rate '.$orgName->cname.'\'s Performance</h3>';
                    echo '<form action="../controller/evalOrg.php" method="post" id="payment-form"> ';
                        echo '<div class="form-group">';
                            echo '<input type="hidden" name="organID" value="'.$_POST['organID'].'"></input>';
                            echo '<input type="hidden" name="projectID" value="'.$_POST['projectID'].'"></input>';
                            echo '<label for="reviews"><b>Reviews:</b></label>';
                            echo '<textarea type="text" class="form-control" id="reviews" name="reviews" cols="30" rows="8"></textarea>';
                            
                        echo '</div>';
                        echo '<label for="ratings"><b>Ratings:</b></label>';
                        echo '<div class="rating">';
                            echo '<br>';
                            echo '<input type="radio" name="rating" value="5" id="5"><label for="5">☆</label>';
                            echo '<input type="radio" name="rating" value="4" id="4"><label for="4">☆</label>';
                            echo '<input type="radio" name="rating" value="3" id="3"><label for="3">☆</label>';
                            echo '<input type="radio" name="rating" value="2" id="2"><label for="2">☆</label>'; 
                            echo '<input type="radio" name="rating" value="1" id="1"><label for="1">☆</label>';
                        echo '</div>';
                        echo '<br>';
                        echo '<br>';
                        
                        
                        echo '<button type="submit" class="btn btn-primary" name="submit">Submit</button>';
                    echo '</form>';
                }else{
                    echo '<h5>Sorry, there is no company to review.</h5>';
                }
            ?>
            
            <br>
            <br>
            
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
	<script type="text/javascript" src="../js/bootstrap.min.js"></script>
</body>
</html>