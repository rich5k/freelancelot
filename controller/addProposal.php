<?php
if(isset($_POST['submit'])){

    //Add Database connection
    require_once '../controller/database.php';
    require_once '../models/Student.php';
    require_once '../models/Database.php';
    session_start();
    //Instantiate Student
    $student= new Student();

    $studentID=$_SESSION['sessionId'];
    $projID=$_POST['projID'];
    $proposal=$_POST['proposal'];
    
    
    //if fields are empty
    if (empty($projID) ||empty($proposal) ){
        echo '<script>alert("Some fields are empty)</script>';
        echo '<script>window.location.href = "../view/proposal.php";</script>';
        exit();
    }else{
        //Proposal Data
        $proposalData =[
            'studentID'=> $studentID,
            'projectID'=> $projID,
            'proposal'=> $proposal,
            'prop_status'=> "pending"
            
        ];

        //Add Student Proposal
        if($student->addProjProp($proposalData)){
            echo '<script>alert("Well Done. You created a proposal successfully")</script>';
            echo '<script>window.location.href = "../view/projects.php";</script>';
            exit();
            

        }
        else{
            header("Location: ../view/proposal.php?error=sqlerror1");
            exit();
        }
    }

}

?>