<?php

session_start();

//including the database connection file
include_once("config.php");


    $p_id = $_SESSION['id'];

    $firstname = mysqli_real_escape_string($mysqli, $_POST['f_name']);
    $middlename = mysqli_real_escape_string($mysqli, $_POST['m_name']);

//    since middle name is optional.
    if(empty($middlename)){
        $middlename = '';
    }


    $lastname = mysqli_real_escape_string($mysqli, $_POST['l_name']);
    $email = mysqli_real_escape_string($mysqli, $_POST['email']);
    $phone = mysqli_real_escape_string($mysqli, $_POST['phone']);
    $emerg_phone = mysqli_real_escape_string($mysqli, $_POST['emergency-phone']);
    $dob = mysqli_real_escape_string($mysqli, $_POST['dob']);
    $gender = mysqli_real_escape_string($mysqli, $_POST['gender']);
    $marital = mysqli_real_escape_string($mysqli, $_POST['marital']);
    $blood = mysqli_real_escape_string($mysqli, $_POST['blood']);
    $height = mysqli_real_escape_string($mysqli, $_POST['height']);
    $weight = mysqli_real_escape_string($mysqli, $_POST['weight']);
    $insurance = mysqli_real_escape_string($mysqli, $_POST['insurance']);
    $allergy = mysqli_real_escape_string($mysqli, $_POST['allergy']);

    // setting query statement
    $query = "UPDATE `patient_record` SET `first_name` = '".$firstname."', `middle_name` = '".$middlename."', `last_name` = '".$lastname."', `gender` = '".$gender."', `dob` = '".$dob."', `blood_group` = '".$blood."', `height` = '".$height."', `weight` = '".$weight."', `allergy` = '".$allergy."', `insurance` = '".$insurance."', `marital_status` = '".$marital."', `phone` = '".$phone."', `email` = '".$email."', `emergency-contact` = '".$emerg_phone."' WHERE `patient_record`.`p_id` = '".$p_id."'";

    echo $query;
    //executing query and retrieving id
    $p_prof_edit = mysqli_query($mysqli, $query);
    if($p_prof_edit){
        header("Location:pat_dash.php");
    }
    else{
        echo "error: couldn't update profile";
    }