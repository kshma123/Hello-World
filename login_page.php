
<!DOCTYPE html>
<html lang="en">
<head>
	<script type = "text/javascript">
		function submitForm() {
			
			var retVal = confirm("Do you really want to submit this form ?");
			if( retVal == true ) {
				return true;
			}
			else {
				document.write ("User does not want to submit this form!");
				return false;
			}
		} 
	</script>
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
		h1{
			margin-top: 90px;
			text-align: center;
			color: white;
			
			/*margin-top: 0%;*/
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
	<form class="container" method="post" onsubmit="return submitForm()" action="login_data.php">
		<h1>Login</h1>
		<div class="form-group">
			<label for="exampleInputEmail1">Email</label>
			<input type="email" name="email"  class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="email" required>
			<small id="emailHelp" class="form-text text-muted"></small>
		</div>
		<div class="form-group">
			<label for="password">Password</label>
			<input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password" required>
			<p style="color: white;">Don't have an account? <a href="signup_page.php">sign up now. </a></p>
			<div class="form-group row" style="text-align: center; ">
				<div class="form-group col-md-12">
					<button  type="submit"  name="login" value="submit" class="btn btn-success" >submit</button>
				</div>
			</div>
		</div>
	</form>
</body>
</html>