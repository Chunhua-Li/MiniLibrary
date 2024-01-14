<?php
require_once('../database/db_credentials.php'); 
require_once('../database/database.php'); 

session_start();

if($_SERVER['REQUEST_METHOD'] == 'POST'){
 $userid = $_POST['userid'] ;
 $password = $_POST['password'] ;
 $email = $_POST['email'];
 $phone = $_POST['phone'];

 $db = db_connect();

 // Check if the username already exists
$check_sql = "SELECT * FROM users WHERE userName = '$userid'";
$check_result = mysqli_query($db, $check_sql);

if (mysqli_num_rows($check_result) > 0) {
    $message = "Username already exists. Please choose a different username.";
    $flag=0;
} else {

 $sql = "INSERT INTO users (userName, password, emailAddress, phoneNumber) VALUES ('$userid', '$password', '$email', '$phone')";
 $result = mysqli_query($db, $sql);

 if ($result) {
     // Registration successful
     $_SESSION['valid_user'] = $userid;
     $_SESSION['valid_id'] = mysqli_insert_id($db);
     $message = "Registration successful!";
     $flag=1;
 } else {
     // Registration failed
     $message = "Error: " . mysqli_error($db);
     $flag=0;
 }
}
} else {
    header("Location: regist.php");
    exit();
}
db_disconnect($db);
?>

<!DOCTYPE html>
<html>
<head lang="en">
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name ="author" content="Xiaolin Wu,Yingchun Gao,Chunhua Li">
    <script src="../scripts/script_validate.js" type="text/javascript" defer></script>
    <link rel="stylesheet" href="../css/style_reg.css" type="text/css">
    <title>Registration - Mini Library</title>
</head>

<body>


<?php include ("headerEm.php") ?>
   
<div class="results">

    <h3><?php echo $message?></h3>
    <br>
    <?php
    if ($flag==1){?>
    <p><a href="create.php">>>Create My Collection</a></P>
    <?php
     } else {
    ?>
    <p><a href="regist.php">>>Create My Account</a></P>
    <?php }?>
               
</div> 
<?php include("footerEm.php"); ?>
</body>
</html>