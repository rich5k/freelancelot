<?php
    include ("../models/Student.php");
    if(isset($_POST["cover_apply"])){
        $stud_id = $_SESSION["sessionId"];
        $job_id = $_SESSION["detail_id"];
        $letter= $_POST["vocer_apply"];
        $additional_info = $_POST["notes"];
        $prop_data = ["projectID"=>$job_id, "studentID"=>$stud_id, "cover_letter"=>$letter, "notes"=>$additional_info];

        // $files = $_POST['attachments'];
        // foreach($files as $file){
        //     $filename = $_FILES[''][''];
        //     //Stores the filetype
        //     $filetype = $_FILES[''][''];

        //     $filePath = "images/";

        //     if(is_uploaded_file($file)) {
        //         if(move_uploaded_file($file, $filePath . $filename)) {
        //             echo "File Sussecfully saved.";
        //         }
        //         else {
        //             echo "Failed to move.";
        //         }
        //     }
        //     else {
        //         echo "Failed to save file.";
        //     }
        // }
        $student= new Student();
        $student->addApplication($prop_data);
    }

?>