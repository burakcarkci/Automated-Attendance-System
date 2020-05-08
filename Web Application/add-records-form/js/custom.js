
function changeImage() {
	document.getElementById("preview").src = "./images/icons/placeholder.png";
}

//<!--===============================================================================================-->//


$(document).ready(function() {
	$("#insert").click(function() {
		if (studentId.value == "") {
			window.alert("Please enter student id");
			studentId.focus();
			return false;
		} else if (email.value == "") {
			window.alert("Please enter an email");
			email.focus();
			return false;
		} else if (names.value == "") {
			window.alert("Please enter name");
			names.focus();
			return false;
		} else if (lastName.value == "") {
			window.alert("Please enter lastName");
			lastName.focus();
			return false;
		}

		$("#status").text("Inserting");
		var formData = new FormData(document.getElementById("insert_form"));
		$.ajax({
			type: "POST",
			crossDomain: true,
			cache: false,
			url: "insert.php",
			data: formData,
			cache: false,
			contentType: false,
			processData: false,
			success: function(data) {
				console.log(data);
				const response = JSON.parse(data);
				if (response.success) {
					$("#status").text("New Record Inserted Successfully!");
					$('#insert_form')[0].reset();
				} else {
					$("#status").text("Inserting Failed!");
				}
			},
			error: function(error) {
				console.log(error);
			}
		});
	});
});