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
    	$target = $_REQUEST['id'];
        $sql = "SELECT * FROM posts where id='".$target ."'";
        $result = mysqli_query($conn, $sql);
        $data = mysqli_fetch_assoc($result);
        $sql1 = "SELECT * FROM replies where post_id='".$target ."'";
        $result1 = mysqli_query($conn, $sql1);
        
?>
<div class="card">
<div class="card-body">
<h3>View:</h3>
<div class="card">
    <div class="card-header">
    <p class="alignleft">Posted by <?php echo $data['user_email'];?></p>
    <p class="alignright">created at: <?php echo $data['created_at'];?></p>
    </div>
    <div class="card-body">
        <blockquote class="blockquote mb-0">
        <p><a href="viewpost.php?id=<?php echo $data['id'];?>"><?php echo $data['title']?></a></p>
        <footer class="blockquote-footer"><?php echo $data['description']?></footer>
        </blockquote>
    </div>
    </div>
    <br>
<h3>Reply:</h3>
<?php 
if(isset($_SESSION['email'])){
?>

<form action="postreply.php?id=<?php echo $target;?>">
            <div class="form-group">
                <textarea class="form-control" name = "content" rows="3"></textarea>
            </div>
            <input type="hidden" name="email" value="<?php echo $_SESSION['email']?>">
            <input type="hidden" name="id" value="<?php echo $target?>">
			<button type="submit" class="btn btn-dark">Reply</button>
</form>
<?php 
} else {
?>
<h3><p class="text-danger">YOU MUST BE LOGGED IN TO REPLY!</p><h3>
<form action="login.php">
    <button type="submit" class="btn btn-dark">login</button>
</form>
<?php
}
?>
<?php
if(mysqli_num_rows($result1) < 0) {
    echo "No results found.";
} else {
    while($row = mysqli_fetch_assoc($result1)) {
?>
<div class="dropdown-divider"></div>

<div class="card">
    <div class="card-header">
    <p class="alignleft"><?php echo $row['user_email'];?> replied</p>
    </div>
    <div class="card-body">
        <blockquote class="blockquote mb-0">
        <p><?php echo $row['content']?></p>
        </blockquote>
</div>
</div>
<?php
    }
}
?>

</body>
</html>