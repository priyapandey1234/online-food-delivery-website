<?php 
   $login = false;
   $showError = false;
if($_SERVER["REQUEST_METHOD"] == "POST")
{
 
  include 'partial/_dbconnect.php';
  $username = $_POST["username"];
  $password = $_POST["password"];
  
  
      
     // $sql = "Select * from user where username='$username' AND password= '$password'";
      $sql = "Select * from user where username='$username'";
      $result = mysqli_query($conn, $sql);
      $num = mysqli_num_rows($result);
      
      if ($num ==1){
        while($row=mysqli_fetch_assoc($result)){
          if(password_verify($password, $row['password'])){
            $login=true;
              session_start();
              $_SESSION['loggedin'] = true;
              $_SESSION['username'] = $username;
              header("location: http://localhost/food/foodlogin.php");
          }
           else {
    $showError = "invalid Credentials";
  }
        }
  
      }
  
  else {
    $showError = "invalid Credentials";
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
    <div class="center">
      <h1>Login</h1>
      <form method="post">
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
        <div class="pass">Forgot Password?</div>
        <input type="submit" value="Login">
        <div class="signup_link">
          Not a member? <a href="http://localhost/food/login/signup.php">Signup</a>
        </div>
      </form>
    </div>

  </body>
</html>
