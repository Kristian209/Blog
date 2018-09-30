<?php
require('config/config.php');
require('config/db.php');

if(isset($_POST['delete'])){
  $delete_id = mysqli_real_escape_string($conn, $_POST['delete_id']);

  $query = "DELETE FROM posts WHERE Id = {$delete_id}";

  if(mysqli_query($conn, $query)){
    header('Location: '.ROOT_URL.'');
  }else{
    echo "Error".mysqli_error($conn);
  }
};

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
<a class="btn-alert" href="<?php echo ROOT_URL ?>">Back</a>
  </body>
  <hr>
  <a class="btn-alert" href="<?php echo ROOT_URL; ?>editpost.php?id=<?php echo $post['Id']; ?>">Edit</a>
  <form class="pull-right" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
    <input type="hidden" name="delete_id" value="<?php echo $post['Id'] ?>">
    <input type="submit" name="delete" value="Delete" class="btn-dangers">
  </form>
</html>
