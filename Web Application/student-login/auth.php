<?php
	header('Access-Control-Allow-Origin: *'); 
    $con = mysqli_connect("localhost","my_user","my_password","my_db") or die("connection error");
    $sid = $_POST['sid'];
    
	if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $login = mysqli_num_rows(mysqli_query($con, "SELECT * FROM `students` WHERE `sid`='$sid'"));
        if($login != 0)
            echo "success";
        else
            echo "error";
    }
    mysqli_close($con);
?>