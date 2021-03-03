<!DOCTYPE HTML>  
<html>
<head>
<style>
.error {
    color: red;
      }
</style>
</head>
<body>  
<div><?php include 'include/header.php';?></div>

<?php
$userNameErr = $passErr = "";
$username = $password = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["username"])) {
    $userNameErr = "User name is required";
  } else {
    $username = test_input($_POST["username"]);
    if (!preg_match("/^[a-zA-Z-._]*$/",$username)) {
      $userNameErr = "User Name can contain alpha numeric characters, period, dash or
      underscore only";
      $username ="";
    }
    else if (strlen($username)<2) {
      $userNameErr = "User Name must contain at least two (2) characters";
      $username ="";
    }
  }
  
  if (empty($_POST["Password"])) {
    $passErr = "Password is required";
  } else {
    $password = test_input($_POST["Password"]);
    if (strlen($password)<8) {
      $passErr = "Password must not be less than eight (8) characters";
      $password ="";
    }
    else if (!preg_match("/[@,#,$,%]/",$password)) {
      $passErr = "Password must contain at least one of the special characters (@, #, $,%)";
      $password ="";
    }
  }
  
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>


<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
  <fieldset>
<legend><B>LOGIN</B></legend>  
  User Name: <input type="text" name="username">
  <span class="error">* <?php echo $userNameErr;?></span>
  <br> <br>
  Password : <input type="Password" name="Password">
  <span class="error">* <?php echo $passErr;?></span>
  <br>
  <hr>
  <input type="checkbox"  name="remember" value="remembered">
         <label for="remember">Remember Me</label>
         <br><br>
  <input type="submit" name="submit" value="Submit">
  <span style="color:blue"><u>Forget Password?</u></span>
</fieldset>
</form>

<b> You Submitted: </b><br>
<?php
echo $username;
echo "<br>";
echo $password;
echo "<br>";
?>
<div><?php include 'include/footer.php';
?>
</div>
</body>
</html>