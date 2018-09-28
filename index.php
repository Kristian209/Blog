<?php
require('config/config.php');
require('config/db.php');

//Create query
$query = 'SELECT * FROM posts';

//Get result
$result = mysqli_query($conn, $query);

//Fetch data
$posts = mysqli_fetch_all($result, MYSQLI_ASSOC);
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
<h1>Posts</h1>
<?php foreach($posts as $post) : ?>
<div class="well">
<h3><?php echo $post['Title']; ?></h3>
<small><?php echo $post['Created_at']; ?> by <?php echo $post['Author']; ?></small>
<p><?php echo $post['Body']; ?></p>
<a class="btn-default" href="<?php echo ROOT_URL ?>post.php?id=<?php echo $post['Id']; ?>">Read More</a>
</div>
<?php endforeach; ?>
</div>
  </body>
</html>
