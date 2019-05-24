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
    if(isset($_SESSION['email'])){
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $email = $_POST['email'];
            $title = $_POST['post_title'];
            $description = $_POST['post_description'];
            $statement = mysqli_prepare($conn, 'INSERT into posts (title,description,user_email) VALUES (?,?,?)');
            mysqli_stmt_bind_param($statement, 'sss', $title, $description,$email);
            if(mysqli_stmt_execute($statement)) {
                header('Location: index.php');
            } else {
                $error_message = "Error creating try again.";
            }
        }
    }else{
        header('Location: index.php');
    }
?>
<div class="card">
  <div class="card-body">
  <div>
		<form method="post" action="<?php  echo  $_SERVER['PHP_SELF'];?>">
			<div class="form-group">
				<label>Title</label>
				<input type="text" name="post_title" class="form-control" value="<?php if(!empty($_POST['post_title'])){echo  $_REQUEST['post_title']; }?>"
				aria-describedby="emailHelp" placeholder="Enter Title">	
			</div>
            <div class="form-group">
                <label for="exampleFormControlTextarea1">Description</label>
                <textarea class="form-control" name = "post_description" rows="3"></textarea>
            </div>
            <input type="hidden" name="email" value="<?php echo $_SESSION['email']?>">
			<button type="submit" class="btn btn-dark">Create Post</button>
		</form>
	</div>		
  </div>
</div>
</body>
</html>