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
            <a class="brand-logo c-brand center"><?php echo $_SESSION['desig'] . '\'s Dashboard' ?></a>
            <ul id="nav-mobile" class="right">
                <li><a href="/phr-dev">Logout</a></li>
            </ul>
            <?php
            if ($_SESSION['desig'] == 'Patient') {
                ?>
                <ul id="nav-mobile" class="right">
                    <li><a href="./pat_profile.php">Profile</a></li>
                </ul>
                <?php
            }else {
                ?>
                <ul id="nav-mobile" class="right">
                    <li><a href="./doc_profile.php">Profile</a></li>
                </ul>
                <?php
            }
            ?>
            <ul id="nav-mobile" class="right">
                <li><a href="pass_edit.php">Account</a></li>
            </ul>
        </div>
    </div>
</nav>