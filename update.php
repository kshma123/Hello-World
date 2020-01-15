<?php 
session_start();
include 'database.php';
$select_query = "SELECT * FROM contacts WHERE id = ".$_GET['id'];
$result = mysqli_query($conn, $select_query);
$row=mysqli_fetch_assoc($result);

$id = $row['id'];
$first_name = $row['first_name'];
$last_name = $row['last_name'];
$DOB = $row['DOB'];
$gender = $row['gender'];	
$mobile = $row['mobile'];	
$email = $row['email'];	
$contact_type = $row['contact_type'];
 // print_r($row);	
?>
<script>
	function updateData() {
			
			var retVal = confirm("Do you really want to update?");
			if( retVal == true ) {
				alert("updated successfully.");
				return true;
			}
			else {
				// document.write ("User doesn't want to delete!");
				alert("User doesn't want to update data.");
				return false;
			}
		} 
</script>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
	<meta name="generator" content="Jekyll v3.8.5">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	<style>
		body{
			background-image: url(images/img.png);
			background-position: cover;

		
		}
		.container{
			color: white;
			font-size: 20px;
			width: 650px; 
			padding: 80px;
		}
		h1{
			text-align: center;
			color: white;
			padding-bottom: 10px;
		}
	</style>
</head>
<body>
	<div class="container">
	<form  method="POST" onsubmit="return updateData()" action="update_data.php">
		<h1>!! Update data here !!</h1>
		<div class="form-group">
			<label>First name</label>
			<input type="hidden"  name="id" value="<?= $row['id'] ?>">
			<input type="text" name="first_name" value="<?= $row['first_name']?>" class="form-control">
			<small id="emailHelp" class="form-text text-muted"></small>
		</div>
		<div class="form-group">
			<label>Last name</label>
			<input type="text" name="last_name"  value="<?= $row['last_name']?>" class="form-control">
			<small id="emailHelp" class="form-text text-muted"></small>
		</div>
		<div class="form-group">
			<label>DOB</label>
			<input type="date" name="DOB" value="<?= $row['DOB']?>"  class="form-control">
			<small id="emailHelp" class="form-text text-muted"></small>
		</div>
		<div class="form-group">
			<label>Gender</label>
			<input type="text" name="gender" value="<?= $row['gender']?>"  class="form-control">
			<small id="emailHelp" class="form-text text-muted"></small>
		</div>
		<div class="form-group">
			<label>Mobile</label>
			<input type="number" name="mobile" value="<?= $row['mobile']?>"  class="form-control">
			<small id="emailHelp" class="form-text text-muted"></small>
		</div>
		<div class="form-group">
			<label>email</label>
			<input type="text" name="email" value="<?= $row['email']?>"  class="form-control">
			<small id="emailHelp" class="form-text text-muted"></small>
		</div>
		<div class="form-group">
			<label>Contact Type</label>
			<input type="text" name="contact_type" value="<?= $row['contact_type'] ?>" class="form-control"><br>
			<div class="form-group row" style="text-align: center; ">
				<div class="form-group col-md-12">
					<button  type="submit"   name="submit" value="submit" class="btn btn-success" href="update_data.php?id=<?= $row['id'];?>">update</button>
				</div>
			</div>
		</div>
	</form>
	</div>
</body>
</html>