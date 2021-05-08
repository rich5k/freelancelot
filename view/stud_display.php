<?php
require_once '../controller/database.php';
require_once '../models/Student.php';
require_once '../models/Organization.php';
require_once '../models/Database.php';
session_start();
?>
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

                        }
                        else if(isset($_SESSION['sessionCname'])){
                            printf('Akwaaba, %s', $_SESSION['sessionCname']);
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
        <?php
            //Instantiate Student
            $student= new Student();

            $students=$student->getAllStudents();
            $majors = $student->getMajors();

            if($students!=null){
                if($majors!=null){
                    echo '<div class="row">';
                        echo '<div class="col-lg-3">';
                            echo '<h5>Categories/Majors</h5>';
                            foreach($majors as $m){
                                echo $m->major;
                                echo '<br>';
                            }
                        echo '</div>';
                        echo '<div class="col-lg-9">';
                            echo '<div class="jumbotron">';
                                echo '<form action="../controller/search_student.php" method="post">';
                                    echo '<div class="row">';
                                        echo '<div class="col-lg-10">';
                                            echo '<input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">';
                                            echo '<small>Search student talent by major</small>';
                                        echo '</div>';
                                        echo '<div class="col-lg-2">';
                                            echo '<button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>';
                                        echo '</div>';
                                    echo '</div>';
                                echo '</form>';
                            echo '</div>';
                            foreach($students as $stud){
                                $BioData=[
                                    'studentID'=>$stud->studentID
                                ];
                                $studBio=$student->getStudentBio($BioData);
                                echo '<div class="jumbotron">';
                                    echo '<div class="row">';
                                        echo '<div class="col-lg-2">';
                                            echo '<img src="../studImages/'.$studBio->picture.'" class="img-fluid profile-img" alt="Responsive image" style="
                                            height: 100%;
                                            width: 100%;">';
                                        echo '</div>';
                                        echo '<div class="col-lg-10">';
                                            echo '<span style= " color: #56C8F0;" >'.$stud->fname.' '.$stud->lname.'</span>';
                                            echo '<br>';
                                            echo '<strong>'.$studBio->major.'</strong>';
                                            echo '<br>';
                                            echo '<small>'.$studBio->university.'</small>';
                                        echo '</div>';
                                    echo '</div>';
                                    echo '100% Project Success';
                                    echo '<p class="descr">';
                                    echo $studBio->bio;
                                    echo '</p>';
                                    echo '<form action="./student_view.php" method="POST">';
                                    echo '<input type="hidden" name="studentID" value="'.$stud->studentID.'"></input>';
                                    echo '<button class="btn btn-success btn-sm" name= "submit">Check Student Out</button>';
                                    echo '</form>';
                                echo '</div>';

                            }
                        echo '</div>';
                    echo '</div>';
                }else{
                    echo '<h5>Sorry our students have not or are not done filling their bios. Pls come back another time.</h5>';
                }
            }else{
                echo '<h5>Sorry we don\'t have any students at the moment. Pls come back another time.</h5>';
            }
        ?>
        

       

        
        
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