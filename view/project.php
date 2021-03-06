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
    <title>Project Name</title>
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
        <h3>Job Details</h3>
        <?php
            if(isset($_POST['submit'])){
                //Instantiate Organization
                $organization= new Organization();

                $projID=$_POST['projID'];

                //project Data
                $projectData =[
                    'projectID'=> $projID
                    
                ];
                //gets project details
                $proj= $organization->getProjects($projectData);
                
                echo '<div class="row">';
                    echo '<div class="col-lg-8">';
                
                        echo '<div class="jumbotron">';
                            echo '<h5>'.$proj->ptitle.'</h5>';
                        echo '</div>';
                        echo '<div class="jumbotron">';
                            echo '<small>';
                            $currentDate = date("Y-m-d");
                            $currentTime = date("H:i:s");
        
                            $currentDate =  strtotime($currentDate . $currentTime);
        
                            $dtToCompare = strtotime($proj->createTime);
                            
                            
                            $diff = abs($currentDate- $dtToCompare);
        
                            // To get the year divide the resultant date into
                            // total seconds in a year (365*60*60*24)
                            $years = floor($diff / (365*60*60*24));
        
                            // To get the month, subtract it with years and
                            // divide the resultant date into
                            // total seconds in a month (30*60*60*24)
                            $months = floor(($diff - $years * 365*60*60*24)
                            / (30*60*60*24)); 
        
        
                            // To get the day, subtract it with years and 
                            // months and divide the resultant date into
                            // total seconds in a days (60*60*24)
                            $days = floor(($diff - $years * 365*60*60*24 - 
                            $months*30*60*60*24)/ (60*60*24));
        
        
                            // To get the hour, subtract it with years, 
                            // months & seconds and divide the resultant
                            // date into total seconds in a hours (60*60)
                            $hours = floor(($diff - $years * 365*60*60*24 
                            - $months*30*60*60*24 - $days*60*60*24)
                                / (60*60)); 
        
        
                            // To get the minutes, subtract it with years,
                            // months, seconds and hours and divide the 
                            // resultant date into total seconds i.e. 60
                            $mins = floor(($diff - $years * 365*60*60*24 
                            - $months*30*60*60*24 - $days*60*60*24 
                            - $hours*60*60)/ 60); 
        
                            
                            if(($mins)<60 && $hours==0 && $days==0 && $months==0 && $years==0){
                                echo 'Posted '.$mins.' minute(s) ago';
                            }
                            else{
                                if($hours<24 && $days==0 && $months==0 && $years==0){
                                    echo 'Posted '.$hours.' hour(s) ago';
                                }
                                else{
                                    if($days<30 && $months==0 && $years==0){
                                        echo 'Posted '.$days.' day(s) ago';
                                    }
                                    else{
                                        if($months<12 && $years==0){
                                            echo 'Posted '.$months.' month(s) ago';
                                        }
                                        else{
                                            echo 'Posted '.$years.' year(s) ago';
                                        }
                                    }
                                }
                            }
                            echo '</small>';
                            echo '<br>';
                            echo '<i class="fa fa-map-marker" aria-hidden="true"></i> ';
                            echo 'Only students in Ghanaian colleges may apply.';
                            echo '<br>';
                        echo '</div>';
                        echo '<div class="jumbotron">';
                            echo '<p>';
                                echo $proj->pdescription;
                            echo '</p>';
                        echo '</div>';
                        echo '<div class="jumbotron">';
                            echo '<div class="row">';
                                echo '<div class="col-lg-4">';
                                if($proj->payStatus=="Paid"){
                                    echo '<strong><i class="fa fa-tag" aria-hidden="true"></i> $'.$proj->amount.'</strong>';
                                    echo '<br>';
                                    echo '<small>Fixed Price</small>';
        
                                }else{
                                    echo '<strong><i class="fa fa-tag" aria-hidden="true"></i> '.$proj->payStatus.'</strong>';
                                }
                                echo '</div> ';
                                echo '<div class="col-lg-4">';
                                if($proj->pdifficulty=="Entry Level"){
                                    echo '<strong><i class="fa fa-briefcase" aria-hidden="true"></i>  '.$proj->pdifficulty.'</strong> ';
                                    echo '<br>';
                                    echo '<small>I am willing to pay for a student who does not have experience
                                    but can produce value</small>';
                                }
                                else if($proj->pdifficulty=="Intermediate"){
                                    echo '<strong><i class="fa fa-briefcase" aria-hidden="true"></i>  '.$proj->pdifficulty.'</strong> ';
                                    echo '<br>';
                                    echo '<small>I am willing to pay for a student who has experience
                                    and can produce value</small>';
        
                                }
                                else{
                                    echo '<strong><i class="fa fa-briefcase" aria-hidden="true"></i>  '.$proj->pdifficulty.'</strong> ';
                                    echo '<br>';
                                    echo '<small>I am willing to pay for a student who has a ton of experience
                                    and can produce great value</small>';
                                }
                                echo '</div>';
                                echo '<div class="col-lg-4">';
                                    echo '<strong><i class="fa fa-map-marker" aria-hidden="true"></i> Remote Job</strong>';
                                echo '</div>';
                            echo '</div>';
                            echo '<br>';
                            echo '<br>';
                            echo '<div class="row">';
                                echo '<div class="col-lg-4">';
                                echo '</div>';
                                echo '<div class="col-lg-4">';
                                        echo '<form action="./proposal.php" method="POST">';
                                        echo '<input type="hidden" name="projID" value="'.$proj->projectID.'"></input>';
                                        echo '<button class="btn btn-success btn-sm" name= "submit">Send Proposal</button>';
                                        echo '</form>';
                                
                                echo '</div>';
                                echo '<div class="col-lg-4">';
                                echo '</div>';
                            echo '</div>';
                        echo '</div>';
                    echo '</div>';
                    echo '<div class="col-lg-4">';
                        $orgData=[
                            'organID'=> $proj->organID
                        ];
                        //gets organizations info
                        $orgInfo= $organization->getOrgInfo($orgData);
                        echo '<div class="jumbotron">';
                            echo '<h5>About the employer</h5>';
                            echo '<strong>Company Info:</strong>';
                            echo '<br>';
                            echo '<p>';
                                echo $orgInfo->companyInfo;
                            echo '</p>';
                            echo '<strong>Location:</strong>';
                            echo '<br>';
                            echo $orgInfo->clocation;
                            echo '<br>';
                            echo '<strong>Company Website:</strong>';
                            echo '<br>';
                            echo $orgInfo->cwebsite;
                            echo '<br>';
                            echo '<br>';
                            //gets details of past projects
                            $orgProjs=$organization->getAllOrgProj($orgData);
                                if($orgProjs!= null){
                                    $totalRatings=0;
                                    $avgRatings=0.0;
                                    $count=0;
                                    $successPercent=0;
                                    foreach($orgProjs as $sp){
                                        $totalRatings=$totalRatings+$sp->ratings;
                                        $count++;
                                    }
                                    $avgRatings= $totalRatings/$count;
                                    echo '<strong> Avg. Ratings: </strong>';
                                        for ($i=0; $i < round($avgRatings); $i++) { 
                                
                                            echo "<i class='fa fa-star stars' aria-hidden='true'></i>";
                            
                                        }
                                        if ($avgRatings< 5) {
                                            //puts empty stars for ratings is available
                                            for($i=0; $i < 5-round($avgRatings); $i++){
                                            echo "<i class='fa fa-star-o stars' aria-hidden='true'></i>";
                            
                                            }
                                        }
                                    }else{
                                        echo '<strong>New on Platform</strong>';
                                    }
                        echo '</div>';
                    echo '</div>';
                echo '</div>';

            }else{
                echo '<h5>No project to view. Pls click on the Find Work button and select a project you are interested in.</h5>';
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