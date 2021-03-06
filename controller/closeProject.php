<?php
session_start();
require_once '../controller/database.php';
require_once '../models/Database.php';
require_once '../models/Student.php';
require_once '../models/Organization.php';


$payStatus= $_POST['payStatus'];
//if project is paid
if($payStatus=='paid'){
    require_once('../vendor/autoload.php');
    \Stripe\Stripe::setApiKey('sk_test_51HQvfzGnX6tvw2VTj0G9UyqrnWsGNRbAVwBE7Tshilq4ZEEdkS0labBfhJFhxRJSm0pINEcmX9KI9qB2ISbm8nVF00zoxxBl9M');
    
    //Sanitize POST Array
    $POST= filter_var_array($_POST, FILTER_SANITIZE_STRING);
    
    $organID=$_SESSION['sessionId'];
    $studentID=$_POST['studentID'];
    $projectID=$_POST['projectID'];
    $reviews=$_POST['reviews'];
    $token= $POST['stripeToken'];
    $totalstr=$_POST['amount'];
    $totalAmt= $totalstr*100;
    $rating = $_POST['rating'];
    $email = $_SESSION['sessionEmail'];
    
    // echo $rating;
    
    //Instantiate Organization
    $organization= new Organization();
    $projectData=[
        'projectID'=> $projectID
    ];
    $project= $organization->getProjects($projectData);
    
    //Instantiate Student
    $student= new Student();

    //Create Customer IN Stripe
    $cust =\Stripe\Customer::create(array(
        "email"=>$email,
        "source"=>$token
    ));
    
    //Charge Customer
    $charge= \Stripe\Charge::create(array(
        "amount"=> $totalAmt,
        "currency"=>"usd",
        "description" => $project->ptitle,
        "customer" => $cust->id
    
    ));
    
    $studProjData=[
        'studentID'=> $studentID,
        'projectID'=> $projectID,
        'reviews'=> $reviews,
        'ratings'=> $rating
    ];
    
    $paymentData=[
        'studentID'=> $studentID,
        'projectID'=> $projectID,
        'organID'=> $organID,
        'acctDetails'=> $charge->id,
        'amount'=> $_POST['amount']
    ];
    //add project to students portfolio
    if($student->addStudProj($studProjData)){
        //makes payments
        if($organization->addPayments($paymentData)){
            echo '<script>alert("Review, Rating and Payment Process Successful")</script>';
            echo '<script>window.location.href = "../view/org_dashboard.php";</script>';
            exit();
        }else{
            echo '<script>alert("Payment Process Failed")</script>';
            echo '<script>window.location.href = "../view/endProject.php";</script>';
            exit();
        }
    }else{
        echo '<script>alert("Unable to rate and review student")</script>';
        echo '<script>window.location.href = "../view/endProject.php";</script>';
        exit();
    }
    //if project is voluntary
}else{
    //Instantiate Student
    $student= new Student();

    $organID=$_SESSION['sessionId'];
    $studentID=$_POST['studentID'];
    $projectID=$_POST['projectID'];
    $reviews=$_POST['reviews'];
    $rating = $_POST['rating'];
    $studProjData=[
        'studentID'=> $studentID,
        'projectID'=> $projectID,
        'reviews'=> $reviews,
        'ratings'=> $rating
    ];
    //adds project to student's portfolio
    if($student->addStudProj($studProjData)){
        echo '<script>alert("Review and Rating Process Successful")</script>';
        echo '<script>window.location.href = "../view/org_dashboard.php";</script>';
    }else{
        echo '<script>alert("Unable to rate and review student")</script>';
        echo '<script>window.location.href = "../view/endProject.php";</script>';
        exit();
    }

}






?>