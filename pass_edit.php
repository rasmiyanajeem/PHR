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
        ?>

            <div class="col s12 m6 offset-m3" style="margin-top: 5%">
                <div class="card hoverable" id="login">
                    <div class="card-content">
                        <span class="card-title center-align">Set new password</span>

                        <div class="row">
                            <form class="col s12" action="" method="post">
                                <div class="input-field col s12">
                                    <input id="new_pass" type="text" name="new_pass" required>
                                    <label for="new_pass">New Password</label>
                                </div>

                                <?php
                                if($_SESSION['desig']== 'Patient') {
                                    ?>
                                    <div class="input-field col s6 center">
                                        <a href="./pat_dash.php" class="waves-effect waves-light btn-flat">Cancel</a>
                                    </div>
                                    <?php
                                }
                                else{
                                    ?>
                                    <div class="input-field col s6 center">
                                        <a href="./doc_dash.php" class="waves-effect waves-light btn-flat">Cancel</a>
                                    </div>
                                    <?php
                                }
                                ?>

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
        if(isset($_POST['Submit'])){
            $new_pass = mysqli_real_escape_string($mysqli, $_POST['new_pass']);
            $query = "UPDATE `reg_users` SET `password` = '" . $new_pass . "' WHERE `reg_users`.`id` = '" . $p_id . "'";
            $pass_edit = mysqli_query($mysqli, $query);
            if($pass_edit){
                if($_SESSION['desig']== 'Patient'){
                    header("Location:pat_dash.php");
                }
                else{
                    header("Location:doc_dash.php");
                }
            }
            else{
                echo "Error: password couldn't be updated.";
            }
        }

        ?>
    </div>
</div>

<?php

//including the nav bar
include_once("footer.php");
?>
