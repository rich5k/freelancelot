<?php

if(isset($_POST['submit'])){
    require '../controller/database.php';
    require_once '../models/Student.php';
    require_once '../models/Organization.php';
   
    require_once '../models/Database.php';

    $email= $_POST['email'];
    $password=$_POST['password'];
    $selected_category= $_POST['category'];

    //Instantiate Student
    $student= new Student();

    //Instantiate Organization
    $organization= new Organization();

    

    //if fields are empty
    if(empty($email)||empty($password)){
        echo '<script>alert("Empty Fields")</script>';
        echo '<script>window.location.href = "../view/signIn.php";</script>';
       
        exit();
    }
    else{

        if($selected_category=="student"){

            //Student Email
            $studentEmail=[
                'email'=> $email
            ];
            if(!($student->getStudentEmail($studentEmail))){
                echo '<script>alert("No user")</script>';
                echo '<script>window.location.href = "../view/signUp.php";</script>';
                exit();
            }

            else{
            
                //getting student details
                $stud= $student->getStudentDetails($studentEmail);
                
                //verfiying password
                $passCheck=password_verify($password, $stud->password);
                echo $passCheck;
                if($passCheck==false){
                    echo '<script>alert("Wrong Password")</script>';
                    echo '<script>window.location.href = "../view/signIn.php";</script>';
                    
                    exit();
                }elseif($passCheck==true){
                    session_start();
                    //creating session variables
                    $_SESSION['sessionId']=$stud->studentID;
                    $_SESSION['sessionEmail']=$stud->email;
                    $_SESSION['sessionFname']=$stud->fname;
                    $_SESSION['sessionLname']=$stud->lname;
                    echo '<script>alert("Well Done. Logged in successfully")</script>';
                    echo '<script>window.location.href = "../view/stud_dashboard.php";</script>';
                    
                }else{
                    echo '<script>alert("Wrong Password")</script>';
                    echo '<script>window.location.href = "../view/signIn.php";</script>';
                
                }
            }

        }
        else{

            //Organization Email
            $OrganizationEmail=[
                'email'=> $email
            ];
            if(!($organization->getOrganizationEmail($OrganizationEmail))){
                echo '<script>alert("No user")</script>';
                echo '<script>window.location.href = "../view/signUp.php";</script>';
                exit();
            }

            else{
            
                //getting Organization details
                $org= $organization->getOrganizationDetails($OrganizationEmail);
                
                //verfiying password
                $passCheck=password_verify($password, $org->password);
                echo $passCheck;
                if($passCheck==false){
                    echo '<script>alert("Wrong Password")</script>';
                    echo '<script>window.location.href = "../view/signIn.php";</script>';
                    
                    exit();
                }elseif($passCheck==true){
                    session_start();
                    //creating session variables
                    $_SESSION['sessionId']=$org->organID;
                    $_SESSION['sessionEmail']=$org->email;
                    $_SESSION['sessionCname']=$org->cname;
                    
                    echo '<script>alert("Well Done. Logged in successfully")</script>';
                    echo '<script>window.location.href = "../view/org_dashboard.php";</script>';
                    
                }else{
                    echo '<script>alert("Wrong Password")</script>';
                    echo '<script>window.location.href = "../view/signIn.php";</script>';
                
                }
            }

        }
        
        
    }
    
    
}else{

    header("Location: ../index.php?error=accessforbidden");
    exit();
}
?>