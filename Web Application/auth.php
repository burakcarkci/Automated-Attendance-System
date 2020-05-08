<?php

	
	
	header("Access-Control-Allow-Origin: *");
    $con = mysqli_connect("localhost","my_user","my_password","my_db") or die("connection error");
    $email = $_POST['email'];
    $password = $_POST['password'];
	
	if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $login = mysqli_query($con, "SELECT aid, email, password FROM `adm` WHERE `email`='$email' AND `password`='$password'");
		
		$row = mysqli_fetch_assoc($login);
		$num = mysqli_num_rows($login);
		
        if($num != 0){
            echo "success";
			#Starting session and fetching userId from the database
			#session_start();
			#$aid = $row["aid"];
			#$_SESSION["aid"] = $aid;
			#print_r($_SESSION);
		}
        else{
            echo "error";
    
		}
	}
	
	
    mysqli_close($con);

?>