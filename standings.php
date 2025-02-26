<html>

<head>
	<meta name="viewport" content="initial-scale=1,maximum-scale=1,user-scalable=no" />
	<title>Wellness Spring Training</title>
	<link rel='stylesheet'  href="css/style.css?v=<?php echo time(); ?>">
	<script src="js/script.js"></script>
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
				<img src="graphics/WFRC logo long white_transparent.png" id="logo"  >
			</a>
		</div>

		<div id="titleDiv">
			<h1 >Standings</h1>
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
		<br>
		<div id="teamSelectorDiv">
            <div id=buttonDiv>
                <button id='restart' class="btn success" onclick="redirectTo('index.php')"> Return to main page </button>
            </div>
        </div>	

		<div id="footerDiv">
			<b>2024 Winners</b>: <b style="color: EFBF04;">1. Bentown Tippers</b>,  <b style="color: A5A9B4;">2. Billville Jovyans</b>, <b style="color: CD7F32;">3. Dayville Daytrippers</b>
		</div>

	</div>
</body>
</html>

