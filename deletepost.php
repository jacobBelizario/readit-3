<?php
require_once('init.php');
if(!isset($_REQUEST['id'])) {
    $error_message = "Invalid input! ID is required.";
} else {
    $post_id = $_REQUEST['id'];
    $statement = mysqli_prepare($conn, 'DELETE FROM posts WHERE id = ?');
    mysqli_stmt_bind_param($statement, 'i', $post_id);
    if(mysqli_stmt_execute($statement)) {
        header('Location: posts.php');
    } else {
        $error_message = "Guest deletion failed. Try again!";
    }
}