$(document).ready(function() {
            var url = "./auth.php";
		
            $("#retrieveButton").click(function() {
                $("#status").text("Authenticating...");
                $.ajax({
                    type: "POST",
                    crossDomain: true,
                    cache: false,
                    url: url,
                    data: $("#myForm").serialize(),
                    success: function(data) {
                        if (data == "success") {
                            $("#status").text("Login Success..!");
                            localStorage.loginstatus = "true";
                            window.location.href = "./student-table/student-table.php?sid=" + $("#sid").val();
                        } else if (data == "error") {
                            $("#status").text("Login Failed..!");
                        }
                    },
                    error: function(error) {
                        console.log(error);
                    }
                });
            });
        });