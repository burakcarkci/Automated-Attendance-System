<?php
#Starting session and checking if id exist
#session_start();
#$aid = $_SESSION['aid'];
#if(!$aid){
#header('Location: /');
#exit;
#}
?>

    <!DOCTYPE html>
    <html lang="en">

    <head>

        <title>Add New Records</title>

		<!--===============================================================================================-->
        <meta charset="UTF-8" />
		<!--===============================================================================================-->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!--===============================================================================================-->
        <link rel="icon" type="image/png" href="images/icons/favicon.ico" />
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="vendor/perfect-scrollbar/perfect-scrollbar.css">
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="css/util.css">
		<!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="css/main.css">
		<!--===============================================================================================-->
		<link rel="stylesheet" type="text/css" href="css/custom.css">
        <!--===============================================================================================-->
		

    </head>

    <body>

        <div class="limiter">
            <div class="container-table100">
                <div class="wrap-table100">
                    <div class="table100">
                        <h2 class="header">Add New Record</h2>
                        <div class="burak">

                            <form id="insert_form" enctype="multipart/form-data">

                                <div>

                                    <img class="image_preview" id="preview" width="150px" height="150px" src="../add-records-form/images/icons/placeholder.png" />

                                    <label class="btn btn-primary" style="display:block!important;">
                                        <i class="fa fa-image"></i> Select Student's Image
                                        <input type="file" style="display: none;" onchange="document.getElementById('preview').src=window.URL.createObjectURL(this.files[0])" name="upload_file">
                                    </label>

                                </div>

                                <label>Enter Student ID</label>
                                <input type="text" name="studentId" id="studentId" placeholder="e.g Z23345038" class="form-control" />
                                <br />
                                <label>Enter Student Email</label>
                                <input type="email" name="email" id="email" placeholder="e.g mjenkins2020@fau.edu" class="form-control" />
                                <br />
                                <label>Enter Student Name</label>
                                <input type="text" name="names" id="names" placeholder="e.g Jessica" class="form-control" />
                                <br />
                                <label>Enter Student Last Name</label>
                                <input type="text" name="lastName" id="lastName" placeholder="e.g Patrushka" class="form-control" />
                                <br />
                                <button type="button" onClick="changeImage()" id="insert" class="btn btn-success">Submit</button>
                                <button type="button" style="margin:auto;"> <a style="color: white;" href="../attendance-records/student-records.php" target="">View Records</a></button>
								<button type="button" style="background-color: #a20808;"> <a style="color: white;" href="/logout.php" target="">Logout</a></button>
                                <p class="container-login100-form-btn p-t-25" style="margin-top: -13px; color: white;" id="status"></p>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>

		
        <!--===============================================================================================-->
        <script src="vendor/jquery/jquery-3.2.1.min.js"></script>
		<!--===============================================================================================-->
		<script src="js/custom.js"></script>
		<!--===============================================================================================-->
		<script src="vendor/bootstrap/js/popper.js"></script>
		<!--===============================================================================================-->
        <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
        <!--===============================================================================================-->
        <script src="vendor/select2/select2.min.js"></script>
        <!--===============================================================================================-->
        <script src="js/main.js"></script>
        <!--===============================================================================================-->

    </body>

    </html>