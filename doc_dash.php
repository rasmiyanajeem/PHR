<?php

session_start();

//including the database connection file
include_once("config.php");

//including the nav bar
include_once("nav.php");
?>

    <div class="container">

        <div class="row">
            <div class="col s12 m6 offset-m3" style="margin-top: 1%">

                <div class="row">
                    <form class="col s12" action="" method="get">
                        <div class="input-field col s10">
                            <input id="p_id" type="text" name="p_id" required>
                            <label for="p_id">Enter Patient ID</label>
                        </div>

                        <div class="input-field col s2">
                            <input class="btn col s12 c-gradient" type="submit"
                                   name="Submit" value="View">
                        </div>
                    </form>
                </div>

            </div>
        </div>

        <div class="row">

            <?php

            if (isset($_GET['Submit'])) {

            $p_id = mysqli_real_escape_string($mysqli, $_GET['p_id']);
            $res_profile = mysqli_query($mysqli, "SELECT * FROM `patient_record` WHERE `p_id` LIKE '" . $p_id . "'");
            $res_record = mysqli_query($mysqli, "SELECT * FROM `patient_health_record` WHERE `p_id` LIKE '" . $p_id . "'");
            $patient = mysqli_fetch_array($res_profile)
            ?>

            <?php

            if (mysqli_num_rows($res_profile) > 0) {
            ?>
            <div class="col m4">

                <div class="card hoverable" id="login">
                    <div class="card-content">
                        <span class="card-title center-align"><?php echo $patient['first_name'] . " " . $patient['middle_name'] . " " . $patient['last_name']; ?></span>

                        <div class="row">

                            <div class="col s12">
                                <p class="center"><b>Gender</b></p>
                                <p class="center"><?php echo $patient['gender']; ?></p>
                            </div>
                            <div class="col s12">
                                <p class="center"><b>Date of Birth</b></p>
                                <p class="center"><?php echo $patient['dob']; ?></p>
                            </div>
                            <div class="col s12">
                                <p class="center"><b>Blood Group</b></p>
                                <p class="center"><?php echo $patient['blood_group']; ?></p>
                            </div>
                            <div class="col s12">
                                <p class="center"><b>Marital Status</b></p>
                                <p class="center"><?php echo $patient['marital_status']; ?></p>
                            </div>
                            <div class="col s12">
                                <p class="center"><b>Height (cm)</b></p>
                                <p class="center"><?php echo $patient['height']; ?></p>
                            </div>
                            <div class="col s12">
                                <p class="center"><b>Weight (kg)</b></p>
                                <p class="center"><?php echo $patient['weight']; ?></p>
                            </div>
                            <div class="col s12">
                                <p class="center"><b>Allergy</b></p>
                                <p class="center"><?php echo $patient['allergy']; ?></p>
                            </div>
                            <div class="col s12">
                                <p class="center"><b>Phone</b></p>
                                <p class="center"><?php echo $patient['phone']; ?></p>
                            </div>
                            <div class="col s12">
                                <p class="center"><b>Emergency Phone</b></p>
                                <p class="center"><?php echo $patient['emergency-contact']; ?></p>
                            </div>
                            <div class="col s12">
                                <p class="center"><b>Email</b></p>
                                <p class="center"><?php echo $patient['email']; ?></p>
                            </div>
                            <div class="col s12">
                                <p class="center"><b>Insurance</b></p>
                                <p class="center"><?php echo $patient['insurance']; ?></p>
                            </div>
                            <div class="col s12">
                                <p class="center"><b>Address</b></p>
                                <p class="center"><?php echo $patient['address']; ?></p>
                            </div>
                            <div class="col s12">
                                <p class="center"><b>City</b></p>
                                <p class="center"><?php echo $patient['city']; ?></p>
                            </div>
                            <div class="col s12">
                                <p class="center"><b>State</b></p>
                                <p class="center"><?php echo $patient['state']; ?></p>
                            </div>
                            <div class="col s12">
                                <p class="center"><b>Country</b></p>
                                <p class="center"><?php echo $patient['nationality']; ?></p>
                            </div>
                            <div class="col s12">
                                <p class="center"><b>PIN Code</b></p>
                                <p class="center"><?php echo $patient['pincode']; ?></p>
                            </div>

                        </div>

                    </div>
                </div>


            </div>

            <?php

            if (mysqli_num_rows($res_record) > 0) {
            ?>
            <div class="col m8">

                <div class="card hoverable" id="login">
                    <div class="card-content">
                        <span class="card-title center-align">Records</span>

                        <div class="row">


                            <table class="striped responsive-table">
                                <thead>
                                <tr>
                                    <th>Test name</th>
                                    <th>Consulted</th>
                                    <th>Contact</th>
                                    <th>Date</th>
                                    <th>Action</th>
                                </tr>
                                </thead>

                                <tbody>

                                <?php

                                $counter = 1;

                                while ($res = mysqli_fetch_array($res_record)) {
                                    echo "<tr>";
                                    echo "<td id=\"testname$counter \">" . $res['testname'] . "</td>";
                                    echo "<td id=\"drname$counter\">" . $res['last_consulted_dr'] . "</td>";
                                    echo "<td id=\"drphone$counter\">" . $res['last_consulted_dr_phone'] . "</td>";
                                    echo "<td id=\"drdate$counter\">" . $res['consulted_date'] . "</td>";
                                    echo "<td><a id=\"report$counter\" style=\"margin-left:3px;margin-right:3px;\" target=\"_blank\" class=\"btn-floating waves-effect waves-light btn green tooltipped\" data-position=\"top\" data-delay=\"50\" data-tooltip=\"view report\" href=\"$res[medical_report]\" ><i class=\"material-icons text-white\">open_in_new</i></a></td>";
                                    echo "</tr>";
                                    $counter++;
                                }
                                }
                                else {
                                    echo "<h5 class='center'>Oops! Patient hasn't added any records</h5>";
                                }
                                ?>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>

            </div>

        </div>
        <?php
        }
        else {
            ?>
            <div class="row">
                <h5 class="center">Sorry! patient not found.</h5>
            </div>

            <?php
        }
        }
        ?>
    </div>
<?php


//including the footer scripts
include_once("footer.php");
?>