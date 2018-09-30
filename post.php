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
<?php include('inc/header.php') ?>
  <body>
    <div class="container">
<h1><?php echo $post['Title']; ?></h1>
<small><?php echo $post['Created_at']; ?> by <?php echo $post['Author']; ?></small>
<p><?php echo $post['Body']; ?></p>
<a class="btn-default" href="<?php echo ROOT_URL ?>">Back</a>
  </body>
  <hr>
  <a class="btn-default" href="<?php echo ROOT_URL; ?>editpost.php?id=<?php echo $post['Id']; ?>">Edit</a>
</html>
