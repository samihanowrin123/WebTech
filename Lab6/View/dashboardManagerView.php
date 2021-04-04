<!DOCTYPE html>
<html lang="en">
<head>
  <style>
    h1{
      color:violet;
    }
  </style>
</head>
<body>
  
<?php
session_start();


if(isset($_SESSION['username']))
{

  echo "<h1> Hello ".$_SESSION['username'].", Welcome to ABC.COM"."</h1>";
  ?>
  <img src="../image/cover.png" alt="ABC.COM" id="dash">



 <?php
 echo "<br><a href='dashboardManagerView.php'>Dashboard</a>";
 echo "<br><a href='viewProfileManagerView.php'>View Profile</a>";
 echo "<br><a href='editProfileManagerView.php'>Edit Profile</a>";

  echo "<br><a href='changePasswordManagerView.php'>Change Password</a>";
  echo "<br><a href ='../Controller/logoutManagerController.php'>Logout </a>";
  


 

}



  else{
 
  header("location:loginManagerView.php");
  
  }
 ?>

  
</body>
</html>


