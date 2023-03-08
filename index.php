<html>

<head>
	<title>Wellness Spring Training</title>
	<link rel='stylesheet'  href="main.css?v=<?php echo time(); ?>">
	<script src="script.js"></script>
</head>

<?php
include_once 'includes/dbconnect.inc.php';

?>



<div class="topnav">
	<header>
		<h1 align="left">Welcome to Spring Wellness Training 2023!</h1>
	</header>
</div>


<body>


	<div class="content">
		<img src="graphics/empty.jpg" alt="stadium" width="504.9" height="342.375" style="outline-style: solid;">
		<br>
		
		<p> 
			<h2>Rules:</h2>
			<ul>
			<li>During the month of March, for each continuous exercise session of <b> 20 minutes </b> or more, your team gets <b>one</b> at-bat.</li>    
			<li>Your at-bats will be translated, using a random generator, to: an <i>out</i>, a <i>single</i>, a <i>double</i>, a <i>triple</i>, or a <i>homerun</i>. </li>
			<li>For every runner that makes it back to home base, your team will get a run on the scoreboard. </li>
			<li>Every week, the Beehive League will send a summary of what happened during the week's inning.</li>
            </ul>
		</p>


		<p>
			<h2>How to play:</h2>
			<ol type="1">
				<li>Select your team name using the dropdown menu </li>
				<li>Click the <b>Record an at-bat</b> button, to register an  at-bat </li>
				<li>When you are finished, you may close the tab or click the <b>Return to main page</b> button</li>
				<li>Repeat steps 1-3 to record another at-bat</li>
				<li>If you accidently register an at-bat for yourself or someone else, please notify the Wellness team</li>
			</ol>
		</p>
		
		<br>

		<form action="includes/insert.inc.php" method="POST">
			<select id="teamSelect" name="team_name" onchange="enableButton()" style="font-family: Verdana, sans-serif;font-size: 16px;width:240px;font-size: 16px;font-family: Arial, Helvetica, sans-serif;">
				<option selected disabled>----- Select your team -----</option>
				<?php
					$sqli = "SELECT team_id,name FROM teams";
					$result = mysqli_query($conn, $sqli);
					while ($row = mysqli_fetch_array($result)){
						echo '<option>'.$row['name'].'</option>';
					}
					
				?>
				</select>
					
			<br>
			<br>
			<button id='bat_button' class="btn success" type="submit" name="submit" onclick="" disabled> Record an at-bat </button>
		</form>
	</div>
	
	<div class="footer">
  		<p> </p>
	</div>

</body>


</html>

