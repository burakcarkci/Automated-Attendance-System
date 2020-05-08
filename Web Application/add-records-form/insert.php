<?php
	header('Access-Control-Allow-Origin: *');

	$message = "";
	$uploaded_file_path = "";
	$success = false;
	
	
	error_reporting(-1);
	include('./push-image-to-s3/functions.php');
	if(isset($_FILES["upload_file"])) {
		$file_name = $_FILES['upload_file']['name'];
		$file_size = $_FILES['upload_file']['size'];
		$tmp_file = $_FILES['upload_file']['tmp_name'];
		$valid_file_formats = array("jpg", "png", "gif", "bmp","jpeg","PNG","JPG","JPEG","GIF","BMP");
		$file_extension = getFileExtension($file_name);
		if($file_name) {
			if(in_array($file_extension,$valid_file_formats)) { 
				if($file_size < (5120*5120)) {	
				require_once('./push-image-to-s3/S3.php');
				require_once('./push-image-to-s3/config.php');				
					$new_image_name = time().".".$file_extension;
					if($s3->putObjectFile($tmp_file, $bucket, $new_image_name, S3::ACL_PUBLIC_READ)) {
						$message = "File Uploaded Successfully to Amazon S3.";	
						$success = true;
						$uploaded_file_path='https://'.$bucket.'.s3.amazonaws.com/'.$new_image_name;
					} else { 
						$message = "File upload to amazon s3 failed!. Please try again.";				
					} 	
				} else {
						$message = "Maximum allowed image upload size is 2 MB.";
					}
				} else {
					$message = "This file format is not allowed, please upload only image file.";
				}
			} else {
				$message = "Please select image file to upload.";
		}
	}
	
	if(!$success){
		echo json_encode(array("message" => $message, "success" => $success, "filePath" => $uploaded_file_path));
		exit();
	}
	
	
	$connect = mysqli_connect("localhost","my_user","my_password","my_db") or die("connection error");

	if(isset($_POST['studentId'])){
    $studentId = $_POST['studentId'];
	}
	if(isset($_POST['email'])){
    $email = $_POST['email'];
	}
	if(isset($_POST['names'])){
    $name = $_POST['names'];
	}
	if(isset($_POST['lastName'])){
    $lastName = $_POST['lastName'];
	}

	$sql = "INSERT INTO students (sid, s_email, s_name, s_lname, s_absent, s_present, student_images) VALUES('$studentId', '$email', '$name', '$lastName', 0, 0, '$uploaded_file_path')";
	
	if (mysqli_query($connect, $sql)) {
		$message = "New record created successfully";
		$success = true;
	} else {
		//"Error: " . $sql . "<br>" . mysqli_error($connect);
		$message =  "Error happened while inserting!";
		$success = false;
	}

    mysqli_close($connect);
	echo json_encode(array("message" => $message, "success" => $success, "filePath" => $uploaded_file_path));

?>



