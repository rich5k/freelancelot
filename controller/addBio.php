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
    $bio=$_POST['Bio'];
    $major=$_POST['major'];
    $university=$_POST['university'];

    //creating file path
    $path= "../studImages/".basename($_FILES['image']['name']);

    $picture=$_FILES['image']['name'];
    
    //if fields are empty
    if (empty($bio) ||empty($major) || empty($university) || empty($picture)){
        echo '<script>alert("Some fields are empty")</script>';
        echo '<script>window.location.href = "../view/stud_bio.php";</script>';
        exit();
    }else{
        //Bio Data
        $BioData =[
            'studentID'=> $studentID,
            'bio'=> $bio,
            'major'=> $major,
            'university'=> $university,
            'picture'=> $picture
        ];

        //Add Student Bio
        if($student->addStudentBio($BioData)){
            if(move_uploaded_file($_FILES['image']['tmp_name'],$path)){
                echo '<script>alert("Well Done. You created a bio successfully")</script>';
                echo '<script>window.location.href = "../view/stud_dashboard.php";</script>';
                exit();
            }
            else{
                echo '<script>alert("There is a problem with uploading image")</script>';
                echo '<script>window.location.href = "../view/stud_bio.php";</script>';
                exit();
            }

        }
        else{
            header("Location: ../view/stud_bio.php?error=sqlerror1");
            exit();
        }
    }

}

?>