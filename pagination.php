	<?php    
require_once "database.php"; 


// $limit = isset($_POST["limit-records"]) ? $_POST["limit-records"] : 10;
$limit = 10;
$page = isset($_GET['page']) ? $_GET['page'] : 1;
$keyword = isset($_GET['keyword']) ? $_GET['keyword'] : "";
 
$start = ($page - 1) * $limit;
$select_query = "SELECT * FROM user ";
$count_query = "SELECT count(id) AS id FROM user";
if ($keyword)
{
	$select_query .= " WHERE firstname LIKE '%" . $keyword . "%' ";
	$count_query .= " WHERE firstname LIKE '%" . $keyword . "%' ";
}
$select_query .= "LIMIT $start, $limit";
$result = $conn->query($select_query);
$users = $result->fetch_all(MYSQLI_ASSOC);
$result1 = $conn->query($count_query);
$user_Count = $result1->fetch_all(MYSQLI_ASSOC);
$total = $user_Count[0]['id'];
$pages = ceil( $total / $limit );
// $Previous = $page - 1;
// $Next = $page + 1;


?>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

<script type="text/javascript" src="../library/js/jquery-3.2.1.min.js"></script>
<body >
	<div class="container well" >
		<div class="row">
			<div style=" width: 100% ; overflow: auto;">
				<table id="" class="table table-striped table-bordered">
					<thead>
						<tr>
							<th>Id</th>
							<th>firstname</th>
							<th>lastname</th>
							<th>email</th>
							<th>reg_date</th>
						</tr>
					</thead>
					<tbody>
						<?php $counter = $start; ?>
						<?php foreach($users as $user) :  ?>
							<tr>
								<td><?= ++$counter; ?></td>
								<td><?= $user['firstname']; ?></td>
								<td><?= $user['lastname']; ?></td>
								<td><?= $user['email']; ?></td>
								<td><?= $user['reg_date']; ?></td>
							</tr>
						<?php endforeach; ?>
					</tbody>
				</table>
				<nav aria-label="Page navigation example">
					<ul class="pagination justify-content-center">
						<li class="page-item">
							<a class="page-link" href="<?php if($page <= 1){ echo '#'; }
							else { echo "?page=".($page - 1); } ?>">
							<span aria-hidden="true">&laquo;</span>
						</a>
					</li>
					<?php for($i = 1; $i<= $pages; $i++) : ?>
						<li class="page-item"><a  class="page-link" href="dashboard.php?page=<?= $i . ($keyword != "" ? "&keyword=" . $keyword : ""); ?>"><?= $i; ?></a></li><br>
					<?php endfor; ?>
					<li class="page-item">
						<a class="page-link" href="<?php if($page >= $pages){ echo '#'; } else { echo "?page=".($page + 1) . ($keyword != "" ? "&keyword=" . $keyword : ""); } ?>">
							<span aria-hidden="true">&raquo;</span>
						</a>
					</li>
				</ul>
			</nav>
		</div>
	</body>


