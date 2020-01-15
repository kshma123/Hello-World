<!-- <?php
try {   
session_start();
// if(empty($_SESSION['login'])) {

//    // header('location: plan.php');
// }
require 'database.php';
if(isset($_POST['login'])) {

    $email = $_POST['email'];
    $pass = $_POST['password'];
    if(empty($email) || empty($password)) {
        $message = 'All field are required';
    } else {
        $query = $conn->prepare("SELECT email, password FROM users WHERE 
            email=? AND password=? ");
        $query->execute(array($email,$password));

        $row = $query->fetch(PDO::FETCH_BOTH);
        print_r($row);
        if($query->rowCount() > 0) {
          $_SESSION['email'] = $email;
          header('location: plan.php');
      } else {
          $message = "email/Password is wrong";  
      }


  }

}
}
catch (Exception $e) {
    
}
?>
 -->
 <script>
 function validateForm() {
  var x = document.forms["login"].value;
  if (x == "") {
    alert(" must be filled out");
    return false;
  }
}
</script>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <style>
        h1{
            text-align: center;
            padding: 50px;
        }
        .container{
            width: 650px; 
            padding: 80px;
        </style>
    </head>
    <body>

        <?php
        if(isset($message)) {
           echo $message;
        // print_r($message);
       }
       ?>
       <div class="container">
        <h1>login form</h1>
        <form action="#" method="post" name="form">
            <div class="form-group col">
             <input type="text" name="email" class="form-control" placeholder="email" required="">
         </div> 
         <div class="form-group col">
             <input type="password" name="password" class="form-control" placeholder="password" required=""><br>
             <button type="submit" onsubmit="return validateForm()" name="login" class="btn btn-success" >login</button>
             <button type="reset" name="reset" class="btn btn-success" >reset</button>
         </div>
     </form>
 </div>
</body>
</html>