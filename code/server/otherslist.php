<?php
session_start();
if (isset($_SESSION['valid_user'])){
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" media="all" href="../css/style.css" />
  <title> Others collection - Mini Library</title>
</head>

<body>
<?php include ("headerEm.php") ?>
<?php
require_once('../database/db_credentials.php');
require_once('../database/database.php');

$db = db_connect();
//$page_title = 'book'; 

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];
    $author = $_POST['author'];
    $genre = $_POST['genre'];
    $publisher = $_POST['publisher'];
  
    $sql = "SELECT * FROM books WHERE userid <> ". $_SESSION['valid_id'];
  
    if (!empty($title)) {
        $sql .= " AND title LIKE '%$title%'";
    }
    if (!empty($author)) {
        $sql .= " AND author LIKE '%$author%'";
    }
    if (!empty($genre)) {
        $sql .= " AND genre LIKE '%$genre%'";
    }
    if (!empty($publisher)) {
        $sql .= " AND publisher LIKE '%$publisher%'";
    }
  
    $sql .= " ORDER BY author ASC";
} else {

  $sql = "SELECT * FROM books Where userid <> ". $_SESSION['valid_id'];
  $sql .= " ORDER BY author ASC";
}
  $result_set = mysqli_query($db,$sql);

  ?>

<nav>
  <a href="list.php">My collection</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Others collection
</nav>
<main>
<div id="content">
    <div class="logout">
      Hello, <?php echo $_SESSION['valid_user'] ?>!   <a class="action" href="logout.php">Log out</a>
    </div>
    <h2>Others Book Collection</h2>

    <div class="search">
    <!-- Search form -->
    <form method="post" action="otherslist.php">
      <label for="title">Title:</label>
      <input type="text" name="title" id="title">

      <label for="author">Author:</label>
      <select name="author" id="author">
        <!-- Populate the dropdown with author names from your database -->
        <option value="">Choose Author</option> 
        <?php
          $author_query = "SELECT DISTINCT author FROM books Where userid <> ". $_SESSION['valid_id'];
          $author_result = mysqli_query($db, $author_query);
          while ($author_row = mysqli_fetch_assoc($author_result)) {
            echo "<option value='" . $author_row['author'] . "'>" . $author_row['author'] . "</option>";
          }
        ?>
              

      </select>

      <label for="genre">Genre:</label>
      <select name="genre" id="genre">
        <!-- Populate the dropdown with genre from your database -->
        <option value="">Choose Genre</option> 
        <?php
          $genre_query = "SELECT DISTINCT genre FROM books Where userid <> ". $_SESSION['valid_id'];
          $genre_result = mysqli_query($db, $genre_query);
          while ($genre_row = mysqli_fetch_assoc($genre_result)) {
            echo "<option value='" . $genre_row['genre'] . "'>" . $genre_row['genre'] . "</option>";
          }
        ?>
      </select>

      <label for="publisher">Publisher:</label>
      <select name="publisher" id="publisher">
        <option value="">Choose Publisher</option> 
        <!-- Populate the dropdown with publisher names from your database -->
        <?php
          $publisher_query = "SELECT DISTINCT publisher FROM books Where userid <> ". $_SESSION['valid_id'];
          $publisher_result = mysqli_query($db, $publisher_query);
          while ($publisher_row = mysqli_fetch_assoc($publisher_result)) {
            echo "<option value='" . $publisher_row['publisher'] . "'>" . $publisher_row['publisher'] . "</option>";
          }
        ?>
      </select>

      <input type="submit" value="Search" class="btn">
    </form>
    </div>

    <div>
  	<table class="list">
  	  <tr>
        <th>ID</th>
        <th>title</th>
        <th>author</th>
  	    <th>genre</th>
        <th>publisher</th>
        <th>description</th>
  	    <th>&nbsp</th>
  	  </tr>

      <?php while($results = mysqli_fetch_assoc($result_set)) { ?>
        <tr>
          <td><?php echo $results['id']; ?></td>
          <td><a href="<?php echo"display.php?id=" . $results['id']?>"><?php echo $results['title']; ?></a></td>
          <td><?php echo $results['author'] ; ?></td>
    	    <td><?php echo $results['genre']; ?></td>
          <td><?php echo $results['publisher']; ?></td>
          <td><?php echo $results['description']; ?></td>
          <td><a class="lista" href="<?php echo"display.php?id=" . $results['id']; ?>">WriteReview</a></td>
    	  </tr>
      <?php } 
    db_disconnect($db);
    ?>
  	</table>
    </div>
</div>
<br>
<br>
</main>
<?php include("footerEm.php"); ?>
</body>
</html>
<?php
} else {
  header("Location: ../index.php");
}
?>