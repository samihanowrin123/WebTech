<!DOCTYPE html>
<html lang="en">
<head>
  
<style>
  b{
    color:red;
  }
</style>
</head>
<body>

<?php
require_once "../Model/model.php";

session_start();


if(isset($_POST['submit']) && isset($_SESSION['username']))
{
  $cpassword=$npassword=$rnpassword="";

  function test_input($data) {
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
  }

  $username=$password="";
  $flag=1;


  if (empty($_POST["cpassword"])) {
       echo "<b>*Current Password is required</b><br>";
       $flag=0;
     }
     else {
      $cpassword = test_input($_POST["cpassword"]);


        }


 if(empty($_POST["npassword"]))
 {
   echo "<b>Password is required</b> </br>";
   $flag=0;
 }
 else {
   $npassword=test_input($_POST["npassword"]);
   if(strlen($npassword)<5)
   {
     echo "<b>*Password must not be less than five (5) characters<b> <br>";
     $flag=0;
   }
   
 }

 if(empty($_POST["rnpassword"]))
 {
   echo "<b>*Password is required<br></b><br>";
   $flag=0;
 }
 else {
   $rnpassword=test_input($_POST["rnpassword"]);
   if(strlen($rnpassword)<5)
   {
     echo "<b>*Password must not be less than five (5) characters<b></br>";
     $flag=0;
   }
  
 }



  if($flag==1)
  {
    try {

      $data = searchUsername($_SESSION['username']);
      if($data!=NULL)
      {
        foreach ($data as $i => $user):

             $passwordFromDB= $user['PASSWORD'] ;
        endforeach;
        if($cpassword==$passwordFromDB)
        {
          if($npassword==$rnpassword){
          if (updatePasswordManager($_SESSION['username'], $npassword)) {
            echo 'Successfully updated!!';
           session_destroy();
            header('Location: ../View/loginManagerView.php');
          }
          else {
            echo "Update unsuccessful!!";
          }
        }
        else {
          echo "New password and retype password is not same!!";
        }
        }
        else {
          echo "Incorrect Password";
        }
      }else {
        echo "Username not found";
      }


    } catch (Exception $ex) {
      echo $ex->getMessage();
    }

  }
}

else {
  echo "You are not allowed to access this page";
}




?>

  
</body>
</html>

