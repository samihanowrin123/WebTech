<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <style >
      .error {color: #FF0000;}

    </style>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>



  <?php
include("headerView.php");
 ?>

    <form style="border:3px; border-style:solid; border-color:black; padding: 1em;" method="post" action="../Controller/loginManagerController.php">



        User Name: <input type="text" name="username">
        <br><br>
        Password: <input type="text" name="password">

        <br><br>
        <br>
        <input type="checkbox"  name="remember" value="remembered">
         <label for="remember">Remember Me</label>
         <br><br>
         <input type="submit" name="submit" value="Submit">
          <meta ><a href ="changePasswordManagerView.php">Forget Password? </a></meta>

    </form>

  </body>
</html>
