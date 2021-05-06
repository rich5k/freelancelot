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
    $companyInfo=$_POST['companyInfo'];
    $clocation=$_POST['clocation'];
    $cwebsite=$_POST['cwebsite'];

    //creating file path
    $path= "../studImages/".basename($_FILES['image']['name']);

    $picture=$_FILES['image']['name'];
    
    //if fields are empty
    if (empty($companyInfo) ||empty($clocation) || empty($cwebsite) || empty($picture)){
        echo '<script>alert("Some fields are empty)</script>';
        echo '<script>window.location.href = "../view/org_info.php";</script>';
        exit();
    }else{
        //companyInfo Data
        $companyInfoData =[
            'organID'=> $organID,
            'companyInfo'=> $companyInfo,
            'clocation'=> $clocation,
            'cwebsite'=> $cwebsite,
            'picture'=> $picture
        ];

        //Add organization Info
        if($organization->addOrgInfo($companyInfoData)){
            if(move_uploaded_file($_FILES['image']['tmp_name'],$path)){
                echo '<script>alert("Well Done. You created a profile for your company successfully")</script>';
                echo '<script>window.location.href = "../view/org_dashboard.php";</script>';
                exit();
            }
            else{
                echo '<script>alert("There is a problem with uploading image")</script>';
                echo '<script>window.location.href = "../view/org_info.php";</script>';
                exit();
            }

        }
        else{
            header("Location: ../view/org_info.php?error=sqlerror1");
            exit();
        }
    }

}

?>