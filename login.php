<!DOCTYPE html>
<html>
<head>
<?php 
include 'header.php';
?>
	<title></title>
</head>
<body>
<?php
	if($_SERVER['REQUEST_METHOD'] == 'POST') {
    	$email = $_POST['email'];
    	$password = $_POST['password'];
    	$query = "select * from users where email ='".$email."'";
    	$result = mysqli_query($conn, $query);


    	if(mysqli_num_rows($result) < 0) {
		    echo "No users found.";
		} else {
			$row = mysqli_fetch_assoc($result);
		    if(($row['email'] == $email) and ($row['password'] ==  $password))
		    {
		    	echo "login successful";
		    	session_start();
		    	$_SESSION["email"] = $email;
		    	header('Location: index.php');
		    }
		    else 
		    {
		    	echo "user found but wrong password";
		    }
		}
	}
?>
<div class="card">
  <div class="card-body">
	<div>

		<form method="post" action="<?php  echo  $_SERVER['PHP_SELF'];?>">
			<div class="form-group">
				<label>Email</label>
				<input type="email" name="email" class="form-control" value="<?php if(!empty($_POST['email'])){echo  $_REQUEST['email']; }?>"
				aria-describedby="emailHelp" placeholder="Enter email ">	
			</div>
			<div class="form-group">
				<label>Password</label>
				<input type="password" name="password" class="form-control" value="<?php if(!empty($_POST['password'])){echo  $_REQUEST['password']; }?>"
				aria-describedby="emailHelp" placeholder="Enter email ">	
			</div>
			<button type="submit" class="btn btn-dark">Login</button>
		</form>
		<a href="forgot.php">Forgot Password?</a>
	</div>		
  </div>
</div>
</body>
</html>