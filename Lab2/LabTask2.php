<!DOCTYPE HTML>  
<html>
<head>
<style>
.error {color: #FF0000;}
</style>
</head>
<body>  

<?php
$nameErr = $emailErr = $dobErr= $genderErr = $degreeErr = $groupErr = "";
$name = $email = $dob = $gender = $degree = $group = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $nameErr = "Name is required";
  } else {
    $name = test_input($_POST["name"]);
    // check if name only contains letters,dash and whitespace
    if (!preg_match("[a-zA-Z-' ]*-",$name)) {
      $nameErr = "Only letters, dash and white space allowed";
    }
  }
  
  if (empty($_POST["email"])) {
    $emailErr = "Cannot be Empty";
  } else {
    $email = test_input($_POST["email"]);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Must be a valid";
    }
  }
    

  if (empty($_POST["dob"])) {
    $dob = "Cannot be empty";
  } else {
    $dob = test_input($_POST["dob"]);
        if (!filter_var($dob, FILTER_VALIDATE_DOB)) {
      $dobErr = "Must be a valid";
  }
}

  if (empty($_POST["gender"])) {
    $genderErr = "At least one of them must be selected";
  } else {
    $gender = test_input($_POST["gender"]);
  }

  if (empty($_POST["degree"])) {
    $degree = "At least two of them must be selected";
  } else {
     $degree = test_input($_POST["degree"]);
    }

    if (empty($_POST["group"])) {
    $groupErr = "Must be selected";
  } else {
    $group = test_input($_POST["group"]);
  }
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

<h2>Form Validation</h2>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
  Name: 
  <br>
  <input type="text" name="name">
  <span class="error">* <?php echo $nameErr;?></span>
  <br><br> 
  <input type="submit" name="submit" value="Submit">
  <br><br> 
  E-mail:
  <br>
   <input type="text" name="email" value="<?php echo $email;?>">
  <span class="error">* <?php echo $emailErr;?></span>
  <br><br>
    <input type="submit" name="submit" value="Submit">
    <br><br> 
  Date of Birth:
  <br>
   <input type="date" name="dob" value="<?php echo $dob;?>">
  <span class="error"><?php echo $dobErr;?></span>
  <br><br>
    <input type="submit" name="submit" value="Submit">
    <br><br>
  Gender:
  <br>
  <input type="radio" name="gender" <?php if (isset($gender) && $gender=="female") echo "checked";?> value="female">Female
  <input type="radio" name="gender" <?php if (isset($gender) && $gender=="male") echo "checked";?> value="male">Male
  <input type="radio" name="gender" <?php if (isset($gender) && $gender=="other") echo "checked";?> value="other">Other 
  <span class="error">* <?php echo $genderErr;?></span>
  <br><br>
  <input type="submit" name="submit" value="Submit">
  <br>  
  Degree:
  <br>
      <input type="checkbox" id="degree1" name="ssc" value="ssc">
      <label for="degree1">SSC</label>
      <input type="checkbox" id="degree2" name="hsc" value="hsc">
      <label for="degree2">HSC</label>
      <input type="checkbox" id="degree3" name="bsc" value="bsc">
      <label for="degree3">BSC</label>
      <input type="checkbox" id="degree4" name="msc" value="msc">
      <label for="degree4">MSC</label>
<br><br>
    <input type="submit" name="submit" value="Submit">
    <br><br>
  Blood Group:
  <br>
      <input list="browsers" name="browser">
        <datalist id="browsers">
        <option value="O+">
        <option value="A+">
        <option value="A-">
        <option value="O-">
        <option value="B+">
       </datalist>
       <span class="error">* <?php echo $groupErr;?></span>
       <br><br>
    <input type="submit" name="submit" value="Submit">
</form>

<?php
echo "<h2>Your Input:</h2>";
echo $name;
echo "<br>";
echo $email;
echo "<br>";
echo $dob;
echo "<br>";
echo $gender;
echo "<br>";
echo $degree;
echo "<br>";
echo $group;

?>

</body>
</html>