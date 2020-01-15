  <?php session_start(); ?>

  <?php
  include("database.php");

  if (isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'])
  {
  	header('Location: information_page.php');
  }

	// If method is post then continue
  if($_SERVER['REQUEST_METHOD'] == 'POST'){
    
  	$email = $_POST['email'];
  	$password = $_POST['password'];

    // print_r($_POST);
		// Make sure email and password is not empty
  	if ($email != "" && $password != ""){
  		

  		$sql = "SELECT * FROM users WHERE email= '" . $email ."' LIMIT 1";

  		$result = $conn->query($sql);

  		foreach ($result as $row) {
  			$current_encrypted_password = $row['password'];
  		}
   
  		if (password_verify ($password, $current_encrypted_password))
  		{
				// echo "Login this user";

				// Set a variable in session for login state

  			$_SESSION['loggedIn'] = true;
  			$_SESSION['loggedInId'] = $row['id'] ;

  			$_SESSION['userdata'] = $row['name'];
  			header('Location: information_page.php');
                // print_r($row['name']);
                // print_r($row['id']);
  		}
  		else {
       echo "Invalid credentials";
  			// header('Location: ' . $_SERVER['HTTP_REFERER']);
     }

   }
 }
 ?>
