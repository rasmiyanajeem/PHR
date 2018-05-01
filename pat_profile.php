<?php

session_start();

//including the database connection file
include_once("config.php");

//including the nav bar
include_once("nav.php");
?>

<div class="container">

    <div class="row" style="margin-top: 1%;">

        <?php
        $p_id = $_SESSION['id'];
        $res_profile = mysqli_query($mysqli, "SELECT * FROM `patient_record` WHERE `p_id` LIKE '" . $p_id . "'");
        $patient = mysqli_fetch_array($res_profile)
        ?>

        <?php

        if (mysqli_num_rows($res_profile) > 0) {
            ?>
            <div class="col s12 m6 offset-m3" style="margin-top: 5%">
                <div class="card hoverable" id="login">
                    <div class="card-content">
                        <span class="card-title center-align">Edit Profile</span>

                        <div class="row">
                            <form class="col s12" action="pat_profile_edit.php" method="post">
                                <div class="input-field col s12">
                                    <input id="first_name" type="text" name="f_name" value="<?php echo $patient['first_name']?>">
                                    <label for="first_name">First Name</label>
                                </div>
                                <div class="input-field col s12">
                                    <input id="first_name" type="text" name="m_name" value="<?php echo $patient['middle_name']?>">
                                    <label for="first_name">Middle Name</label>
                                </div>
                                <div class="input-field col s12">
                                    <input id="last_name" type="text" name="l_name" value="<?php echo $patient['last_name']?>">
                                    <label for="last_name">Last Name</label>
                                </div>
                                <div class="input-field col s12">
                                    <input id="email" type="email" name="email" value="<?php echo $patient['email']?>">
                                    <label for="email">Email</label>
                                </div>
                                <div class="input-field col s12">
                                    <input id="phone" type="number" name="phone" value="<?php echo $patient['phone']?>">
                                    <label for="phone">Phone</label>
                                </div>

                                <div class="input-field col s12">
                                    <select class="icons" id="blood" name="blood">
                                        <option value="O+" class="left circle" <?php if($patient['blood_group'] == "O+"){?>selected<?php }?>>O+</option>
                                        <option value="O-" class="left circle" <?php if($patient['blood_group'] == "O-"){?>selected<?php }?>>O-</option>
                                        <option value="A+" class="left circle" <?php if($patient['blood_group'] == "A+"){?>selected<?php }?>>A+</option>
                                        <option value="A-" class="left circle" <?php if($patient['blood_group'] == "A-"){?>selected<?php }?>>A-</option>
                                        <option value="B+" class="left circle" <?php if($patient['blood_group'] == "B+"){?>selected<?php }?>>B+</option>
                                        <option value="B-" class="left circle" <?php if($patient['blood_group'] == "B-"){?>selected<?php }?>>B-</option>
                                        <option value="AB+" class="left circle" <?php if($patient['blood_group'] == "AB+"){?>selected<?php }?>>AB+</option>
                                        <option value="AB-" class="left circle" <?php if($patient['blood_group'] == "AB-"){?>selected<?php }?>>AB-</option>
                                    </select>
                                    <label>blood type</label>
                                </div>
                                <div class="input-field col s12">
                                    <input id="height" type="number" name="height" value="<?php echo $patient['height']?>">
                                    <label for="height">height in <b>cm</b></label>
                                </div>
                                <div class="input-field col s12">
                                    <input id="weight" type="number" name="weight" value="<?php echo $patient['weight']?>">
                                    <label for="weight">weight in <b>kg</b></label>
                                </div>
                                <div class="input-field col s12">
                                    <input id="allergy" type="text" name="allergy" value="<?php echo $patient['allergy']?>">
                                    <label for="allergy">allergy</label>
                                </div>
                                <div class="input-field col s12">
                                    <select class="icons" id="insurance" name="insurance">
                                        <option value="yes" class="left circle"  <?php if($patient['insurance'] == "yes"){?>selected<?php }?>>yes</option>
                                        <option value="no" class="left circle"  <?php if($patient['insurance'] == "no"){?>selected<?php }?>>no</option>
                                    </select>
                                    <label>Insurance</label>
                                </div>
                                <div class="input-field col s12">
                                    <input id="emergency-phone" type="number" name="emergency-phone" value="<?php echo $patient['emergency-contact']?>">
                                    <label for="emergency-phone">Emergency Phone</label>
                                </div>
                                <div class="input-field col s12">
                                    <input type="date" name="dob" value="<?php echo $patient['dob']?>">
                                </div>
                                <div class="input-field col s12">
                                    <select class="icons" id="gender" name="gender">
                                        <option value="Male" data-icon="./img/man.png" class="left circle" <?php if($patient['gender'] == "Male"){?>selected<?php }?>>Male
                                        </option>
                                        <option value="Female" data-icon="./img/woman.png" class="left circle" <?php if($patient['gender'] == "Female"){?>selected<?php }?>>Female
                                        </option>
                                        <option value="Other" data-icon="./img/other.png" class="left circle" <?php if($patient['gender'] == "Other"){?>selected<?php }?>>Other
                                        </option>
                                    </select>
                                    <label>Gender</label>
                                </div>
                                <div class="input-field col s12">
                                    <select class="icons" id="marital" name="marital">
                                        <option value="Single" <?php if($patient['marital_status'] == "Single"){?>selected<?php }?>>Single</option>
                                        <option value="Married" <?php if($patient['marital_status'] == "Married"){?>selected<?php }?>>Married</option>
                                        <option value="Divorced" <?php if($patient['marital_status'] == "Divorced"){?>selected<?php }?>>Divorced</option>
                                        <option value="Widowed" <?php if($patient['marital_status'] == "Widowed"){?>selected<?php }?>>Widowed</option>
                                    </select>
                                    <label>Marital Status </label>
                                </div>

                                <div class="input-field col s6 center">
                                    <a href="./pat_dash.php" class="waves-effect waves-light btn-flat">Cancel</a>
                                </div>

                                <div class="input-field col s6">
                                    <input class="btn col s12 c-gradient" type="submit"
                                           name="Submit" value="Update">
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>


            <?php
        }

        ?>
    </div>
</div>

<?php

//including the nav bar
include_once("footer.php");
?>
