<?php

//including the database connection file
include("config.php");

//user id is stored in session
session_start();

$target_dir = "uploads/";
//extracts the file type
$extension = explode("/",$_FILES["report"]["type"])[1];

//extracts a portion of the filename
$filename = explode(".",$_FILES["report"]["name"])[0];

//sanitizes the filename of any special characters
$filename = preg_replace('/[^A-Za-z0-9]/', '', $filename);

//sets the new file name
$_FILES["report"]["name"] = $filename.time().'.'.$extension;

$target_file = $target_dir . basename($_FILES["report"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["report"]["tmp_name"]);
    if($check !== false) {
//        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["report"]["tmp_name"], $target_file)) {
//        echo "The file ". basename( $_FILES["report"]["name"]). " has been uploaded.";
        $testname = mysqli_real_escape_string($mysqli, $_POST['testname']);
        $drname = mysqli_real_escape_string($mysqli, $_POST['drname']);
        $drnumber = mysqli_real_escape_string($mysqli, $_POST['drnumber']);
        $drdate = mysqli_real_escape_string($mysqli, $_POST['drdate']);
        $p_id = $_SESSION['id'];
        // setting query statement
        $query = "INSERT INTO `patient_health_record` (`r_id`, `p_id`, `testname`, `medical_report`, `last_consulted_dr`, `last_consulted_dr_phone`, `consulted_date`) VALUES (NULL, '".$p_id."', '".$testname."', '".$target_file."', '".$drname."', '".$drnumber."', '".$drdate."')";
        echo $query;
        //executing query and retrieving id
        $p_rec_upload = mysqli_query($mysqli, $query);
        if($p_rec_upload){
            header("Location:pat_dash.php");
        }
        else{
            echo "error: couldn't insert into database";
        }

    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
