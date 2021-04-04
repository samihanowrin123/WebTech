<!DOCTYPE html>
<html lang="en">
<head>

  <title>Document</title>
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


if(isset($_POST['submit']))
{
  function test_input($data) {
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
  }

  $username=$password="";
  $flag=1;


  if (empty($_POST["username"])) {
    echo "<b>*User Name is required </b> <br>";
    $flag=0;
  }
  else {
   $username = test_input($_POST["username"]);

    if (!preg_match("/^[a-zA-Z-. ]*$/",$username)) {
       echo "<b>*Only letters and white space allowed </b><br>";
       $flag=0;
     }
     else {
       if(strlen($username)<2)
       {
          echo "<b>*Name must contains at least two character </b> <br>";
          $flag=0;
       }

     }
  }


 if(empty($_POST["password"]))
 {
   echo "<b>*Password is required</b>";
   $flag=0;
 }
 else {
   $password=test_input($_POST["password"]);
   if(strlen($password)<5)
   {
     echo "<b>*Password must not be less than five (5) characters </b><br>";
     $flag=0;
   }

 }


  if($flag==1)
  {
    try {

      $data = searchUsername($username);
      if($data!=NULL)
      {
        foreach ($data as $i => $user):

             $passwordFromDB= $user['PASSWORD'] ;
        endforeach;
        if($password==$passwordFromDB)
        {
          $_SESSION['username']=$username;

          header('Location: ../View/dashboardManagerView.php');
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



