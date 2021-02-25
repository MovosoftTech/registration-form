<?php include('server.php');?>
<!DOCTYPE html>
<html>
<head>
    <title> Responsive Registration Form in PHP</title>
     <link rel="stylesheet" type="text/css" href="style.css">
</head>

  <body>  
    <div class="header">
        <h2>Register Users</h2>
    </div>
     
     <form method="POST" action="register.php">
      <?php include('errors.php');?>
      <div class="input-group">
        <label>Username:</label>
         <input type="text" name="username" value="" >
      </div> 

      <div class="input-group">
      	<label>Email:</label>
       <input type="text" name="email" value="" >
      </div>

      <div class="input-group">
       <label>Password:</label>
       <input type="password" name="password_1">
      </div>

      <div class="input-group">
       <label> Confirm Password:</label>
       <input type="password" name="password_2">
      </div>

      <div class="input-group">
       <button type="submit" class="btn" name="reg_user">Register</button>
      </div>
      <p>
         Already Registered? <a href="login.php">Sign In</a>
      </p>
     </form>
  </body>
   
</html>