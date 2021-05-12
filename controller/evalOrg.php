<?php
if(isset($_POST['submit'])){
    session_start();
    require_once '../controller/database.php';
    require_once '../models/Database.php';
    require_once '../models/Student.php';
    require_once '../models/Organization.php';
    
    $organID=$_POST['organID'];
    $projectID=$_POST['projectID'];
    $reviews=$_POST['reviews'];
    $rating = $_POST['rating'];
    $studentID = $_SESSION["sessionId"];
    //Instantiate Organization
    $organization= new Organization();

    //Instantiate Student
    $student= new Student();
                        
    //if fields are empty
    if (empty($organID) ||empty($projectID) || empty($reviews) || empty($rating)){
        echo '<script>alert("Some fields are empty")</script>';
        echo '<script>window.location.href = "../view/reviewOrg.php";</script>';
        exit();
    }else{
        $orgProjData=[
            'organID'=>$organID,
            'projectID'=>$projectID,
            'reviews'=> $reviews,
            'ratings'=> $rating
        ];
        $projectData=[
            'projectID'=> $projectID,
            'workStatus'=> 'done'
        ];
        $projPropData=[
            'studentID'=> $studentID,
            'projectID'=> $projectID,
            'prop_status'=> 'completed'
        ];
        //adds projects to organizations completed projects
        if($organization->addOrgProj($orgProjData)){
            //updates project status from ongoing to done
            if($organization->updateProjStatus($projectData)){
                //updates student's proposal from accepted to completed
                if($student->updateProjProp($projPropData)){
                    echo '<script>alert("Review and Rating Process Successful")</script>';
                    echo '<script>window.location.href = "../view/stud_dashboard.php";</script>';
                    exit();

                }else{
                    echo '<script>alert("Unable to change project proposal status")</script>';
                    echo '<script>window.location.href = "../view/reviewOrg.php";</script>';
                    exit();
                }
            }else{
                echo '<script>alert("Unable to change project status")</script>';
                echo '<script>window.location.href = "../view/reviewOrg.php";</script>';
                exit();
            }
        }else{
            echo '<script>alert("Review and Rating Process Failed")</script>';
            echo '<script>window.location.href = "../view/reviewOrg.php";</script>';
            exit();
        }
    }
}
?>