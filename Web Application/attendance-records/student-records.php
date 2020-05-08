<?php

$con = mysqli_connect("localhost","my_user","my_password","my_db") or die("connection error");

$result = mysqli_query($con, "SELECT * FROM students");

mysqli_close($con);

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
	
        <title>Attendance Records</title>
		
		<!--===============================================================================================-->
        <meta charset="UTF-8">
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
						<h4 align="center" style="visibility: hidden;" class="mobileViewHeader">Attendance Records</h4>
                        <table>
                            <thead>

                                <tr class="table100-head">
                                    <th colspan="7">
                                        <h2 align="center">Attendance Records</h2>
                                    </th>
                                </tr>

                                <tr class="table100-head">
									<th class="column1">Student Images</th>
                                    <th class="column2">Student ID</th>
                                    <th class="column3">E-mail</th>
                                    <th class="column4">Name</th>
                                    <th class="column5">Last Name</th>
                                    <th class="column6">Absent</th>
                                    <th class="column7">Present</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php
							while($rows=mysqli_fetch_assoc($result))
							{
						?>
                                    <tr>
										<td align="center" class="column1" style="padding-left: 0px!important;">
										<img width="170px" height="190px" style="margin: 5px auto 5px auto; border-radius: 3px;" src='<?php echo $rows['student_images'] ?> '											
                                        </td>
                                        <td align="center" class="column2">
                                            <?php echo $rows['sid']; ?>
                                        </td>
                                        <td align="center" class="column3">
                                            <?php echo $rows['s_email']; ?>
                                        </td>
                                        <td align="center" class="column4">
                                            <?php echo $rows['s_name']; ?>
                                        </td>
                                        <td align="center" class="column5">
                                            <?php echo $rows['s_lname']; ?>
                                        </td>
                                        <td align="center" class="column6">
                                            <?php echo $rows['s_absent']; ?>
                                        </td>
                                        <td align="center" class="column7">
                                            <?php echo $rows['s_present']; ?>
                                        </td>
                                    </tr>
                                    <?php
							}
						?>

                            </tbody>
                        </table>

                        <button type="button" style="margin-bottom: auto;"> <a style="color: white;" href="../add-records-form/add-records.php" target="">Add New Student</a></button>
						
						<button type="button" style="background-color: #a20808;"> <a style="color: white;" href="/logout.php" target="">Logout</a></button>

                    </div>
                </div>
            </div>
        </div>

        <!--===============================================================================================-->
        <script src="vendor/jquery/jquery-3.2.1.min.js"></script>
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