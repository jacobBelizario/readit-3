<html>
<body>
<?php 
include 'header.php';
?>

<div class="card">
<div class="card-body">
<h3>Posts:</h3>
<?php
$sql = "SELECT * FROM posts";
$result = mysqli_query($conn, $sql);

if(mysqli_num_rows($result) < 0) {
    echo "No results found.";
} else {
    while($row = mysqli_fetch_assoc($result)) {
?>

    <div class="card">
    <div class="card-header">
    <p class="alignleft">Posted by <?php echo $row['user_email'];?></p>
    <p class="alignright">created at: <?php echo $row['created_at'];?></p>
    </div>
    <div class="card-body">
        <blockquote class="blockquote mb-0">
        <p><a href="viewpost.php?id=<?php echo $row['id'];?>"><?php echo $row['title']?></a></p>
        </blockquote>
    </div>
    <div class="card-footer">
    <?php 
        $reply = "SELECT count(*) as repcount from replies where post_id='". $row['id']."'";
        $res = mysqli_query($conn, $reply);
       
    if(mysqli_num_rows($res) < 0) {
        echo "Replies: 0.";
    } else {
        $data = mysqli_fetch_assoc($res); 
    }

    ?>
    <p class="alignleft">
    <?php
    $getpositive = "SELECT COUNT(positive) as positive from rating where post_id='".$row['id']."' and positive=1";
    $respositive =  $res = mysqli_query($conn, $getpositive);
    $positiveData = mysqli_fetch_assoc($respositive);

    $getnegative = "SELECT COUNT(negative) as negative from rating where post_id='".$row['id']."' and negative =1";
    $resnegative =  mysqli_query($conn, $getnegative);
    $negativeData = mysqli_fetch_assoc($resnegative);  
    ?>
    <span class="badge badge-success"><?php echo $positiveData['positive'];?></span> <a href="up.php?post_id=<?php echo $row['id'];?>&user_email=<?php echo $_SESSION['email'];?>">Upvote</a>  
    <span class="badge badge-danger"><?php echo $negativeData['negative'];?></span> <a href="down.php?post_id=<?php echo $row['id'];?>&user_email=<?php echo $_SESSION['email'];?>">Downvote</a></p>
        <p class="alignright">Replies: <?php echo $data['repcount'];?></p>
        </div>
    </div>
    <div class="dropdown-divider"></div>
    <?php
        }
    }
?>
</div>
</div>
</div>
</body>
</html>