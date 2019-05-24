
<?php 
include 'header.php';
?>

<?php
    	$id = $_REQUEST['id'];
        $content = $_REQUEST['content'];
        $email = $_REQUEST['email'];
        $statement = mysqli_prepare($conn, 'INSERT into replies (content,user_email,post_id) VALUES (?,?,?)');
        mysqli_stmt_bind_param($statement, 'ssi', $content, $email,$id);
        if(mysqli_stmt_execute($statement)) {
            header('Location: viewpost.php?id='.$id.'');
        } else {
            $error_message = "Error creating try again.";
        }
?>
	