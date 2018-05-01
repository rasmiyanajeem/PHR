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
            $res_record = mysqli_query($mysqli, "SELECT * FROM `patient_health_record` WHERE `p_id` LIKE '" . $p_id . "'");
            $patient = mysqli_fetch_array($res_profile)
            ?>

            <?php

            if (mysqli_num_rows($res_profile) > 0) {
            ?>
            <div class="col m4">

                <div class="card hoverable" id="login">
                    <div class="card-content">
                        <p class="center">ID: <?php echo $patient['p_id']?></p>
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
                                <p class="center"><b>Height(cm)</b></p>
                                <p class="center"><?php echo $patient['height']; ?></p>
                            </div>
                            <div class="col s12">
                                <p class="center"><b>Weight(kg)</b></p>
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
                                    echo "<td id=\"testname$counter\">" . $res['testname'] . "</td>";
                                    echo "<td id=\"drname$counter\">" . $res['last_consulted_dr'] . "</td>";
                                    echo "<td id=\"drphone$counter\">" . $res['last_consulted_dr_phone'] . "</td>";
                                    echo "<td id=\"drdate$counter\">" . $res['consulted_date'] . "</td>";
                                    echo "<td><a id=\"report$counter\" style=\"margin-left:3px;margin-right:3px;\" target=\"_blank\" class=\"btn-floating waves-effect waves-light btn green tooltipped\" data-position=\"top\" data-delay=\"50\" data-tooltip=\"view report\" href=\"$res[medical_report]\" ><i class=\"material-icons text-white\">open_in_new</i></a>";
                                    echo "<a style=\"margin-left:3px;margin-right:3px;\" class=\"btn-floating waves-effect waves-light btn blue tooltipped\" data-position=\"top\" data-delay=\"50\" data-tooltip=\"Edit\" href=\"#\" onClick=\"editRecord($counter)\"><i class=\"material-icons text-white\">edit</i></a>";
                                    echo "<a style=\"margin-left:3px;margin-right:3px;\" class=\"btn-floating waves-effect waves-light btn red tooltipped\" data-position=\"top\" data-delay=\"50\" data-tooltip=\"Delete\" href=\"delete.php?id=$res[r_id]\" onClick=\"return confirm('Are you sure you want to delete?')\"><i class=\"material-icons text-white\">delete</i></a>";
                                    echo "<input id=\"r_id$counter\" value=\"$res[r_id]\" hidden></td>";
                                    echo "</tr>";
                                    $counter++;
                                }
                                $counter = 1;
                                }
                                else {
                                    echo "<h5 class='center'>You haven't added any records</h5>";
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
        ?>
    </div>

    <div class="fixed-action-btn" onclick="$('#add_record').modal('open');">
        <a class="btn-floating btn-large red">
            <i class="large material-icons">add</i>
        </a>
    </div>

    <!-- add record Structure -->
    <div id="add_record" class="modal" style="overflow-x: hidden;">
        <form action="upload.php" method="post" enctype="multipart/form-data">
        <div class="modal-content">
            <div class="row">
                <div class="col s6 offset-s3 center">
                    <h5>Add new report</h5>
                    <div class="input-field col s12">
                        <input id="testname" type="text" name="testname" required>
                        <label for="testname">What was the test for?</label>
                    </div>
                    <div class="input-field col s12">
                        <input id="drname" type="text" name="drname" required>
                        <label for="drname">What was the <b>Doctor's</b> name?</label>
                    </div>
                    <div class="input-field col s12">
                        <input id="drnumber" type="number" name="drnumber" required>
                        <label for="drnumber">Enter the <b>Doctor's</b> phone number</label>
                    </div>
                    <div class="input-field col s12">
                        <input id="drdate" type="date" name="drdate" required>
                    </div>
                    <div class="input-field col s12">
                        <div class="file-field input-field">
                            <div class="btn c-gradient">
                                <span>Image</span>
                                <input type="file" name="report" required>
                            </div>
                            <div class="file-path-wrapper">
                                <input class="file-path validate" type="text" required>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer container">
            <div class="row">
                <div class="col s6 offset-s3 center">
                    <a href="#!" class="modal-action modal-close btn-flat">Cancel</a>
                    <input class="btn modal-action c-gradient" type="submit"
                           name="submit" value="Add">
                </div>
            </div>
        </div>
        </form>
    </div>


    <!-- edit record Structure -->
    <div id="edit_record" class="modal" style="overflow-x: hidden;">
        <form action="edit.php" method="post" enctype="multipart/form-data">
            <div class="modal-content">
                <div class="row">
                    <div class="col s6 offset-s3 center">

                        <h5>Edit report</h5>
                        <div class="input-field col s12">
                            <input id="edittestname" type="text" name="testname">
                            <label for="edittestname">What was the test for?</label>
                        </div>
                        <div class="input-field col s12">
                            <input id="editdrname" type="text" name="drname">
                            <label for="editdrname">What was the <b>Doctor's</b> name?</label>
                        </div>
                        <div class="input-field col s12">
                            <input id="editdrnumber" type="number" name="drnumber">
                            <label for="editdrnumber">Enter the <b>Doctor's</b> phone number</label>
                        </div>
                        <div class="input-field col s12">
                            <input id="editdrdate" type="date" name="drdate">
                        </div>
                        <div class="input-field col s12">
                            <p>if you don't wish to change the image, leave it be.</p>
                            <div class="file-field input-field">
                                <div class="btn c-gradient">
                                    <span>Image</span>
                                    <input type="file" name="report">
                                </div>
                                <div class="file-path-wrapper">
                                    <input class="file-path validate" type="text" id="editfile">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <input id="r_id" name="edit_id" hidden>
            <div class="modal-footer container">
                <div class="row">
                    <div class="col s6 offset-s3 center">
                        <a href="#!" class="modal-action modal-close btn-flat">Cancel</a>
                        <input class="btn modal-action modal-close c-gradient" type="submit"
                               name="edit" value="edit">
                    </div>
                </div>
            </div>
        </form>
    </div>


<?php

//including the nav bar
include_once("footer.php");
?>