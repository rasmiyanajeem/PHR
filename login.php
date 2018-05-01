<html>
<head>
	<title>Add Data</title>
</head>

<body>
<?php
//including the database connection file
include_once("config.php");

if(isset($_POST['Submit'])) {	
	
	$username = mysqli_real_escape_string($mysqli, $_POST['username']);
	$passwd = mysqli_real_escape_string($mysqli, $_POST['password']);

		// if all the fields are filled (not empty) 
		$query = "SELECT * FROM `reg_users` WHERE username LIKE '".$username."' AND password LIKE '".$passwd."'";
		//insert data to database	
		$result = mysqli_query($mysqli, $query);

		$res = mysqli_fetch_array($result);


		if(mysqli_num_rows($result) > 0){
//		    session started
            session_start();
            $_SESSION["id"] = $res["id"];
            $_SESSION["username"] = $res["username"];
            $_SESSION["desig"] = $res["desig"];

			if($res["desig"]== "Doctor"){
                header('Location: doc_dash.php');
			}
			else if($res["desig"]== "Patient"){
                header('Location: pat_dash.php');
			}

			// header('Location: dash.php');
		}
		else{
			header('Location: index.php?msg="invalid username or password"');
		}
		
		//display success message
}
?>
</body>
</html>
