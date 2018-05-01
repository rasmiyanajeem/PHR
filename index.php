<?php
    session_start();
    session_destroy();

    if(isset($_GET['msg'])){
        echo '<script type="text/javascript">alert("Invalid Username or Password!");</script>';
    }
?>
<!DOCTYPE html>
<html>
<head>
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="css/materialize.min.css" media="screen,projection"/>
    <link rel="stylesheet" href="css/style.css"/>

    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Home | PHR</title>
</head>

<body>

<nav>
    <div class="nav-wrapper c-gradient">
        <div class="container">
            <a href="index.php" class="brand-logo c-brand center">Patient Health Record</a>
        </div>
    </div>
</nav>

<div class="container">

    <div class="row">
        <div class="col s12 m6 offset-m3" style="margin-top: 5%">
            <div class="card hoverable" id="login">
                <div class="card-content">
                    <span class="card-title center-align">Login</span>

                    <div class="row">
                        <form class="col s12" action="login.php" method="post">
                            <div class="input-field col s12">
                                <input id="username" type="text" name="username" required>
                                <label for="username">Username</label>
                            </div>
                            <div class="input-field col s12">
                                <input id="password" type="password" name="password" required>
                                <label for="password">Password</label>
                            </div>

                            <div class="input-field col s12">
                                <input class="btn col s12 c-gradient" type="submit"
                                       name="Submit" value="Login">
                            </div>
                        </form>
                    </div>

                </div>
                <div class="card-action center-align">
                    <p>not a member? <a class="phr-link" onclick="toggle(0)">click here</a></p>
                </div>
            </div>


            <div class="card hoverable" id="register">
                <div class="card-content">
                    <span class="card-title center-align">Register</span>

                    <div class="row">
                        <form class="col s12" action="add.php" method="post">
                            <p style="font-size: x-small; font-weight: bold; text-align: center;">All fields except
                                middle name are mandatory.</p>
                            <div class="input-field col s12">
                                <input id="first_name" type="text" name="f_name" pattern="[A-Za-z]" required>
                                <label for="first_name">First Name</label>
                            </div>
                            <div class="input-field col s12">
                                <input id="first_name" type="text" name="m_name" pattern="[A-Za-z]">
                                <label for="first_name">Middle Name</label>
                            </div>
                            <div class="input-field col s12">
                                <input id="last_name" type="text" name="l_name" pattern="[A-Za-z]" required>
                                <label for="last_name">Last Name</label>
                            </div>
                            <div class="input-field col s12">
                                <input id="username" type="text" name="username" required>
                                <label for="username">Username</label>
                            </div>
                            <div class="input-field col s12">
                                <input id="email" type="email" name="email" required>
                                <label for="email">Email</label>
                            </div>
                            <div class="input-field col s12">
                                <input id="phone" type="number" name="phone" required>
                                <label for="phone">Phone</label>
                            </div>
                            <div class="input-field col s12">
                                <input id="password" type="password" name="password" required>
                                <label for="password">Password</label>
                            </div>

                            <div class="input-field col s12">
                                <select class="icons" id="desig" name="desig" onchange="toggleForm()">
                                    <option value="Patient" data-icon="./img/patient.png" class="left circle" selected>Patient
                                    </option>
                                    <option value="Doctor" data-icon="./img/doctor.png" class="left circle">Doctor
                                    </option>
                                </select>
                                <label>Who are you?</label>
                            </div>

                            <div id="optional_fields"></div>
                            <div class="input-field col s12">
                                <input class="btn col s12 c-gradient" type="submit"
                                       name="Submit" value="Register">
                            </div>
                        </form>
                    </div>
                </div>
                <div class="card-action center-align">
                    <p>already member? <a class="phr-link" onclick="toggle(1)">click here</a></p>
                </div>
            </div>

        </div>

    </div>

</div>

<?php
//including the nav bar
include_once("footer.php");
?>

