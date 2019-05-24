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
		$fname = $_POST['fname'];
		$email = $_POST['email'];
		$password = $_POST['password'];
		$lname = $_POST['lname'];
		$name = $fname." ".$lname;
    	if(strlen($password)<=11){
    		$error_message = "please input 10 or more characters";
    		header('Location: signup.php?error_message='.$error_message);
    	}else{
	    	$statement = mysqli_prepare($conn, 'INSERT INTO users (name,email,password) VALUES (?, ?, ?)');
	    	mysqli_stmt_bind_param($statement, 'sss', $name,$email,$password);
	    	if(mysqli_stmt_execute($statement)) {
	        	header('Location: index.php');
	    	} else {
	        $error_message = "sign up failed. Try again.";
	    	}
    	}
}
?>
<div class="card">
  <div class="card-body">
  <div>
		<form method="post">
			<div class="form-group">
				<label>First Name</label>
				<input type="fname" name="fname" class="form-control" value="<?php if(!empty($_POST['fname'])){echo  $_REQUEST['fname']; }?>"
				aria-describedby="emailHelp" placeholder="Enter first name">	
			</div>
			<div class="form-group">
				<label>Last Name</label>
				<input type="lname" name="lname" class="form-control" value="<?php if(!empty($_POST['lname'])){echo  $_REQUEST['lname']; }?>"
				aria-describedby="emailHelp" placeholder="Enter last name">	
			</div>
			<div class="form-group">
				<label>Email address</label>
				<input type="email" name="email" class="form-control" value="<?php if(!empty($_POST['email'])){echo  $_REQUEST['email']; }?>"
				aria-describedby="emailHelp" placeholder="Enter email">	
			</div>

			<?php
			if(isset($_REQUEST['error_message'])){
			?>
			<p class="text-danger"><?php echo $_REQUEST['error_message'];?></p>
			<div class="form-group">
				<label for="exampleInputPassword1">Password</label>
				<input type="password"  class="form-control" name="password" id="exampleInputPassword1" placeholder="Password">
			</div>
			<?php
			} else {
			?>
			<div class="form-group">
				<label for="exampleInputPassword1">Password</label>
				<input type="password"  class="form-control" name="password" id="exampleInputPassword1" placeholder="Password">
			</div>
			<?php
			}
			?>
			<button type="submit" class="btn btn-dark">Sign up</button>
		</form>
	</div>		
  </div>
</div>
	
</body>
</html>