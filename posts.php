<html>
<body>
<?php 
include 'header.php';
?>
<div class="card">
<div class="card-body">
<h3>Posts:</h3>
<table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">Title</th>
      <th scope="col">Description</th>
      <th scope="col">Options</th>
    </tr>
  </thead>
  <tbody>

<?php
$sql = "SELECT * FROM posts where user_email='".$_SESSION['email']."'";
$result = mysqli_query($conn, $sql);

if(mysqli_num_rows($result) < 0) {
    echo "No results found.";
} else {
    while($row = mysqli_fetch_assoc($result)) {
?>
<tr>
      <td><?php echo $row['title']?></td>
      <td><?php echo $row['description']?></td>
      <td><a href="editpost.php?id=<?php echo $row['id'];?>">EDIT</button>
       <a href="deletepost.php?id=<?php echo $row['id'];?>">DELETE</a>
       </td>
</tr>
<?php
    }
}
?>
  </tbody>
</table>
</body>
</html>