<?php
require('config/config.php');
require('config/db.php');

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
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
<link rel="stylesheet" href="https://bootswatch.com/4/minty/bootstrap.min.css">
  </head>
  <body>
    <div class="container">
<h1><?php echo $post['Title']; ?></h1>
<small><?php echo $post['Created_at']; ?> by <?php echo $post['Author']; ?></small>
<p><?php echo $post['Body']; ?></p>
<a class="btn-default" href="<?php echo ROOT_URL ?>">Back</a>
  </body>
</html>
