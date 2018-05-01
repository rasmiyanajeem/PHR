<?php

session_start();

//including the database connection file
include_once("config.php");


$d_id = $_SESSION['id'];


$firstname = mysqli_real_escape_string($mysqli, $_POST['f_name']);
$email = mysqli_real_escape_string($mysqli, $_POST['email']);
$phone = mysqli_real_escape_string($mysqli, $_POST['phone']);
$lastname = mysqli_real_escape_string($mysqli, $_POST['l_name']);
$middlename = mysqli_real_escape_string($mysqli, $_POST['m_name']);
$spcl = mysqli_real_escape_string($mysqli, $_POST['spcl']);
$horc = mysqli_real_escape_string($mysqli, $_POST['horc']);


// setting query statement
$query = "UPDATE `doctor_record` SET `first_name` = '".$firstname."', `middle_name` = '".$middlename."', `last_name` = '".$lastname."', `phone` = '".$phone."', `email` = '".$email."', `Specialization` = '".$spcl."' , `hospitals/clinics` = '".$horc."' WHERE `doctor_record`.`d_id` = '".$d_id."'";

echo $query;
//executing query and retrieving id
$d_prof_edit = mysqli_query($mysqli, $query);
if($d_prof_edit){
    header("Location:doc_dash.php");
}
else{
    echo "error: couldn't update profile";
}