<!DOCTYPE html>
<html lang="en">
  <head>
    <style >
      .error {color: red;}
    </style>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <?php
    session_start();
  if(isset($_SESSION['username']))
{

  echo "<h1> Logged in as ".$_SESSION['username'].", Manager of ABC.COM"."</h1>";
}
?>

    
  <img src="../image/cover.png" alt="ABC.COM" id="dash">
  <p><h3>Change Password</h3></p>
    <form style="border:3px; border-style:solid; border-color:black; padding: 1em;" method="post" action="../Controller/changePasswordManagerController.php">
        Current Password: <input type="text" name="cpassword" >
        <br><br>
        <span style="color:green">New Password:</span>
        <input type="text" name="npassword" >
        <br><br>
        <span style="color:Red">Retype New Password:</span>
        <input type="text" name="rnpassword" >
        <br><br>
        <input type="submit" name="submit" value="Submit">
        <br><br>


    </form>

    
  </body>
</html>
<?php

