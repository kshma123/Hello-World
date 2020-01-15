<!-- <?php 
	session_start();
 ?> -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark" style="padding: 0px";>

	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	</button>

	<div class="collapse navbar-collapse" id="navbarSupportedContent">
		<ul class="navbar-nav mr-auto">
			<!-- <li class="nav-item active">
				<a class="nav-link" href="information_page.php">Contacts<span class="sr-only">(current)</span></a>
			</li> -->
			<!-- <li class="nav-item active">
				<a class="nav-link" href="/post_site/bootstrapform.php">Form</a>
			</li> -->
			<li class="nav-item active dropdown">
				
				<?php

				if (isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'])

					{?>
						<div class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							<img src="images/user1.png" width="40" height="40">
							<?php 

							if (isset($_SESSION['userdata'])) : ?>
								<i style="color: white;"><?php echo ucfirst($_SESSION['userdata']); ?></i> 
							<?php endif; ?>
								</div>
								<!-- //Redirect to login -->
								<div class="dropdown-menu" aria-labelledby="navbarDropdown">
									<a class="dropdown-item " style="color: red;" href="logout.php">logout</a>
									<a class="dropdown-item" href="signup_page.php">Signup</a>
									<div class="dropdown-divider"></div>
									<a class="dropdown-item" href="#">About</a>
								</div>
							</li>
						<?php } else{ ?>

							<a class="nav-link " href="login_page.php">login</a>
						<?php  }?>
					</ul>
					<form class="form-inline my-2 my-lg-0">
						<input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
						<button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
					</form>
				</div>
			</nav>
