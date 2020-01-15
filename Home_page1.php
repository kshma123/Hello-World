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
 	include("./include/database.php");

 
 	$query = 'SELECT * FROM contacts where id ='. $_GET['id']; 
 	$result = mysqli_query($conn, $query);
		$row=mysqli_fetch_assoc($result);
	
 	?>

 	<br><br>
 	<div class="container">
 		<?php if 
 		($_SERVER['REQUEST_METHOD']==='POST'): ?>
 		<img src="<?= $file_ultimate_name ?>">
 	<?php endif; ?>
 	<form method="post" action="update_contact_data.php" enctype="multipart/form-data">
 		<div class="container">
 			<h1 >Add Contacts</h1>
 			<input type="hidden"  name="id" value="<?= "$row[id]" ?>">
 			<div class="row">
 				<div class="col">
 					<label for="exampleInputEmail1">First name</label>
 					<input type="text" name="first_name" class="form-control" value="<?= "$row[first_name]" ?>" placeholder="First name" required>
 				</div>

 				<div class="col">
 					<label for="exampleInputEmail1">Last name</label>
 					<input type="text" name="last_name" class="form-control" placeholder="Last name" value="<?= "$row[last_name]" ?>"required>
 				</div>
 			</div>
 			<div class="row">
 				<div class="col">
 					<label for="exampleInputEmail1">Date of Birth</label>
 					<input type="date" name="dob" class="form-control" placeholder="Date of Birth" value="<?= "$row[dob]" ?>"required>
 				</div>

 				<div class="col">
 					<label for="exampleInputEmail1">Gender</label>
 					<select class="custom-select mr-sm-2" id="inlineFormCustomSelect" name="gender" required>
 						<option disabled selected value selected >Gender</option>
 						<option value="Female"<?= ($row['gender'] == "Female") ? 'selected' : ''; ?> >Female</option>
 						<option value="Male" <?= ($row['gender'] == "Male") ? 'selected' : ''; ?>>Male</option>
 					</select>
 				</div>
 			</div>
 			<div class="row">
 				<div class="col">
 					<label for="exampleInputEmail1">Mobile</label>
 					<input type="tel" name="mobile" class="form-control" placeholder="Mobile Number"pattern="^\d{10}$" value="<?= "$row[mobile]" ?>" required>
 				</div>
 				<div class="col">
 					<label for="exampleInputEmail1">Contact Type</label>
 					<select class="custom-select mr-sm-2" id="inlineFormCustomSelect" name="contact_type" required>
 						<option disabled selected value selected>Contact Type</option>
 						<option value="Home"<?= ($row['contact_type'] == "Home") ? 'selected' : ''; ?> >Home</option>
 						<option value="Office" <?= ($row['contact_type'] == "Office") ? 'selected' : ''; ?>>Office</option>
 					</select>
 				</div>
 			</div>

 			<div class="row">
 				<div class="form-group col">
 					<label for="exampleInputEmail1">Email address</label>
 					<input type="text" name="email"  class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" value="<?= "$row[email]" ?>" required>
 					<small id="emailHelp" class="form-text text-muted"></small>
 				</div>
 			</div>
 			<div class="form-group">
 				<label for="exampleFormControlFile1">Image</label>
 				<input type="file" name="file" class="form-control-file" value="<?= "$row[file]" ?>">
 			</div>
 			<button type="update" name="update" class="btn btn-primary btn-sm">Submit</button>
 			<a  class="btn btn-secondary btn-sm" href="Home_page.php">Reset</a>
 		</div>
 	</form>

 </div>
 <div class="container">
 	<div class="row">
 		<?php

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
                        <p class="card-text">Contact Type: <?= $row['contact_type'] ?></p>
 						<a  class="btn btn-primary" href="Home_page.php?id=<?= $row['id'] ?>">Edit</a>
 						<a class="btn btn-danger btn-sm m-3" href="delete.php?id=<?= $row['id']; ?>" onclick= "return deleletconfig(true)";>Delete</a>
 					</div>
 				</div>
 			</div>
 		<?php endforeach ?>
 	</div>
 </div>
 <script>
    function deleletconfig() {
        var del=confirm("Are you sure you want to delete this record?");
        if (del==true){
            alert ("record deleted")
        } else {
            alert("Record Not Deleted")
        }
        return del;
    }
</script>
</body>
</html>