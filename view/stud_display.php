<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Find Student Talent</title>
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
                            printf('Akwaaba, %s %s', $_SESSION['sessionFname'], $_SESSION['sessionLname']);
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
        
    
    <div class="container">
        <h1>Top Student Talent</h1>
        <div class="row">
            <div class="col-lg-3">
                <h5>Categories/Majors</h5>
                Business Administration
                <br>
                Managament Information Systems
                <br>
            </div>
            <div class="col-lg-9">
                <div class="jumbotron">
                    <form action="../controller/search_student.php" method="post">
                        <div class="row">
                            <div class="col-lg-10">
                                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                                <small>Search student talent by major</small>
                            
                            </div>
                            <div class="col-lg-2">
                                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>

                            </div>
                        </div>
                    </form>
                </div>
                <div class="jumbotron">
                    <div class="row">
                        <div class="col-lg-1">
                            <img src="../assets/person1.jpg" class="img-fluid profile-img" alt="Responsive image" style="
                            height: 60px;
                            width: 100%;">
                        </div>
                        <div class="col-lg-11">
                            <a href="./student_view.php">Kwami Eugene</a>
                            <br>
                            <strong>Computer Science</strong>
                            <br>
                            <small>Ashesi Universiy</small>
                        </div>
                    
                    </div>
                    100% Project Success
                    <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. 
                    Rem illum et, officia voluptate enim exercitationem dicta! 
                    </p>
                </div>
                <div class="jumbotron">
                    <div class="row">
                        <div class="col-lg-1">
                            <img src="../assets/person2.jpg" class="img-fluid profile-img" alt="Responsive image" style="
                            height: 60px;
                            width: 100%;">
                        </div>
                        <div class="col-lg-11">
                            <a href="./student_view.php">Ebony GH</a>
                            <br>
                            <strong>Business Administration</strong>
                            <br>
                            <small>Ashesi Universiy</small>
                        </div>
                    
                    </div>
                    100% Project Success
                    <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. 
                    Rem illum et, officia voluptate enim exercitationem dicta! 
                    </p>
                </div>
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
	<script type="text/javascript" src="../js/bootstrap.min.js"></script>
</body>
</html>