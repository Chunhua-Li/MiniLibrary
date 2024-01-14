<?php
session_start();

if (isset($_POST['userid']) && isset($_POST['password'])) {
    // If the user has just tried to log in
    $userid = $_POST['userid'];
    $password = $_POST['password'];

    require_once('database/db_credentials.php');
    require_once('database/database.php');

    $db = db_connect();
    $sql = "SELECT * FROM users WHERE userName='$userid'";
    $result = mysqli_query($db, $sql);

    if ($result && $row = mysqli_fetch_assoc($result)) {
        if ( $password === $row['password']) {
            $_SESSION['valid_user'] = $userid;
            $_SESSION['valid_id'] = $row['id'];
            header("Location: server/list.php");
        } else {
            echo "Invalid password";
        }
    } else {
        echo "User not found";
    }

    db_disconnect($db);

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name ="author" content="Xiaolin Wu,Yingchun Gao,Chunhua Li">
    <script src="scripts/script_validatelogin.js" type="text/javascript" defer></script>
    <link rel="stylesheet" href="css/style_reg.css" type="text/css">
    <title>Login - Mini Library</title>
</head>

<body>
<?php include ("server/headerEm.php") ?>

<main>
<form name="form" class="form" method="post" action="index.php" id="mainForm" onsubmit="return validate();">
   <fieldset class="form__panel">
      <legend class="form__heading">User Login</legend>
        <p class="form__row">
           <label for="login">User Name</label><br/>
           <input type="text" name="userid"  id="login" class="form__input form__input--large"/>
       </p>
       <p class="form__row">
           <label for="pass">Password</label><br/>
           <input type="password" name="password" id="pass" class="form__input form__input--large">
       </p>            
 
       <div class="form__box"> 
          <input type="submit" value="sign-in" class="form__btn"> <input type="reset" class="form__btn">      
       </div>

   </fieldset>
</form>

    <h4><a href="server/regist.php">Sign-up</a> to be a user</h3>

</main> 


<?php include("server/footerEm.php"); ?>
</body>
</html>