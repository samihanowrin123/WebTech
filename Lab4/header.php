<header>
   
<section>
		<?php
		if (empty($_SESSION['username'])) {
			echo "<a href='home.php'><h3> Home </h3> </a>";
			echo "<a href='login.php'><h2> Login  </h2></a> ";
			echo "<a href='registration.php'><h1> Registration </h1></a>";
			
			
		}

		else{
			echo "<div style='float: right';>"." Logged in as <a href='profile.php'>".$_SESSION['username']."</a> | ";
			echo "<a href='logout.php'>Logout</a><br>";
			echo "</div><br><br><br><br>";
		}
		?>
</section>

	<a href='home.php'>
	<img src="jq.png"  alt="D Company" >

	<hr>
	<hr>

</header>