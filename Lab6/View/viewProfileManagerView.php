<?php
session_start();
require_once '../Controller/managerInfoController.php';


if(isset($_SESSION['username']))
{

  echo "<h1> Logged in as ".$_SESSION['username'].", Manager of ABC.COM"."</h1>";

  ?>



<?php

 echo "<br><a href='dashboardManagerView.php'><h3>Dashboard |</h3></a>";
 echo "<a href='viewProfileManagerView.php'><h3>View Profile |</h3></a>";
 echo "<a href='editProfileManagerView.php'><h3>Edit Profile |</h3></a>";

  echo "<a href='changePasswordManagerView.php'><h3>Change Password |</h3></a>";
  echo "<a href ='../Controller/logoutManagerController.php'><h3>Logout |</h3></a>";
  ?>

  <?php




if(isset($_SESSION['username']))
{
$data = fetchManagers($_SESSION['username']);


  if($data!=NULL)
  {
    foreach ($data as $i => $manager):

         $name= $manager['NAME'] ;
         $email=$manager['EMAIL'];
         $username= $manager['USERNAME'] ;
         $birth=$manager['BIRTH'];
         $gender= $manager['GENDER'] ;
    endforeach;

    echo "<br/>$name";
    echo "<br/>$email";
    echo "<br/>$username";
    echo "<br/>$birth";
    echo "<br/>$gender";
  }
}

else {
  echo "You cannot access this page!!";
}
  

}

