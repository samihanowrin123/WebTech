<!DOCTYPE html>
<html>
<head>
  <title>Profile Picture</title>
</head>
<body>
<?php include 'include/header.php';

<form action="files/upload.php" method="post" enctype="multipart/form-data">
  <fieldset>
<legend>PROFILE PICTURE</legend> <br>
  <img src="files/index.png"><br><br>
  <input type="file" name="fileToUpload" id="fileToUpload">
  <br><hr>
  <input type="submit" value="Submit">
</fieldset>
</form>
<?php include 'include/footer.php';

</body>
</html>