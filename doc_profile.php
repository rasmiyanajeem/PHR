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
        $d_id = $_SESSION['id'];
        $res_profile = mysqli_query($mysqli, "SELECT * FROM `doctor_record` WHERE `d_id` LIKE '" . $d_id . "'");
        $doctor = mysqli_fetch_array($res_profile)
        ?>

        <?php

        if (mysqli_num_rows($res_profile) > 0) {
            ?>
            <div class="col s12 m6 offset-m3" style="margin-top: 5%">
                <div class="card hoverable" id="login">
                    <div class="card-content">
                        <span class="card-title center-align">Edit Profile</span>

                        <div class="row">
                            <form class="col s12" action="doc_profile_edit.php" method="post">
                                <div class="input-field col s12">
                                    <input id="first_name" type="text" name="f_name" value="<?php echo $doctor['first_name']?>">
                                    <label for="first_name">First Name</label>
                                </div>
                                <div class="input-field col s12">
                                    <input id="first_name" type="text" name="m_name" value="<?php echo $doctor['middle_name']?>">
                                    <label for="first_name">Middle Name</label>
                                </div>
                                <div class="input-field col s12">
                                    <input id="last_name" type="text" name="l_name" value="<?php echo $doctor['last_name']?>">
                                    <label for="last_name">Last Name</label>
                                </div>
                                <div class="input-field col s12">
                                    <input id="email" type="email" name="email" value="<?php echo $doctor['email']?>">
                                    <label for="email">Email</label>
                                </div>
                                <div class="input-field col s12">
                                    <input id="phone" type="number" name="phone" value="<?php echo $doctor['phone']?>">
                                    <label for="phone">Phone</label>
                                </div>

                                <div class="input-field col s12">
                                    <input id="height" type="text" name="spcl" value="<?php echo $doctor['Specialization']?>">
                                    <label for="height">Specialization</label>
                                </div>
                                <div class="input-field col s12">
                                    <input id="weight" type="text" name="horc" value="<?php echo $doctor['hospitals/clinics']?>">
                                    <label for="weight">hospitals/clinics</label>
                                </div>


                                <div class="input-field col s6 center">
                                    <a href="./doc_dash.php" class="waves-effect waves-light btn-flat">Cancel</a>
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
