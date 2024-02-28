<html>

<head>
	<meta name="viewport" content="initial-scale=1,maximum-scale=1,user-scalable=no" />
	<title>Wellness Spring Training</title>
	<link rel='stylesheet'  href="main.css?v=<?php echo time(); ?>">
	<script src="script.js"></script>
</head>

<?php
	include_once 'includes/dbconnect.inc.php';
	$sqli = "SELECT team_id, name, runner1, runner2, runner3, runs, outs FROM teams";
	$result = mysqli_query($conn, $sqli);
	$rows = array();
	while($r = mysqli_fetch_assoc($result)) {
		$rows[] = $r;
	}


	$jsonData = json_encode($rows);
	// print_r($jsonData)

?>

<script type="text/javascript">
	const teams = <?php echo $jsonData;?>;
	console.log(teams)
</script>






<body>
	<div id="headerDiv">
		
		<div id="logoDiv">
			<a href="https://wfrc.org/">
				<img src="graphics/logo.png" id="logo"  >
			</a>
		</div>

		<div id="titleDiv">
			<h1 >Welcome to Spring Wellness Training 2024!</h1>
		</div>

	</div>

	<div class="flex-container">
		<div id="imageContentDiv">
			<div id="imageDiv">
				<img id="image" src="graphics/empty.jpg" alt="stadium">
			</div>
			
			<div id="contentDiv">
				<p> 
					<h2>Rules:</h2>
					<ul>
						<li>During the month of March, for each continuous exercise session of <b> 20 minutes </b> or more, your team gets <b>one</b> at-bat.</li>    
						<li>Your at-bats will be translated, using a random generator, to: an <i>out</i>, a <i>single</i>, a <i>double</i>, a <i>triple</i>, or a <i>homerun</i>. </li>
						<li>For every runner that makes it back to home base, your team will get a run on the scoreboard. </li>
						<li>Every week, the Beehive League will send a summary of what happened during the week's inning.</li>
						<li>Click <a href="standings.php">here</a> to see the Current Standings! </li>
					</ul>
				</p>


				<p>
					<h2>How to play:</h2>
					<ol type="1">
						<li>Select your team name using the dropdown menu </li>
						<li>Click the <b>Record an at-bat</b> button, to register an  at-bat </li>
						<li>When you are finished, you may close the tab or click the <b>Return to main page</b> button</li>
						<li>Repeat steps 1-3 to record another at-bat</li>
						<li>If you accidently register an at-bat for yourself or someone else, please notify julieb@wfrc.org or jreynolds@wfrc.org</li>
					</ol>
				</p>
				
			</div>
			<div id="contentDiv2">
				<div id=runsP></div>
				<div id=outsP></div>
				<br>
				<div id=runnersDiv></div>
			</div>
		</div>
	

		<div id="teamSelectorDiv">

			<form action="includes/insert.inc.php" method="POST">
				<div class="select">
					<select id="teamSelect" name="team_name" onchange="enableButton()" >
						<option selected disabled>----- Select your team -----</option>
						<?php
							$sqli = "SELECT team_id,name FROM teams";
							$result = mysqli_query($conn, $sqli);
							while ($row = mysqli_fetch_array($result)){
								echo '<option>'.$row['name'].'</option>';
							}
							
						?>
						</select>
				</div>
				<br>
				<div id=buttonDiv>
					<button id='bat_button' class="btn success" type="submit" name="submit" onclick="" disabled> Record an at-bat </button>
				</div>	
			</form>
		</div>	
		
		<div id="footerDiv">
			<b>2023 Winners</b>: <b style="color: gold;">1. Bentown Tippers</b>,  <b style="color: silver;">2T. Dayville Daytrippers</b>, <b style="color: silver;">2T. Megtown Senders</b>
		</div>

	</div>
</body>
</html>

