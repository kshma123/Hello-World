 <?php 
include("database.php"); 
if(isset($_GET['id']) & !empty($_GET['id'])){
	$id = $_GET['id'];
 
	$delsql="DELETE FROM contacts WHERE id=$id";
	if(mysqli_query($conn, $delsql)){
		header('Location: ' . $_SERVER['HTTP_REFERER']);
	}
}else{
	header('Location: ' . $_SERVER['HTTP_REFERER']);
}
?>