<html>

<head>
	<meta name="viewport" content="initial-scale=1,maximum-scale=1,user-scalable=no" />
	<title>Wellness Spring Training</title>
	<link rel='stylesheet'  href="css/style.css?v=<?php echo time(); ?>">
	<script src="js/script.js"></script>
</head>

<?php
	include_once 'includes/dbconnect.inc.php';
	// $sqli = "SELECT team_id, name, runner1, runner2, runner3, runs, outs FROM teams";
	$sqli = "SELECT t.team_id, t.name, t.runner1, t.runner2, t.runner3, t.runs, t.outs, COALESCE(count_attempts_day, 0) AS count_attempts_day
				FROM teams t
				LEFT JOIN (
					SELECT team_id, COUNT(*) AS count_attempts_day
					FROM bats
					WHERE DATE(bat_date) = CURDATE()
					GROUP BY team_id
				) sub ON t.team_id = sub.team_id;";
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
				<img src="graphics/WFRC logo long white_transparent.png" id="logo"  >
			</a>
		</div>

		<div id="titleDiv">
			<h1>Beehive League Spring Training (2025)</h1>
		</div>

	</div>

	<div class="flex-container">
		
	<div id="imageContentDiv">
			<div id="imageDiv">
				<img id="image" src="graphics/ai_stadium - empty.jpg" alt="stadium">
			</div>
			<div id="contentDiv">
				<p> 
					<h2>Rules:</h2>
					<ul>
						<li>During the month of March, for each continuous exercise session of <u>20 minutes</u> or more, your team gets <u>one</u> at-bat.</li>    
						<li>Your at-bats will be translated, using a random generator, to: an <i>out</i>, a <i>single</i>, a <i>double</i>, a <i>triple</i>, or a <i>homerun</i>. </li>
						<li>For every runner that makes it back to home base, your team will get a run on the scoreboard. </li>
						<li><i>(NEW)</i> This season, you will be limited to <u>three at-bats per day</u>, so be sure to stay on top of recording your at-bats!  </li> 
						<li>Every week, the Beehive League will send a summary of what happened during the week's inning.</li>
						<li>Click <a href="standings.php">here</a> to view the Current Standings. </li>
					</ul>
				</p>


				<p>
					<h2>How to play:</h2>
					<ol type="1">
						<li>Select your team name using the dropdown menu </li>
						<li>Click the <i>Record an at-bat</i> button, to register an  at-bat </li>
						<li>When you are finished, you may close the tab or click the <i>Return to main page</i> button</li>
						<li>Repeat steps 1-3 to record another at-bat</li>
						<li>If you accidently register an at-bat for yourself or someone else, please notify <a href="julieb@wfrc.org"> julieb@wfrc.org </a> or <a href="jreynolds@wfrc.org"> jreynolds@wfrc.org</a></li>
					</ol>
				</p>
				
			</div>
			<div id="contentDiv2">
				<div id=runsP></div>
				<div id=outsP></div>
				<div id=atBatsP></div>
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
							$sqli = "SELECT team_id,name FROM teams ORDER BY teams.name ASC;";
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
			<b>2024 Winners</b>: <b style="color: EFBF04;">1. Bentown Tippers</b>,  <b style="color: A5A9B4;">2. Billville Jovyans</b>, <b style="color: CD7F32;">3. Dayville Daytrippers</b>
		</div>

	</div>
</body>
</html>

