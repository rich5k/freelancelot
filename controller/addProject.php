<?php
if(isset($_POST['submit'])){

    //Add Database connection
    require_once '../controller/database.php';
    require_once '../models/Organization.php';
    require_once '../models/Database.php';
    session_start();
    //Instantiate Organization
    $organization= new Organization();

    $organID=$_SESSION['sessionId'];
    $ptitle=$_POST['ptitle'];
    $pdescription=$_POST['pdescription'];
    $payStatus=$_POST['payStatus'];
    $amount=$_POST['amount'];
    $pdifficulty=$_POST['pdifficulty'];
    $currentDate = date("Y-m-d");
    $currentTime = date("H:i:s");

    $createTime =  date("Y-m-d H:i:s", strtotime($currentDate . $currentTime));

    
    
    //if fields are empty
    if (empty($ptitle) ||empty($pdescription) || empty($payStatus) || empty($amount) || empty($pdifficulty)){
        echo '<script>alert("Some fields are empty)</script>';
        echo '<script>window.location.href = "../view/post_project.php";</script>';
        exit();
    }else{
        //Project Data
        $projectData =[
            'organID'=> $organID,
            'ptitle'=> $ptitle,
            'pdescription'=> $pdescription,
            'createTime'=> $createTime,
            'payStatus'=> $payStatus,
            'amount'=> $amount,
            'pdifficulty'=> $pdifficulty,
            'workStatus'=> 'pending'
        ];

        //Add Organization Project
        if($organization->addProjects($projectData)){
            echo '<script>alert("Well Done. You created a project successfully")</script>';
            echo '<script>window.location.href = "../view/projects.php";</script>';
            exit();
            

        }
        else{
            header("Location: ../view/post_project.php?error=sqlerror1");
            exit();
        }
    }

}

?>