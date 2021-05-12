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

    
    
    $studentID=$_POST['studentID'];
    $projectID=$_POST['projectID'];

    $projPropData=[
        'studentID'=> $studentID,
        'projectID'=> $projectID
        
    ];

    
    //deletes student proposal when declined
    if($student->deleteProjProp($projPropData)){
        echo '<script>alert("Well Done. You declined a proposal successfully")</script>';
        echo '<script>window.location.href = "../view/org_dashboard.php";</script>';
        exit();
        
    }else{
        echo '<script>alert("Unable to decline proposal")</script>';
        echo '<script>window.location.href = "../view/org_dashboard.php";</script>';
        exit();
    }
}
?>