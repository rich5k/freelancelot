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
    <title>Your Projects</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/project.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <!-- navbar container -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light justify-content-between ">
    <div class="container">
        <a class="navbar-brand " href="../index.php"><img src="../assets/logo1.png" alt=""></a>
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
        
    <img src="../assets/workpic5.jpg" class="img-fluid" alt="Responsive image" style="
    height: 350px;
    width: 100%;">
    <div class="container">
        <h3>Your Projects</h3>
        <?php
                //Instantiate Organization
                $organization= new Organization();

                //Instantiate Student
                $student= new Student();

                

                //organization Data
                $orgData =[
                    'organID'=> $_SESSION['sessionId']
                    
                ];
                $orgProjs= $organization->getAllOrgProj($orgData);
                
                
                if($orgProjs!=null){
                    foreach($orgProjs as $p){
                        $projectData=[
                            'projectID'=> $p->projectID
                        ];
                        
                        $project = $organization->getProjects($projectData);
                        
                        
                        echo '<div class="jumbotron">';
                            echo '<div class="row">';
                                
                                echo '<div class="col-lg-12">';
                                    echo '<span style= " color: #56C8F0;" >'.$project->ptitle.'</span>';
                                    echo '<br>';
                                    for ($i=0; $i < $p->ratings; $i++) { 
                          
                                        echo "<i class='fa fa-star stars' aria-hidden='true'></i>";
                        
                                    }
                                    if ($p->ratings< 5) {
                                        //puts empty stars for ratings is available
                                        for($i=0; $i < 5-$p->ratings; $i++){
                                          echo "<i class='fa fa-star-o stars' aria-hidden='true'></i>";
                        
                                        }
                                    }
                                    echo '<br>';
                                    echo '<p class="descr">';
                                    echo '"'.$p->reviews;
                                    echo '</p>';
                                    echo '<form action="./org_project.php" method="POST">';
                                        echo '<input type="hidden" name="organID" value="'.$_SESSION['sessionId'].'"></input>';
                                        echo '<input type="hidden" name="projectID" value="'.$p->projectID.'"></input>';
                                        echo '<button class="btn btn-success btn-sm" name= "submit">Check it Out</button>';
                                    echo '</form>';
                                    
                                echo '</div>';
                            echo '</div>';
                        echo '</div>';

                        }
                    }else{
                        echo '<h5>Sorry, you don\'t have any completed projects in your portfolio.</h5>';
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