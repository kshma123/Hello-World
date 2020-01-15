	<?php 
	// start session
	session_start();
	// print_r($_SESSION);
	
		//include database file.
		include("database.php");

		$first_name = $_POST['first_name'];
		$last_name = $_POST['last_name'];
		$DOB = $_POST['DOB'];
		$gender = $_POST['gender'];
		$contact_type = $_POST['contact_type'];
		$email = $_POST['email'];
		$mobile = $_POST['mobile'];

		$_POST['users_id'] = $_SESSION['loggedInId'];

		$users_id = $_POST['users_id'];

		 // Prepare a insert query.

		$sql = "INSERT INTO contacts (users_id, first_name,last_name , DOB, gender,contact_type, email ,mobile ) 
		VALUES ('$users_id','$first_name','$last_name','$DOB','$gender','$contact_type','$email','$mobile')";
		// print_r($sql);
			
		if ($conn->query($sql) === TRUE){
			$_SESSION['new_record']=TRUE;
			header('Location: ' . $_SERVER['HTTP_REFERER']);
		} 
		else {
			echo "Error: " . $sql . "<br>" . $conn->error;
		}

		?>
	</body>
	</html>