<?php
session_start();
if (isset($_SESSION['valid_user'])){
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Display - Mini Library</title>
  <link rel="stylesheet" href="../css/style.css" />
</head>
<body>  
<?php include ("headerEm.php") ?>

<?php
require_once('../database/db_credentials.php');
require_once('../database/database.php');

$db = db_connect();

//access URL parameter
$id = $_GET['id'] ;

//insert reviews
if($_SERVER['REQUEST_METHOD'] == 'POST'){
  $userName = $_POST['userName'] ;
  $review = $_POST['review_content'];
  $review = mysqli_real_escape_string($db, $review);
 
  $sql = "INSERT INTO reviews (userName, bookId,review) 
           VALUES ('$userName','$id','$review')";
 
  $result = mysqli_query($db, $sql);
}

$sql = "SELECT * FROM books WHERE id= '$id' ";    
$result_set = mysqli_query($db, $sql);    
$result = mysqli_fetch_assoc($result_set);

// Fetch reviews for the book
$review_sql = "SELECT * FROM reviews WHERE bookId = '$id'";
$review_result_set = mysqli_query($db, $review_sql);
?>

<nav>
  <a href="list.php">My collection</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="otherslist.php">Others collection</a>
</nav>
<main>
<div id="content">

    <div class="logout">
      Hello, <?php echo $_SESSION['valid_user'] ?>!   <a class="action" href="logout.php">Log out</a>
    </div>

  <h2>Book Details</h2>

<div class="details">
  <dl>
    <dt>Book Title:</dt>
    <dd><?php echo $result['title']; ?></dd>
  </dl>
  <dl>
    <dt>Book Author:</dt>
    <dd><?php echo $result['author']; ?></dd>
  </dl>
  <dl>
    <dt>Book Genre:</dt>
    <dd><?php echo $result['genre']; ?></dd>
  </dl>
  <dl>
    <dt>Book Publisher:</dt>
    <dd><?php echo $result['publisher']; ?></dd>
  </dl>
  <dl>
    <dt>Book Description:</dt>
    <dd><?php echo $result['description']; ?></dd>
  </dl>

  <div class="reviews">
      <h3>Reader's Reviews</h3>

      <?php while ($review = mysqli_fetch_assoc($review_result_set)) { ?>
        <div class="review">
          <p><strong><?php echo $review['userName']; ?>:</strong> <?php echo $review['review']; ?></p>
        </div>
      <?php } 
  db_disconnect($db);
  ?>


      <h3>Add Your Review</h3>
      <form action="display.php?id=<?php echo $id; ?>" method="post">
        <textarea name="review_content" rows="4" required></textarea>
        <input type="hidden" name="userName" value="<?php echo $_SESSION['valid_user']; ?>">
        <p class="form_box"><input type="submit" value="Submit Review"></p>
      </form>
</div>
</div>
</div>
</main>
<?php include 'footerEm.php'; ?>
</body>

</html>
<?php
} else {
  header("Location: ../index.php");
}
?>