<?php

if(isset($_POST['submit'])){
    require '../controller/database.php';
    require_once '../models/Student.php';
    require_once '../models/Lecturer.php';
    require_once '../models/Registry.php';
    require_once '../models/Database.php';

    $email= $_POST['email'];
    $password=$_POST['password'];
    $selected_category= $_POST['category'];

    //Instantiate Student
    $student= new Student();

    //Instantiate Lecturer
    $lecturer= new Lecturer();

    //Instantiate Registry
    $registry= new Registry();

    //if fields are empty
    if(empty($email)||empty($password)){
        echo '<script>alert("Empty Fields")</script>';
        echo '<script>window.location.href = "../view/sign_in.php";</script>';
       
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
                echo '<script>window.location.href = "../view/sign_up.php";</script>';
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
                    echo '<script>window.location.href = "../view/sign_in.php";</script>';
                    
                    exit();
                }elseif($passCheck==true){
                    session_start();
                    //creating session variables
                    $_SESSION['sessionId']=$stud->studentID;
                    $_SESSION['sessionEmail']=$stud->email;
                    $_SESSION['sessionFname']=$stud->fname;
                    $_SESSION['sessionLname']=$stud->lname;
                    echo '<script>alert("Well Done. Logged in successfully")</script>';
                    echo '<script>window.location.href = "../view/student_dashboard.php";</script>';
                    
                }else{
                    echo '<script>alert("Wrong Password")</script>';
                    echo '<script>window.location.href = "../view/sign_in.php";</script>';
                
                }
            }

        }
        elseif($selected_category=="lecturer"){

            //lecturer Email
            $lecturerEmail=[
                'email'=> $email
            ];
            if(!($lecturer->getLecturerEmail($lecturerEmail))){
                echo '<script>alert("No user")</script>';
                echo '<script>window.location.href = "../view/sign_up.php";</script>';
                exit();
            }

            else{
            
                //getting lecturer details
                $lect= $lecturer->getLecturerDetails($lecturerEmail);
                
                //verfiying password
                $passCheck=password_verify($password, $lect->password);
                echo $passCheck;
                if($passCheck==false){
                    echo '<script>alert("Wrong Password")</script>';
                    echo '<script>window.location.href = "../view/sign_in.php";</script>';
                    
                    exit();
                }elseif($passCheck==true){
                    session_start();
                    //creating session variables
                    $_SESSION['sessionId']=$lect->lecturerID;
                    $_SESSION['sessionEmail']=$lect->email;
                    $_SESSION['sessionFname']=$lect->fname;
                    $_SESSION['sessionLname']=$lect->lname;
                    echo '<script>alert("Well Done. Logged in successfully")</script>';
                    echo '<script>window.location.href = "../view/lecturer_dashboard.php";</script>';
                    
                }else{
                    echo '<script>alert("Wrong Password")</script>';
                    echo '<script>window.location.href = "../view/sign_in.php";</script>';
                
                }
            }

        }
        else{

            //registry Email
            $registryEmail=[
                'email'=> $email
            ];
            if(!($registry->getRegistryEmail($registryEmail))){
                echo '<script>alert("No user")</script>';
                echo '<script>window.location.href = "../view/sign_up.php";</script>';
                exit();
            }

            else{
            
                //getting registry details
                $reg= $registry->getRegistryDetails($registryEmail);
                
                //verfiying password
                $passCheck=password_verify($password, $reg->password);
                echo $passCheck;
                if($passCheck==false){
                    echo '<script>alert("Wrong Password")</script>';
                    echo '<script>window.location.href = "../view/sign_in.php";</script>';
                    
                    exit();
                }elseif($passCheck==true){
                    session_start();
                    //creating session variables
                    $_SESSION['sessionId']=$reg->registryID;
                    $_SESSION['sessionEmail']=$reg->email;
                    $_SESSION['sessionFname']=$reg->fname;
                    $_SESSION['sessionLname']=$reg->lname;
                    echo '<script>alert("Well Done. Logged in successfully")</script>';
                    echo '<script>window.location.href = "../view/reg_welcome.php";</script>';
                    
                }else{
                    echo '<script>alert("Wrong Password")</script>';
                    echo '<script>window.location.href = "../view/sign_in.php";</script>';
                
                }
            }

        }
        
    }
    
    
}else{

    header("Location: ../index.php?error=accessforbidden");
    exit();
}
?>