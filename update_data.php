<?php 
include 'database.php';
if (isset($_POST['submit'])) {

$id = $_POST['id'];
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$DOB = $_POST['DOB'];
$gender = $_POST['gender'];	
$mobile = $_POST['mobile'];	
$email = $_POST['email'];	
$contact_type = $_POST['contact_type'];

$sql = "UPDATE contacts SET   first_name='$first_name',last_name='$last_name',DOB='$DOB',gender='$gender',
mobile='$mobile',email='$email',contact_type='$contact_type' WHERE id = $id";

$result = mysqli_query($conn,$sql);
 
// if (empty($rows[0]['2'])) {
//      $rows[0]['2'] = '***-**-***';
//  }
// print_r($result);
if ($result == TRUE){
	 // echo "updated successfully";
	 header('location: information_page.php');
}
else {
	echo "not updated";
}
}
?>