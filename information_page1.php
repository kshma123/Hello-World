<?php session_start();
// print_r($_SESSION); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-9">
	<title>Register Page</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	<style>
		body{
			background-image: url(images/img.png);
			background-size: cover;
			
		}
		h1{
			text-align: center;
			color: white;
		}
		div{
			color: white;
		}
		/*.container{
			width: 550px; 
			padding: 30px;
			
			}*/

		</style>
	</head>
	<body>
		<?php
		include("database.php");
		include 'navbar.php'; 
		$first_name = '';
		?>
		<form  method="POST" action="information_data.php">
			<div class="container"><br><br>
				<h1>Add Contacts Here</h1><br><br>
				<div class="row">
					<div class="form-group col">
						<label for="exampleInputEmail1">First name</label>
						<input type="text" name="first_name" value="<?= $first_name;?>"  class="form-control"  placeholder="first name" required>
					</div>
					<div class="form-group col">
						<label for="exampleInputEmail1">Last name</label>
						<input type="text" name="last_name" class="form-control" placeholder="last name" required>
					</div>
				</div>
				<div class="row">
					<div class="form-group col">
						<label>DOB</label>
						<input type="date" name="DOB" class="form-control" id="exampleInputPassword1" placeholder="dd/mm/yyyy" required>
					</div>
					<div class="form-group col">
						<label for="exampleInputEmail1">Gender</label>
						<select class="custom-select mr-sm-2" name="gender">
							<option>Male</option>
							<option>Female</option>
							<option>Other</option>
						</select>
					</div>
				</div>
				<div class="row">
					<div class="form-group col">
						<label for="exampleInputEmail1">Mobile</label>
						<input type="tel" name="mobile" maxlength="10"  class="form-control" id="exampleInputmobile1" aria-describedby="mobileHelp" placeholder=" mobile" pattern="^\d{10}$"  required>
						<small id="mobileHelp" class="form-text text-muted"></small>
					</div>
					<div class="form-group col">
						<label for="exampleInputEmail1">Contact type</label>
						<select class="custom-select mr-sm-2" name="contact_type">
							<option>Home</option>
							<option>Office</option>
						</select>
					</div>
				</div>
				<div class="row">
					<div class="form-group col">
						<label for="exampleInputEmail1">Email</label>
						<input type="text" name="email"  class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" required>
						<small id="emailHelp" class="form-text text-muted"></small><br>
						<input type="submit" name="submit" class="btn btn-success">
					</div>
				</div>
				<!-- <a  class="btn btn-primary" href="signinform.php">sign in</a> -->
			</div>
		</form><br><br>

		<!-- Table -->

		<?php    

	// $limit = isset($_POST["limit-records"]) ? $_POST["limit-records"] : 5;
	// $limit = 5;
	// $page = isset($_GET['page']) ? $_GET['page'] : 1;

	// $start = ($page - 1) * $limit;
		$select_query = 'SELECT * FROM contacts where users_id = ' . $_SESSION['loggedInId'];
	// $count_query = "SELECT count(id) AS id FROM contacts";
		$users = $conn->query($select_query);
		$count = 1;

		$id = $_GET['edit'];
	// $select_query .= "LIMIT $start, $limit";
	// $result = $conn->query($select_query);
	// $users = $result->fetch_all(MYSQLI_ASSOC);
	// $result1 = $conn->query($count_query);
	// $user_Count = $result1->fetch_all(MYSQLI_ASSOC);
	// $total = $user_Count[0]['id'];
	// $pages = ceil( $total / $limit );
	// $Previous = $page - 1;
	// $Next = $page + 1;
			?>
			<div class="container well" >
				<h1>Contact List</h1><br><br>
				<div class="row">
					<div style=" width: 100% ; overflow: auto;">
						<table style=" color: white" class="table table-striped table-bordered">
							<thead>
								<tr>
									<th>S.No</th>
									<th>Name</th>
									<th>email</th>
									<th>Gender</th>
									<th>Date of Birth</th>
									<th>Mobile</th>
									<th>Contact Type</th>
									<th>Action</th>

								</tr>
							</thead>
							<tbody>
								<!-- <?php $counter = $start; ?> -->
								<?php foreach($users as $user) :  ?>
									<tr>
										<td><?= ++$counter; ?></td>
										<td><?= $user['first_name']; ?> <?= $user['last_name']; ?></td>
										<td><?= $user['email']; ?></td>
										<td><?= $user['gender']; ?></td>
										<td><?= $user['DOB']; ?></td>
										<td><?= $user['mobile']; ?></td>
										<td><?= $user['contact_type']; ?></td>
										<td><a  class="btn btn-info" href="information_page.php?id=<?= $user['id'] ?>">Edit</a><a class="btn btn-danger btn-sm m-3" href="delete.php?id=<?= $user['id']; ?>">Delete</a></td>
									</tr>
								<?php endforeach; ?>
							</tbody>
						</table>

				<!-- <nav aria-label="Page navigation example">
					<ul class="pagination justify-content-center">
						<li class="page-item">
							<a class="page-link" href="<?php if($page <= 1){ echo '#'; }
							else { echo "?page=".($page - 1); } ?>">
							<span aria-hidden="true">&laquo;</span>
						</a>
					</li>
					<?php for($i = 1; $i<= $pages; $i++) : ?>
						<li class="page-item"><a  class="page-link" href="information_page.php?page=<?= $i  ?>"><?= $i; ?></a></li><br>
					<?php endfor; ?>
					<li class="page-item">
						<a class="page-link" href="<?php if($page >= $pages){ echo '#'; } else { echo "?page=".($page + 1); } ?>">
							<span aria-hidden="true">&raquo;</span>
						</a>
					</li>
				</ul>
			</nav> -->
		</div>


	</body>
	</html>