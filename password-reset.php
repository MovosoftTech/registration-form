<?php include('server.php');?>
<!DOCTYPE html>
<html>
<head>
    <title> Responsive Registration Form in PHP</title>
     <link rel="stylesheet" type="text/css" href="style.css">
</head>

  <body>
    <div class="header">
        <h2>Reset Password</h2>
    </div>

     <form action="password-reset-code.php" method="POST"
      <?php include('errors.php');?>

      <div class="input-group">
      	<label>Email:</label>
       <input type="text" name="email" value="" >
      </div>

      <div class="input-group">
       <button type="submit" class="btn" name="password_reset_link">send password</button>
      </div>
      <p>
         Already Registered? <a href="login.php">Sign In</a>
      </p>
     </form>
  </body>

</html>
