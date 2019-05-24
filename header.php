<!DOCTYPE html>
<html lang="en">
<?php 
include 'init.php';
session_start();
?>
<head>

  <title>readit</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="custom.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</head>
<body>
<?php
if(isset($_SESSION['email'] )){
  $user  = $_SESSION['email'];
  $sql = "SELECT * FROM users where email='".$user ."'";
  $result = mysqli_query($conn, $sql);
  $row =  mysqli_fetch_assoc($result);
  $name = explode(" ",$row['name']);
?>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
<a class="navbar-brand" href="index.php"><img src="images/icon1.png" class="main-logo"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarText">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item ">
        <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
      </li>
    </ul>
    <span class="navbar-text">
    <ul class="navbar-nav">
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <?php echo "$user";?>
        </a>
        <div class="dropdown-menu dropdown-menu-right bg-dark" >
          <a class="dropdown-item bg-dark" href="#">Settings</a>
          <a class="dropdown-item bg-dark" href="logout.php">Logout</a>
        </div>
      </li>
    </ul>
 
    </span>
  </div>
</nav>
<div class="container-fluid" style="margin-top:100px;">
  <div class="row">
    <div class="col-3">
      <div class="card">
      <div class="card-body">
      <h3>Hello <?php echo $name[0];?></h3>
      <button type="button" id="createpost" class="btn btn-dark">Create Post</button>
      <br>
      <br>
      <button type="button" id="view" class="btn btn-dark">View Post</button>
      </div>
      </div>
    </div>
    <div class="col-6">
      <script type="text/javascript">
        document.getElementById("createpost").onclick = function () {
            location.href = "createpost.php";
      };
        document.getElementById("view").onclick = function () {
              location.href = "posts.php";
      };
      </script>

<?php 
}else{
?>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="index.php"><img src="images/icon1.png" class="main-logo"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarText">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
      </li>
    </ul>
    <span class="navbar-text">
      <form class="form-inline">
      <button class="btn btn-outline-light" id="login" type="button">Login</button>&nbsp;&nbsp;<button class="btn btn-outline-light" id="signup" type="button">Signup</button>
    </form>
    </span>
  </div>
</nav> 
<div class="container-fluid" style="margin-top:100px;">
<div class="row">
<div class="col-3">
      <div class="card">
      <div class="card-body">
      <h3>Hello Stranger!</h3>
      <p class="text-danger">You must be logged in to manage posts
      <br>
      <button type="button" id="createpost" class="btn btn-dark" disabled>Create Post</button>
      <br>
      <br>
      <button type="button" id="createpost" class="btn btn-dark" disabled>View Post</button>
      </div>
      </div>
    </div>
    <div class="col-6">


<script type="text/javascript">
    document.getElementById("login").onclick = function () {
        location.href = "login.php";
    };
      document.getElementById("signup").onclick = function () {
        location.href = "signup.php";
    };
</script>

<?php
}
?>

</body>
</html>
