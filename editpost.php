<?php
require('header.php');
require_once('init.php');
if($_SERVER['REQUEST_METHOD'] == 'GET') {
    $post_id = $_GET['id'];
    $statement = mysqli_prepare($conn, 'SELECT * FROM posts WHERE id = ?');
    mysqli_stmt_bind_param($statement, 'i', $post_id);
    if(mysqli_stmt_execute($statement)) {
        $result = mysqli_stmt_get_result($statement);
        $post = mysqli_fetch_assoc($result);
    }
} else {
    $post_id = $_POST['id'];
    $title = $_POST['post_title'];
    $description = $_POST['post_description'];
    $statement = mysqli_prepare($conn, 'UPDATE posts SET title = ?, description = ? WHERE id = ?');
    mysqli_stmt_bind_param($statement, 'ssi', $title, $description, $post_id);
    if(mysqli_stmt_execute($statement)) {
        header('Location: posts.php');
    } else {
        $error_message = "Guest update failed. Try again!";
    }
}
?>
<br>
<form action="editpost.php" method="POST">
    <input type="hidden" name="id" value="<?php echo $post['id']; ?>">
    Title:
    <br>
    <input type="text" name="post_title" value="<?php echo $post['title']; ?>">
    <br>
    Description:
    <br>
    <textarea rows = "3" cols = "50" name = "post_description"><?php echo $post['description'];?></textarea>
    <br>
    <input type="submit" value="update post">
</form>