<!DOCTYPE HTML>
<html>  
<body>
 
<?php
$currentpassErr = $newpassErr = $retypepassErr
$currentpass = $newpass = $retypepass
 if (empty($_POST["currentpass"])) {
    $currentpassErr = "Enter password";
  } else {
    $currentpass = test_input($_POST["currentpass"]);
  }
    if (newpass==currentpass) {
    $newpassErr = "Password is required";
  }

    if (retypepass!=newpass)) {
       $retypepassErr = "Retyped Password must match with the New Password ";
    }

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
Current Password: <input type="text" name="currentpass">
  <span class="error">* <?php echo $currentpassErr;?></span>
  <br><br> 


New Password: <input type="text" name="newpass">
  <span class="error">* <?php echo $newpassErr;?></span>
<br><br>
Retype New Password: <input type="text" name="retypepass">
  <span class="error">* <?php echo $retypepassErr;?></span>
<br><br>


<input type="submit" name="submit" value="Submit">
</form>

</body>
</html>