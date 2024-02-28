<html>

<head>
	<meta name="viewport" content="initial-scale=1,maximum-scale=1,user-scalable=no" />
	<title>Wellness Spring Training</title>
	<link rel='stylesheet'  href="main.css?v=<?php echo time(); ?>">
	<script src="script.js"></script>
</head>

<?php
	include_once 'includes/dbconnect.inc.php';
	$sqli = "SELECT name, runs FROM `teams` ORDER BY runs DESC LIMIT 10;";
	$result = mysqli_query($conn, $sqli);
	$rows = array();
	while($r = mysqli_fetch_assoc($result)) {
		$rows[] = $r;
	};
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
			<h1 >Standings!</h1>
		</div>

	</div>

	<div class="flex-container">
		<br>
		<?php if (count($rows) > 0): ?>
		<div id="standingsDiv">
			<table>
				<tr>
					<th>Team Name</th>
					<th>Runs</th>
				</tr>
			
				<?php foreach ($rows as $row): array_map('htmlentities', $row); ?>
					<tr>
					<td><?php echo implode('</td><td>', $row); ?></td>
					</tr>
				<?php endforeach; ?>	
			</table>
		</div>
		<?php endif;?>

		<div id="teamSelectorDiv">
            <div id=buttonDiv>
                <button id='restart' class="btn success" onclick="redirectTo('index.php')"> Return to main page </button>
            </div>
        </div>	

		<div id="footerDiv">
			<b>2023 Winners</b>: <b style="color: gold;">1. Bentown Tippers</b>,  <b style="color: silver;">2T. Dayville Daytrippers</b>, <b style="color: silver;">2T. Megtown Senders</b>
		</div>

	</div>
</body>
</html>

