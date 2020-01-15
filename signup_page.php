 <?php 
session_start();
?>

<?php 

$errors = [];

include("database.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST'):

	$name = $_POST['name'];
	$mobile = $_POST['mobile'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	$password_repeat = $_POST['password_repeat'];

	if ($password !== $password_repeat)
	{
		$errors['password'] = "Password didn't match";
	}
	if (! filter_var($email, FILTER_VALIDATE_EMAIL)) {
		$errors['email'] = "Invalid Email Address";
	}
	if (count($errors)) {

	} else {
		$password = password_hash ($password, PASSWORD_DEFAULT);
		$sql = "INSERT INTO users (name , mobile , email , password ) 
		VALUES ('$name','$mobile','$email','$password')";
// echo $sql;
		if ($conn->query($sql) === TRUE){
			$_SESSION['new_record']=TRUE;
			header("Location: login_page.php");
		} 
		else {
			echo "Error: " . $sql . "<br>" . $conn->error;
		}

	}
endif; 
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-9">
	<title>Register Here</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	<style>
		body{
			background-image: url(images/image5.jpeg);
			background-size: cover;
			 /*overflow: hidden;*/
		}
		h1{
			text-align: center;
			color: white;
		}
		div{
			color: white;
		}
		.container{
			width: 650px; 
			padding: 80px;
		}
	</style>
</head>
<body>
	
	<div class="container">
		<form  method="POST">
			<?php if (count($errors)) : ?>
				<?php foreach ($errors as $error): ?>
					<div class="alert alert-danger alert-dismissible fade show" role="alert">
						<?= $error ?>
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
				<?php endforeach; ?>
			<?php endif; ?>

			<h1>Register Here</h1>
			
			<div class="form-group col">
				<label for="exampleInputEmail1">Name</label>
				<input type="text" name="name" class="form-control" placeholder="Name" required autofocus value="<?= isset($name) ? $name : ''?>">
			</div>

			<div class="form-group col">
				<label for="exampleInputEmail1">Mobile</label>
				<input maxlength="10" type="varchar" name="mobile" class="form-control" placeholder="Mobile Number" required  value="<?= isset($mobile) ? $mobile : ''?>">
				
			</div>

			<div class="form-group col">
				<label for="exampleInputEmail1">Email</label>
				<input type="text" name="email"  class=" form-control user<?= array_key_exists('email', $errors) ? ' is-invalid' : ''?>" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" required value="<?= isset($email) ? $email : ''?>">

				<?php if (array_key_exists('email', $errors)): ?>
					<div class="invalid-feedback">
						<?= $errors['email'] ?>
					</div>
				<?php endif; ?>	
			</div>
			
			<div class="form-group col">
				<label for="password">Password</label>
				<input type="password" name="password" class="form-control user<?= array_key_exists('password', $errors) ? ' is-invalid' : ''?>" id="exampleInputPassword1" placeholder="Password" required>
				<?php if (array_key_exists('password', $errors)): ?>
					<div class="invalid-feedback">
						<?= $errors['password'] ?>
					</div>
				<?php endif; ?>
			</div>
			<div class="form-group col">
				<label for="password_repeat"> Repeat Password</label>
				<input type="password" name="password_repeat" class="form-control" id="exampleInputPassword1" placeholder="Repeat Password" required><br>
				<input type="submit" name="submit" class="btn btn-success">
				 
				<!-- <input type="submit" name="submit" class="btn btn-success"> -->
				<a  class="btn btn-primary" href="login_page.php">login</a>
			</div>
		</div>
	</div>
</form>
</div>
</body>
</html>