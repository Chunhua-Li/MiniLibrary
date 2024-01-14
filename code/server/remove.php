<?php
session_start();
if (isset($_SESSION['valid_user'])){
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <link rel="stylesheet" href="../css/style.css" />
  <title>Remove books - Mini Library</title>
</head>

<body>
<?php include ("headerEm.php") ?>

<?php
require_once('../database/db_credentials.php');
require_once('../database/database.php');

$db = db_connect();

if(!isset($_GET['id'])) {
  header("Location:  list.php");
}
$id = $_GET['id'];

if($_SERVER['REQUEST_METHOD'] == 'POST') {

  $sql = "DELETE FROM books WHERE id ='$id'";
    $result = mysqli_query($db, $sql);

  header("Location: list.php");

} 
else 
{
  $sql = "SELECT * FROM books WHERE id= '$id' ";    
  $result_set = mysqli_query($db, $sql);
  $result = mysqli_fetch_assoc($result_set);
}

?>
<nav>
  <a href="list.php">My collection</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="otherslist.php">Others collection</a>
</nav> 
<main>
<div class="logout">
      Hello, <?php echo $_SESSION['valid_user'] ?>!   <a class="action" href="logout.php">Log out</a>
</div>
<h2>Delete Books</h2>
<div id="content">
  <div class="remove">    
    <p>Are you sure you want to delete <span class="delete-title"><?php echo $result['title']; ?></span>?</p>

    <form form action="<?php echo 'remove.php?id=' . $result['id']; ?>"  method="post">
      <div>
        <input type="submit" name="commit" value="Delete Book" class="btn" />
      </div>
    </form>
  </div>
</div>
</main>
<?php include 'footerEm.php'; ?>
</body>
</html>
<?php
db_disconnect($db);
} else {
  header("Location: ../index.php");
}
?>

