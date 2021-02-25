<?php
   session_start();
   
   //Define valiables
   $username = "";
   $email = "";
   $errors = array();

   $db = mysqli_connect('localhost', 'root', '', 'register_user');

   if(isset($_POST['reg_user'])){

   	 $username = mysqli_real_escape_string($db, $_POST['username']);
   	 $email    = mysqli_real_escape_string($db, $_POST['email']);
   	 $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
   	 $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);

   	 //check if details are filled

   	 if (empty($username)) {
   	 	array_push($errors, "Username is required");

   	 }

   	 if (empty($email)) {
   	 	array_push($errors, "Email is required");
   	 }

   	  if (empty($password_1)) {
   	  	array_push($errors, "Password is required");
   	  }

   	 if ($password_1 != $password_2) {
   	 	array_push($errors, "Password doesn't match");
   	 }
     

   	 //Checking if user already exist in the db

   	 $user_check = "SELECT * FROM users WHERE username ='$username' OR email ='$email' LIMIT 1";
   	 $result = mysqli_query($db,$user_check );
   	 $user = mysqli_fetch_assoc($result);

   	 if ($user) {
   	 	if ($user['username'] === $username) {
   	 		array_push($errors, "Username Already exists"); 	 	
   	 	}

   	 	if ($user['email'] === $email) {
   	 		array_push($errors, "Email already exists");
   	 	}
   	 }

   	   //inser data into the db
   	   if (count($errors) ==0) {
   	   	$password = md5($password_1);  //password encryption

   	   	$token = bin2hex(openssl_random_pseudo_bytes(20));
   	   	var_dump(bin2hex($token));

   	   	$query = "INSERT INTO users(username,email,password,token) VALUES('$username', '$email', '$password','$token')";	   
        mysqli_query($db,$query);
        $_SESSION['username'] = $username;
        $_SESSION['success'] ="You are now logged in";
        header('location: index.php');
   	   }
   }

   //Check for Login 

   if (isset($_POST['login_user'])) {
   	$username = mysqli_real_escape_string($db, $_POST['username']);
   	 $password    = mysqli_real_escape_string($db, $_POST['password']);

   	 if (empty($username)) {
   	 	array_push($errors, "Username is required");
   	 }

   	 if (empty($password)) {
   	 	array_push($errors, "Password is required");
   	 }

   	 if (count($errors) == 0) {
   	 	$password = md5($password);

   	 	$query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
   	 	$results = mysqli_query($db, $query);
        if (mysqli_num_rows($results) == 1) {
        	$_SESSION['username'] = $username;
        	$_SESSION['success'] = "Kudos! You are logged in";
        	header('location: index.php');
        }
        else{
        	array_push($errors, "Wrong Username or Password");
        }
   	 }
   }
?>