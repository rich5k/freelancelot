<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Find a Project of Your Interest!</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/project.css">
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
                <a class="nav-link" href="#">Find Talent </a>
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
                            printf('Akwaaba, %s %s', $_SESSION['sessionFname'], $_SESSION['sessionLname']);
                            echo <<<_SIGNOUTITEM
                            <button type="button" class="btn btn-success"><a id="sign-in" class="nav-link" href="./controller/logout.php">
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
        
    <img src="../assets/workpic4.jpg" class="img-fluid" alt="Responsive image" style="
    height: 350px;
    width: 100%;">
    <div class="container">
        <div class="jumbotron">
            <h3>Browse Current Available Projects</h3>
        
        </div>
        <div class="jumbotron">
            <a href="project.php"><h5>YouTube Channel Growth</h5></a>
            <small>Fixed price- Posted 40 minutes ago</small>
            <div class="row">
                <div class="col-lg-3">
                    $1,000
                    <br>
                    Fixed Price
                </div>

                <div class="col-lg-9">
                    $$
                    <br>
                    Intermediate
                </div>
            
            </div>
            <br>
            <p>Sales can be made by phone or by emailing. You speak and write well
             in English and have a background in sales and preferably in travel, 
             leisure and lifestyle sales including health products and fashion. 
             We are not sure what to expect as far a renumeration and are open 
             to discussion, please give us an idea of this with a proposal.</p>
        </div>

        <div class="jumbotron">
            <a href="project.php"><h5>Social Media Marketing</h5></a>
            
            <small>Fixed price- Posted 50 minutes ago</small>
            <div class="row">
                <div class="col-lg-3">
                    $500
                    <br>
                    Fixed Price
                </div>

                <div class="col-lg-9">
                    $$
                    <br>
                    Intermediate
                </div>
            
            </div>
            <br>
            <p>Sales can be made by phone or by emailing. You speak and write well
             in English and have a background in sales and preferably in travel, 
             leisure and lifestyle sales including health products and fashion. 
             We are not sure what to expect as far a renumeration and are open 
             to discussion, please give us an idea of this with a proposal.</p>
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