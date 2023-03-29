<?php include('server.php');?>
<!DOCTYPE html>
<html>
   <head>
     <title> Responsive Registration Form in PHP</title>
     <link rel="stylesheet" type="text/css" href="style.css">
      </head>

      <body>
        <div class="header">
       <h2>Login User</h2>
        </div>

        <form method="post" action="server.php">
          <?php include('errors.php');?>
          <div class="input-group">
              <label>Username:</label>
              <input type="text" name="username" >
          </div>
          <div class="input-group">
              <label>Password:</label>
              <input type="password" name="password" >
          </div>

          <div class="input-group">
            <button type="submit" class="btn" name="login_user">Login</button><br><br>
          <a href="password-reset.php"> forgot your password</a>
          </div>

          <p>
          Not yet Registered? <a href="register.php">Sign Up</a>
          </p>

        </form>
        

      </body>
</html>
