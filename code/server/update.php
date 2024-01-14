<?php
session_start();
if (isset($_SESSION['valid_user'])){
?>
<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" media="all" href="../css/style_reg.css" />
  <title>Edit books - Mini Library</title>
  <script src="../scripts/script_validateaddbook.js" type="text/javascript" defer></script>
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
$sql = "SELECT * FROM books WHERE id= '$id' ";    
$result_set = mysqli_query($db, $sql);    
$result = mysqli_fetch_assoc($result_set);
?>
<nav>
  <a href="list.php">My collection</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="otherslist.php">Others collection</a>
</nav>
<main>
<div id="content">
<div class="logout">
      Hello, <?php echo $_SESSION['valid_user'] ?>!   <a class="action" href="logout.php">Log out</a>
</div>

  <div>
    <form name="form" class="form" method="post" action="<?php echo 'create.php?id=' . $result['id']; ?>" id="mainForm" onsubmit="return validate();">
   <fieldset class="form__panel">
      <legend class="form__heading">Edit a Book</legend>
        <p class="form__row">
           <label for="title">Title</label><br/>
           <input type="text" name="title" id="title" value="<?php echo $result['title']; ?>" class="form__input form__input--large"/>
       </p>
       <p class="form__row">
           <label for="author">Author</label><br/>
           <input type="text" name="author" id="author" value="<?php echo $result['author']; ?>" class="form__input form__input--large">
       </p>       

       <p class="form__row">
            <label for="genre">Genre</label>
            <input type="text" name="genre" id="genre" value="<?php echo $result['genre']; ?>" class="form__input form__input--large">
        </p>  

        <p class="form__row">
            <label for="publisher">Publisher</label>
            <input type="text" name="publisher" id="publisher" value="<?php echo $result['publisher']; ?>" class="form__input form__input--large">
        </p>  

        <p class="form__row">
            <label for="description">Description</label>
            <textarea name="description" id="description" class="form__textarea form__textarea--large" rows="4"><?php echo $result['description']; ?></textarea>
        </p>  
 
       <div class="form__box"> 
          <input type="submit" value="Edit book" class="form__btn"> <input type="reset" class="form__btn">      
       </div>

   </fieldset>
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