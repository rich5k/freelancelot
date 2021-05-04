<?php
if(isset($_POST['submit'])){
    //Add Database connection
    require_once '../controller/database.php';
    require_once '../models/Student.php';
    require_once '../models/Organization.php';
    require_once '../models/Database.php';

    //Instantiate Student
    $student= new Student();

    //Instantiate Organization
    $organization= new Organization();

    

    
    $email=$_POST['email'];
    $password=$_POST['pswd'];
    $confirmPass=$_POST['confirmPswd'];
    $selected_category= $_POST['category'];
    
    
    if($selected_category=="student"){
        $fname= $_POST['fname'];
    $lname= $_POST['lname'];
        //if fields are empty
        if (empty($fname) ||empty($lname) || empty($email) || empty($password) || empty($confirmPass)){
            echo '<script>alert("Some fields are empty)</script>';
            echo '<script>window.location.href = "../view/signUp.php";</script>';
            exit();
        }elseif(!preg_match("/^[A-Za-z_]{3,}@[A-Za-z]{3,}[.]{1}[A-Za-z]{2,6}$/",$email) && !preg_match("/^[A-Za-z_]{3,}@[A-Za-z]{3,}[.]{1}[A-Za-z]{2,6}[.]{1}[A-Za-z]{2,6}$/",$email)){
            echo '<script>alert("Invalid email")</script>';
            echo '<script>window.location.href = "../view/signUp.php";</script>';
            exit();
        }elseif($password !== $confirmPass){
            echo '<script>alert("Passwords do not match")</script>';
            echo '<script>window.location.href = "../view/signUp.php";</script>';
            exit();
        }else{
            
            if($selected_category=="student"){
    
                //Student Email
                $studentEmail=[
                    'email'=> $email
                ];
                if($student->getStudentEmail($studentEmail)){
                    echo '<script>alert("Username Taken")</script>';
                    echo '<script>window.location.href = "../view/signUp.php";</script>';
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
                        echo '<script>window.location.href = "../view/signIn.php";</script>';
                        exit();
        
                    }
                    else{
                        header("Location: ../view/signUp.php?error=sqlerror1");
                        exit();
                    }
                }
    
            }
    
            
    
            
            
            
        }

    }
    else{
        $cname = $_POST['cname'];
        //if fields are empty
        if (empty($cname) || empty($email) || empty($password) || empty($confirmPass)){
            echo '<script>alert("Some fields are empty)</script>';
            echo '<script>window.location.href = "../view/signUp.php";</script>';
            exit();
        }elseif(!preg_match("/^[A-Za-z_]{3,}@[A-Za-z]{3,}[.]{1}[A-Za-z]{2,6}$/",$email) && !preg_match("/^[A-Za-z_]{3,}@[A-Za-z]{3,}[.]{1}[A-Za-z]{2,6}[.]{1}[A-Za-z]{2,6}$/",$email)){
            echo '<script>alert("Invalid email")</script>';
            echo '<script>window.location.href = "../view/signUp.php";</script>';
            exit();
        }elseif($password !== $confirmPass){
            echo '<script>alert("Passwords do not match")</script>';
            echo '<script>window.location.href = "../view/signUp.php";</script>';
            exit();
        }
        else{
            if($selected_category=="org"){
    
                //Organization Email
                $OrganizationEmail=[
                    'email'=> $email
                ];
                if($organization->getOrganizationEmail($OrganizationEmail)){
                    echo '<script>alert("Username Taken")</script>';
                    echo '<script>window.location.href = "../view/signUp.php";</script>';
                    exit();
                }
    
                else{
                
                    $hashedPass= password_hash($password, PASSWORD_DEFAULT);
        
                    //Organization Data
                    $OrganizationData =[
                        'cname'=> $cname,
                        'email'=> $email,
                        'password'=> $hashedPass
                    ];
                    
                    //Add Organization To Do
                    if($organization->addOrganization($OrganizationData)){
                        echo '<script>alert("Well Done. You have been registered successfully")</script>';
                        echo '<script>window.location.href = "../view/signIn.php";</script>';
                        exit();
        
                    }
                    else{
                        header("Location: ../view/signUp.php?error=sqlerror1");
                        exit();
                    }
                }
    
            }
        }
    }

    
}

?>