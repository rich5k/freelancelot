<?php
if(isset($_POST['submit'])){
    //Add Database connection
    require_once '../controller/database.php';
    require_once '../models/Student.php';
    require_once '../models/Lecturer.php';
    require_once '../models/Registry.php';
    require_once '../models/Database.php';

    //Instantiate Student
    $student= new Student();

    //Instantiate Lecturer
    $lecturer= new Lecturer();

    //Instantiate Registry
    $registry= new Registry();

    $fname= $_POST['fname'];
    $lname= $_POST['lname'];
    $email=$_POST['email'];
    $password=$_POST['pswd'];
    $confirmPass=$_POST['confirmPswd'];
    $selected_category= $_POST['category'];

    
    

    //if fields are empty
    if (empty($fname) ||empty($lname) || empty($email) || empty($password) || empty($confirmPass)){
        echo '<script>alert("Some fields are empty)</script>';
        echo '<script>window.location.href = "../view/sign_up.php";</script>';
        exit();
    }elseif(!preg_match("/^[A-Za-z_]{3,}@[A-Za-z]{3,}[.]{1}[A-Za-z]{2,6}$/",$email) && !preg_match("/^[A-Za-z_]{3,}@[A-Za-z]{3,}[.]{1}[A-Za-z]{2,6}[.]{1}[A-Za-z]{2,6}$/",$email)){
        echo '<script>alert("Invalid email")</script>';
        echo '<script>window.location.href = "../view/sign_up.php";</script>';
        exit();
    }elseif($password !== $confirmPass){
        echo '<script>alert("Passwords do not match")</script>';
        echo '<script>window.location.href = "../view/sign_up.php";</script>';
        exit();
    }else{
        
        if($selected_category=="student"){

            //Student Email
            $studentEmail=[
                'email'=> $email
            ];
            if($student->getStudentEmail($studentEmail)){
                echo '<script>alert("Username Taken")</script>';
                echo '<script>window.location.href = "../view/sign_up.php";</script>';
                exit();
            }

            else{
            
                $hashedPass= password_hash($password, PASSWORD_DEFAULT);
    
                //Student Data
                $StudentData =[
                    'fname'=> $fname,
                    'lname'=> $lname,
                    'email'=> $email,
                    'password'=> $hashedPass
                ];
                
                //Add Student To Do
                if($student->addStudent($StudentData)){
                    echo '<script>alert("Well Done. You have been registered successfully")</script>';
                    echo '<script>window.location.href = "../view/sign_in.php";</script>';
                    exit();
    
                }
                else{
                    header("Location: ../view/sign_up.php?error=sqlerror1");
                    exit();
                }
            }

        }

        elseif($selected_category=="lecturer"){

            //lecturer Email
            $lecturerEmail=[
                'email'=> $email
            ];
            if($lecturer->getLecturerEmail($lecturerEmail)){
                echo '<script>alert("Username Taken")</script>';
                echo '<script>window.location.href = "../view/sign_up.php";</script>';
                exit();
            }

            else{
            
                $hashedPass= password_hash($password, PASSWORD_DEFAULT);
    
                //lecturer Data
                $lecturerData =[
                    'fname'=> $fname,
                    'lname'=> $lname,
                    'email'=> $email,
                    'password'=> $hashedPass
                ];
                
                //Add lecturer To Do
                if($lecturer->addLecturer($lecturerData)){
                    echo '<script>alert("Well Done. You have been registered successfully")</script>';
                    echo '<script>window.location.href = "../view/sign_in.php";</script>';
                    exit();
    
                }
                else{
                    header("Location: ../view/sign_up.php?error=sqlerror1");
                    exit();
                }
            }

        }

        else{

            //registry Email
            $registryEmail=[
                'email'=> $email
            ];
            if($registry->getRegistryEmail($registryEmail)){
                echo '<script>alert("Username Taken")</script>';
                echo '<script>window.location.href = "../view/sign_up.php";</script>';
                exit();
            }

            else{
            
                $hashedPass= password_hash($password, PASSWORD_DEFAULT);
    
                //registry Data
                $registryData =[
                    'fname'=> $fname,
                    'lname'=> $lname,
                    'email'=> $email,
                    'password'=> $hashedPass
                ];
                
                //Add registry To Do
                if($registry->addRegistry($registryData)){
                    echo '<script>alert("Well Done. You have been registered successfully")</script>';
                    echo '<script>window.location.href = "../view/sign_in.php";</script>';
                    exit();
    
                }
                else{
                    header("Location: ../view/sign_up.php?error=sqlerror1");
                    exit();
                }
            }

        }
        
        
    }
    
}

?>