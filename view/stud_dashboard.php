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
    <title>Your Bio</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/project.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <!-- navbar container -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light justify-content-between ">
    <div class="container">
        <a class="navbar-brand " href="index.php"><img src="../assets/logo1.png" alt=""></a>
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
        
    <img src="../assets/workpic6.jpg" class="img-fluid" alt="Responsive image" style="
    height: 350px;
    width: 100%;">
    <div class="container">
        <div class="jumbotron">
            <h3>My Profile</h3>
            <br>
            <br>
            <div class="row">
                <?php
                    //Instantiate Student
                    $student= new Student();
                    //student Data
                    $studentData =[
                        'studentID'=> $_SESSION['sessionId']
                    ];
                    $studBio= $student->getStudentBio($studentData);
                    if($studBio!= null){
                        echo '<div class="col-lg-6">';
                        echo '<img src="../studImages/'.$studBio->picture.'" class="img-fluid profile-img" alt="Responsive image" style="
                        height: 350px;
                        width: 100%;">';
                        echo '</div>';
                        echo '<div class="col-lg-6">';
                        echo '<h5>Bio</h5>';
                        echo '<br>';
                        echo '<p>';
                        echo $studBio->bio;
                        echo '</p>';
                        echo '<br>';
                        echo '<h5>Major</h5>';
                        
                        echo $studBio->major;
                        echo '<br>';
                        echo '<br>';
                        echo '<h5>University</h5>';
                        
                        echo $studBio->university;
                        echo '<br>';
                        echo '<br>';
                        echo '<button type="button" onclick="window.location.href=\'proposal.php\';" class="btn btn-success btn-sm">Send Proposal</button>';

                    }
                    else{
                        echo '<div class="col-lg-12">';
                        echo '<h5>Sorry you don\'t have a bio. Please create one</h5>';
                        echo '<br>';
                        echo '<button type="button" onclick="window.location.href=\'stud_bio.php\';" class="btn btn-success btn-sm">Create Bio</button>';
                    }
                    echo '</div>';
                ?>
                    
                    
                    
            </div>
            
            <?php
                echo '<h5>Ongoing Projects</h5>';

                $ongoingProjs = $student->getOngoingProj($studentData);
                if($ongoingProjs!= null){
                    foreach($ongoingProjs as $op){

                        //project Data
                        $projectData =[
                            'projectID'=> $op->projectID
                        ];
                        //Instantiate Organization
                        $organization= new Organization();
                        $project= $organization->getProjects($projectData);
                        echo '<div class="row">';
                            echo '<div style="background-color: #FDD100" class="col-lg-2">';
                            echo '</div>';
                            echo '<div class="col-lg-5">';
                                echo '<strong>'.$project->ptitle.'</strong>';
                                echo '<br>';
                                $orgData=[
                                    'organID'=>$project->organID
                                ];
                                $orgName= $organization->getOrgName($orgData);
                                echo $orgName->cname;
                                echo '<br>';
                                if($project->payStatus=="Paid"){
                                    echo '<em>'.$project->payStatus.'</em>';
                                    echo '<br>';
                                    echo '$'.$project->amount;
                                }else{
                                    echo '<em>'.$project->payStatus.'</em>';
        
                                }
                                echo '<br>';
                                echo $project->pdifficulty;
                            echo '</div>';

                            echo '<div class="col-lg-5">';
                            echo '<br>';
                            

                            $orgProjData=[
                                'organID'=> $project->organID,
                                'projectID'=> $project->projectID
                            ];

                            $studProjData=[
                                'studentID'=> $_SESSION['sessionId'],
                                'projectID'=> $project->projectID
                            ];

                            if($student->getStudProj($studProjData)!=null && $organization->getOrgProj($orgProjData)==null){
                                echo '<h5>The project has ended. Pls review '.$orgName->cname.' now. Thank you :)</h5>';
                                echo '<form action="./reviewOrg.php" method="POST">';
                                    echo '<input type="hidden" name="organID" value="'.$project->organID.'"></input>';
                                    echo '<input type="hidden" name="projectID" value="'.$project->projectID.'"></input>';
                                    echo '<button class="btn btn-success btn-sm" name= "submit">Review Organization</button>';
                                echo '</form>';
                            }
                            
                            echo '</div>';

                        
                        echo '</div>';
                    }
                    
                }else{
                    echo '<h5>No ongoing projects</h5>';
                }
            ?>
            
            <br>
            <br>
            <br>
            <br>
            <button type="button" onclick="window.location.href='student_portfolio.php';" class="btn btn-success btn-sm">Check Portfolio</button>

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