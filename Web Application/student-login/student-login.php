<!DOCTYPE html>
<html lang="en">

<head>

    <title>Student Login</title>
	
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
    <link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="css/util.css">
	<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <!--===============================================================================================-->
	
	
</head>

<body>

    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100 p-l-50 p-r-50 p-t-77 p-b-30">
				
                <form id="myForm" class="login100-form validate-form">
                    <span class="login100-form-title p-b-55">
						Student Login
					</span>

                    <div class="wrap-input100 validate-input m-b-16">
                        <input id="sid" class="input100" type="text" name="sid" placeholder="Enter Your Z Number">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
							<span class="lnr lnr-user"></span>
                        </span>
                    </div>

                    <div class="container-login100-form-btn p-t-11" style="margin-bottom: 30px;">
                        <button id="retrieveButton" type="button" name="submit" class="login100-form-btn" style="margin-bottom: 5px;">See My Record</button>
						<button type="button"  class="login100-form-btn"><a style="color: white; font-family: Raleway-Bold; font-size: 16px;" href="/" target="">Go Back</a></button>
                    </div>
                    <p class="container-login100-form-btn p-t-5" style="font-weight: 700; font-size: 15px;" id="status"></p>

                </form>
				
				
            </div>
        </div>
    </div>
	
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
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
	<script src="js/custom.js"></script>
	<!--===============================================================================================-->

</body>

</html>





