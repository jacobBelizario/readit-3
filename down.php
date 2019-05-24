<?php
include 'init.php';
$email = $_REQUEST['user_email'];
$post_id = $_REQUEST['post_id'];
$addnegative = 1;

$statement = mysqli_prepare($conn, 'INSERT into rating (negative,post_id,user_email) VALUES (?,?,?)');
mysqli_stmt_bind_param($statement, 'iis', $addnegative, $post_id,$email);
if(mysqli_stmt_execute($statement)) {
    header('Location: index.php');
} else {
    $error_message = "Error creating try again.";
}