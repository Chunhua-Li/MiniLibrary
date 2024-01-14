<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name ="author" content="Xiaolin Wu,Yingchun Gao,Chunhua Li">
    <script src="../scripts/script_validate.js" type="text/javascript" defer></script>
    <link rel="stylesheet" href="../css/style_reg.css" type="text/css">
    <title>Registration - Mini Library</title>
</head>

<body>
<?php include ("headerEm.php") ?>

<form name="form" class="form" method="post" action="regist_process.php" id="mainForm" onsubmit="return validate();">
   <fieldset class="form__panel">
      <legend class="form__heading">User Registration</legend>
        <p class="form__row">
           <label for="login">User Name</label><br/>
           <input type="text" name="userid" id="login" class="form__input form__input--large"/>
       </p>
       <p class="form__row">
           <label for="pass">Password</label><br/>
           <input type="password" name="password" id="pass" class="form__input form__input--large">
       </p>       

       <p class="form__row">
            <label for="pass2">Re-type Password</label>
            <input type="password" name="password2" id="pass2" class="form__input form__input--large">
        </p>  
       
        <p class="form__row">
            <label for="phone">Phone Number</label>
            <input type="text" name="phone" id="phone" class="form__input form__input--large">
        </p>  

        <p class="form__row">
            <label for="email">Email Address</label>
            <input type="text" name="email" id="email" class="form__input form__input--large">
        </p>  

        <p class="form__row">
            <input type="checkbox" name="terms" id="terms">
            <label for="terms">I agree to the terms and conditions</label>
        </p>  
 
       <div class="form__box"> 
          <input type="submit" value="sign-up" class="form__btn"> <input type="reset" class="form__btn">      
       </div>

   </fieldset>
</form>

<?php include("footerEm.php"); ?>
</body>
</html>