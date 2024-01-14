<?php
session_start();
if (isset($_SESSION['valid_user'])){


require_once('../database/db_credentials.php');
require_once('../database/database.php');

$db = db_connect();

  // Handle form values sent by new.php
  if($_SERVER['REQUEST_METHOD'] == 'POST'){
 $title = $_POST['title'] ;
 $author = $_POST['author'] ;
 $genre = $_POST['genre'];
 $publisher = $_POST['publisher'];
 $description = $_POST['description'];
 $userid = $_SESSION['valid_id'];
 $description = mysqli_real_escape_string($db, $description);

 if(isset($_GET['id'])) {

  $id = $_GET['id'];
  
  $sql = "UPDATE books SET title = '$title', author = '$author', genre = '$genre', publisher = '$publisher', description = '$description'
           WHERE id = '$id'";
  
  } else {

  $sql = "INSERT INTO books (title, author,genre, publisher, description, userid) 
          VALUES ('$title','$author','$genre','$publisher', '$description', $userid)";

  }
  echo $sql;
$result = mysqli_query($db, $sql);
    // For INSERT statements, $result is true/false
    
if(!isset($_GET['id'])) {
  $id = mysqli_insert_id($db);
  db_disconnect($db);
}
  //redirect to show page
  header("Location: display.php?id=$id");
  

} else {
    header("Location: new.php");
}


} else {
  header("Location: ../index.php");
}
?>