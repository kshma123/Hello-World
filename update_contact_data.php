 <?php 
 session_start();

 ?>
 <!DOCTYPE html>
 <html lang="en">
 <head>
 	<meta charset="UTF-8">
 	<title>Document</title>
 </head>
 <body>
 	<?php 
 	include("./include/database.php");
	// include("post_table.php");
 	
 	if ($_SERVER['REQUEST_METHOD'] === 'POST')
 	{
 		$upload_path = '../upload/';

 		$file_original_name = $_FILES['file']['name'];
 		echo "Orignal Name: " . $file_original_name . "<br>";

 		$file_temp_name = $_FILES['file']['tmp_name'];
 		echo "Temp Name: " .  $file_temp_name . "<br>";

 		$file_ultimate_name = $upload_path . basename($file_original_name);
 		echo "Ultimate Name: " .  $file_ultimate_name . "<br>";

 		move_uploaded_file($file_temp_name, $file_ultimate_name);
 	}
 	  // print_r($_SESSION);
 	

   $id = $_POST['id'];
 	$first_name = $_POST['first_name'];
 	$last_name = $_POST['last_name'];
 	$dob = $_POST['dob'];
 	$gender = $_POST['gender'];
 	$contact_type = $_POST['contact_type'];
 	$email = $_POST['email'];
 	$mobile = $_POST['mobile'];
 	$_POST['users_id'] =$_SESSION['loggedInId'];		
	 $users_id = $_POST['users_id'];

 	$sql = "UPDATE contacts SET users_id='$users_id', first_name='$first_name', last_name='$last_name', dob='$dob', gender='$gender', contact_type='$contact_type',  mobile='$mobile', email='$email', upload='$file_ultimate_name' WHERE id = $id";
 	
    
     print_r($sql);
 	$run = mysqli_query($conn,$sql);
 	print_r($run);
 	if ($run == TRUE){
 		header('Location: Home_page.php');
 	}
 	else {
 	 header('Location: Home_page1.php');
 	}

 	?>
 </body>
 </html>