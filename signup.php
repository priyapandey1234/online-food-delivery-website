<?php include 'partial/_dbconnect.php'; ?>
<?php 
   $showAlert = false;
   $showError = false;

if($_SERVER["REQUEST_METHOD"] == "POST"){
  
    $username = $_POST["username"];
    $password = $_POST["password"];
    $cpassword = $_POST["cpassword"];
    // $exists=false;
  

  //check whether this username
$existSql = "SELECT * FROM `user` WHERE username = '$username'";
    $result = mysqli_query($conn, $existSql);
    $numExistRows = mysqli_num_rows($result);

if($numExistRows > 0){
 // $exists = true;
   $showError = " username Already Exits";
}
else {
  //$exists = false;


  if(($password == $cpassword)){
    $hash = password_hash($password, PASSWORD_DEFAULT);
      
      $sql = "INSERT INTO `user` (`username`, `password`) VALUES ('$username', '$hash')";
      
      $result = mysqli_query($conn, $sql);
      if ($result){
        $showAlert = true;
      }
  }
  else {
    $showError = "Password do not match ";
  }
}
}

?>


<!DOCTYPE html>
<!-- Coding By CodingNepal - youtube.com/codingnepal -->
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Animated Login Form | CodingNepal</title>
    <link rel="stylesheet" href="style.css">
  </head>
  <body>
    
     <?php require 'nav.php'; ?>

     <?php
        if($showAlert){
        echo '
       <div class="alert alert-success alert-dismissible fade show" role="alert">
      <strong>Success!</strong> Your account is now created and you can login.
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';}
      if($showError){
        echo '
       <div class="alert alert-danger alert-dismissible fade show" role="alert">
      <strong>Error!</strong>'.$showError.'
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';}
    ?>
    
    <div class="center">
      <h1>Sign Up</h1>
      <form method="post" action="http://localhost/food/login/signup.php">
        <div class="txt_field">
          <input type="text" required name="username">
          <span></span>
          <label>Username</label>
        </div>
        <div class="txt_field">
          <input type="password" required name="password">
          <span></span>
          <label>Password</label>
        </div>
        <div class="txt_field">
          <input type="password" required name="cpassword">
          <span></span>
          <label>Confirm Password</label>
        </div>
        <div class="pass">Forgot Password?</div>
        <input type="submit" value="Login">
        <div class="signup_link">
          Not a member? <a href="http://localhost/food/login/login.php">Login</a>
        </div>
      </form>
    </div>

  </body>
</html>
