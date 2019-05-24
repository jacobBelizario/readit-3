<!DOCTYPE html>
<html>
<head>
<?php 
include 'header.php';
?>
</head>
<body>
<div class="card">
  <div class="card-body">
  <h3>Password Recovery:</h3>
  <br>
  <div>
		<form method="post" action="mailer.php">
			<div class="form-group">
                    <div class="input-group mb-3">
                    <input type="email" name="email" class="form-control" placeholder="Enter email">
                    <div class="input-group-append">
                        <button class="btn btn-dark" type="submit">Send</button>
                    </div>
                </div>
		</form>
	</div>		
  </div>
</div>
</body>
</html>