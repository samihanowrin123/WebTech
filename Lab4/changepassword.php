<!DOCTYPE HTML>  
<html>
<head>
<style>
.error,#rnp {
    color:red;
    }

#np{
    color:green;
}

</style>
</head>
<body>  
    <div>
    <?php include 'include/header.php';
    ?>
    </div>

<?php
$cpassErr = $npassErr = $rtnpassErr = "";
$cpass = $npass = $rtnpass = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["cpass"])) {
    $cpassErr = "Current Password is required";
  } else {
    $cpass = test_input($_POST["cpass"]);
  }

  if (empty($_POST["npass"])) {
    $npassErr = "Enter The New Password";
  } else {
    $npass = test_input($_POST["npass"]);
    if (strlen($npass)<8) {
      $npassErr = " Password must not be less than eight (8) characters";
      
    }
    else if (!preg_match("/[@,#,$,%]/",$npass)) {
      $npassErr = "Password must contain at least one of the special characters (@, #, $,%)";
      
    }
    else if (strcmp($cpass, $npass)==0) {
      $npassErr = "New Password should not be same as the Current Password";
     
    }
  }

  if (empty($_POST["rtnpass"])) {
    $rtnpassErr = "Retype The Current Password";
  } else {
    $rtnpass = test_input($_POST["rtnpass"]);
    if (!strcmp($npass, $rtnpass)==0) {
      $rtnpassErr = "New Password & Retyped Password Dosen't Match";
    
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
<legend><B>CHANGE PASSWORD</B></legend>  
  Current Password: <input type="Password" name="cpass">
  <span class="error">* <?php echo $cpassErr;?></span>
  <br><br>
  <div id="np">
         New Password: <input type="Password" name="npass">
         <span class="error">* <?php echo $npassErr;?></span>
        <br><br>
  </div>

  <div id="rnp">
        Retype New Password: <input type="Password" name="rtnpass">
        <span class="error"> *<?php echo $rtnpassErr;?></span>
        <br><hr>
  </div>

  <input type="submit" name="submit" value="Submit">
</fieldset>
</form>
 <b>You Submitted:</b>
<?php
echo "<br>";
echo $cpass;
echo "<br>";
echo $npass;
echo "<br>";
echo $rtnpass;
echo "<br>";
?>

    <div>
    <?php include 'include/footer.php';
    ?>
    </div>
</body>
</html>