<?php
session_start();
if (isset($_SESSION['valid_user'])){
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <link rel="stylesheet" media="all" href="../css/style_reg.css" />
  <script src="../scripts/script_validateaddbook.js" type="text/javascript" defer></script>
  <title>Add books - Mini Library</title>
</head>

<body>
<?php include 'headerEm.php'; ?>
<nav>
  <a href="list.php">My collection</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="otherslist.php">Others collection</a>
</nav>
<main>

<div id="content">
  <div class="logout">
      Hello, <?php echo $_SESSION['valid_user'] ?>!   <a class="action" href="logout.php">Log out</a>
    </div>

    <form name="form" class="form" method="post" action="create.php" id="mainForm" onsubmit="return validate();">
   <fieldset class="form__panel">
      <legend class="form__heading">Add a Book</legend>
        <p class="form__row">
           <label for="title">Title</label><br/>
           <input type="text" name="title" id="title" class="form__input form__input--large"/>
       </p>
       <p class="form__row">
           <label for="author">Author</label><br/>
           <input type="text" name="author" id="author" class="form__input form__input--large">
       </p>       

       <p class="form__row">
            <label for="genre">Genre</label>
            <input type="text" name="genre" id="genre" class="form__input form__input--large">
        </p>  

        <p class="form__row">
            <label for="publisher">Publisher</label>
            <input type="text" name="publisher" id="publisher" class="form__input form__input--large">
        </p>  

        <p class="form__row">
            <label for="description">Description</label>
            <textarea name="description" id="description" class="form__textarea form__textarea--large" rows="10"></textarea>
        </p>  
 
       <div class="form__box"> 
          <input type="submit" value="Add book" class="form__btn"> <input type="reset" class="form__btn">      
       </div>

   </fieldset>
</form>
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