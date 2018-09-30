<?php
require('config/config.php');
require('config/db.php');
include('inc/header.php');

if(isset($_POST['submit'])){
  $update_id = mysqli_real_escape_string($conn, $_POST['update_id']);
  $title = mysqli_real_escape_string($conn, $_POST['title']);
  $author = mysqli_real_escape_string($conn, $_POST['author']);
  $body = mysqli_real_escape_string($conn, $_POST['body']);

  $query = "UPDATE posts SET
            title = '$title',
            author = '$author',
            body = '$body'
            WHERE Id = {$update_id}";

if(mysqli_query($conn, $query)){
  header('Location: '.ROOT_URL.'');
}else{
  echo "Error".mysqli_error($conn);
}
}
$id = mysqli_real_escape_string($conn, $_GET['id']);

//Create query
$query = 'SELECT * FROM posts WHERE Id = '.$id;

//Get result
$result = mysqli_query($conn, $query);

//Fetch data
$post = mysqli_fetch_assoc($result);
//var_dump($posts);

//Free result
mysqli_free_result($result);

//Close the connection
mysqli_close($conn);
?>
<body>
    <div class="container">
<h1>Add Posts</h1>
<form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">
  <div class="form-group">
    <label>Title</label>
    <input type="text" value="<?php echo $post['Title'] ?>" name="title" class="form-control"></input>
  </div>
  <div class="form-group">
    <label>Author</label>
    <input type="text" name="author" value="<?php echo $post['Author'] ?>" class="form-control"></input>
  </div>
  <div class="form-group">
    <label>Body</label>
    <textarea name="body" class="form-control"><?php echo $post['Body'] ?></textarea>
  </div>
  <input type="hidden" name="update_id" value="<?php echo $post['Id'] ?>">
  <input type="submit" name="submit" value="Submit" class="btn btn-primary">
</form>
</div>
  </body>
</html>
