 <?php session_start(); ?>
 <!DOCTYPE html>
 <html lang="en">
 <head>
 	<meta charset="UTF-8">
 	<title>web page</title>
 	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
 	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
 	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
 	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">

 	</script>
 	
 	<style>
 		h1{
 			text-align: center;
 		}
 	</style>
 </head>
 <body>
 	<?php  
 	include('navbar.php');
 	include('auth_guard.php');

 	?>
 	<br><br>
 	<div class="container">
 		<?php if 
 		($_SERVER['REQUEST_METHOD']==='POST'): ?>
 		<img src="<?= $file_ultimate_name ?>">
 	<?php endif; ?>
 	<form method="post" action="postdata.php" enctype="multipart/form-data">
 		<div class="container">
 			<h1 >Contact Add Form</h1>
 			<div class="row">
 				<div class="col">
 					<label for="exampleInputEmail1">First name</label>
 					<input type="text" name="first_name" class="form-control" placeholder="First name" required>
 				</div>

 				<div class="col">
 					<label for="exampleInputEmail1">Last name</label>
 					<input type="text" name="last_name" class="form-control" placeholder="Last name" required>
 				</div>
 			</div>
 			<div class="row">
 				<div class="col">
 					<label for="exampleInputEmail1">Date of Birth</label>
 					<input type="date" name="dob" class="form-control" placeholder="Date of Birth" required>
 				</div>

 				<div class="col">
 					<label for="exampleInputEmail1">Gender</label>
 					<select class="custom-select mr-sm-2" id="inlineFormCustomSelect" name="gender">
 						<option >Female</option>
 						<option >Male</option>
 					</select>
 				</div>
 			</div>
 			<div class="row">
 				<div class="col">
 					<label for="exampleInputEmail1">Mobile</label>
 					<input type="varchar" name="mobile" class="form-control" placeholder="Mobile Number" required>
 				</div>
 				<div class="col">
 					<label for="exampleInputEmail1">Contact Type</label>
 					<select class="custom-select mr-sm-2" id="inlineFormCustomSelect" name="contact_type">
 						<input type="radio" name="gender" value="male"> Male<br>
 						<input type="radio" name="gender" value="female"> Female<br>
 						<input type="radio" name="gender" value="other"> Other<br> 
 					</select>
 				</div>
 			</div>

 			<div class="row">
 				<div class="form-group col">
 					<label for="exampleInputEmail1">Email address</label>
 					<input type="text" name="email"  class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" required>
 					<small id="emailHelp" class="form-text text-muted"></small>
 				</div>
 			</div>
 			<div class="form-group">
 				<label for="exampleFormControlFile1">Image</label>
 				<input type="file" name="file" class="form-control-file" required>
 			</div>
 			<button type="submit" class="btn btn-primary btn-sm">Submit</button>
 			<button type="Reset" class="btn btn-secondary btn-sm">Reset</button>
 		</div>
 	</form>

 </div>
 <div class="container">
 	<div class="row">
 		<?php
 		include("./include/database.php");
 		$sql = 'SELECT * FROM contacts where users_id ='. $_SESSION['loggedInId'];
 		$result = $conn->query($sql);
 		$count = 1;
 		foreach ($result as $row):?>	
 			<?php  $count++;
 			?>
 			<div class="col-md-4">
 				<div class="card m-3">
 					<img src="<?= $row['upload']?>"  class="card-img-top" alt="...">

 					<div class="card-body">
 						<h5 class="card-title">Name: <?= $row['first_name']?> <?= $row['last_name']?></h5>
 						<p class="card-text">Mobile: <?= $row['mobile'] ?></p>
 						<p class="card-text">Email: <?= $row['email'] ?></p>
 						<p class="card-text">Date of Birth: <?= $row['dob'] ?></p>
 						<p class="card-text">Gender: <?= $row['gender'] ?></p>
 						
 						<a  class="btn btn-primary" href="webpage.php?id=<?= $row['id'] ?>">Edit</a>
 						<a class="btn btn-danger btn-sm m-3" href="delete.php?id=<?= $row['id']; ?>">Delete</a>
 					</div>
 				</div>
 			</div>
 		<?php endforeach ?>
 	</div>
 </div>
</body>
</html>