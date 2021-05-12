<?php
if(isset($_POST['submit'])){

    //Add Database connection
    require_once '../controller/database.php';
    require_once '../models/Student.php';
    require_once '../models/Organization.php';
    require_once '../models/Database.php';
    session_start();
    //Instantiate Student
    $student= new Student();

    //Instantiate Organization
    $organization= new Organization();

    $prop_status = 'accepted';
    $studentID=$_POST['studentID'];
    $projectID=$_POST['projectID'];

    $projPropData=[
        'studentID'=> $studentID,
        'projectID'=> $projectID,
        'prop_status'=> $prop_status
    ];

    $projectData =[
        'projectID'=> $projectID
    ];

    $updateProjectData =[
        'projectID'=> $projectID,
        'workStatus'=> 'ongoing'
    ];
    //updates students project proposal from pending to accepted
    if($student->updateProjProp($projPropData)){
        //clears all proposals that are not approved
        if($student->clearProjProp($projectData)){
            //update project status from pending to ongoing
            if($organization->updateProjStatus($updateProjectData)){
                echo '<script>alert("Well Done. You accepted a proposal successfully")</script>';
                echo '<script>window.location.href = "../view/org_dashboard.php";</script>';
                exit();
            }else{
                echo '<script>alert("Unable to accept status3")</script>';
                echo '<script>window.location.href = "../view/student_proposal.php";</script>';
                exit();
            }
        }else{
            echo '<script>alert("Unable to accept status2")</script>';
            echo '<script>window.location.href = "../view/student_proposal.php";</script>';
            exit();
        }
    }else{
        echo '<script>alert("Unable to accept status1")</script>';
        echo '<script>window.location.href = "../view/student_proposal.php";</script>';
        exit();
    }
}
?>