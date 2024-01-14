<?php
session_start();
// store to test if they *were* logged in
$old_user = $_SESSION['valid_user'];
unset($_SESSION['valid_user']); //delete session variable
session_unset();

session_destroy(); //kill the session
?>
<!DOCTYPE html>
<html>

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" media="all" href="../css/style.css" />
  <title>Log Out - Mini Library</title>
</head>

<body>
    <?php include ("headerEm.php") ?>
    <main>
    <div class="logoutpage">
    <h2>Log Out</h2>
    <?php
    if (!empty($old_user)) {
        echo '<p>You have been logged out.</p>';
    } else {
        // if they weren't logged in but came to this page somehow
        echo '<p>You were not logged in, and so have not been logged out.</p>';
    }
    ?>
    <p><a href="../index.php">Back to Login Page</a></p>
    </div>
    </main>
    <?php include("footerEm.php"); ?>
</body>

</html>