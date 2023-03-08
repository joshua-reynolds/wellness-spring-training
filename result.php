<?php
    session_start();
?>

<html>

<head>
    <title>Results</title>
	<link rel='stylesheet'  href="main.css">
	<script src="script.js"></script>
</head>

<div class="topnav">
    <header>
        <h1 align="left">Nice Work!</h1>
    </header>
</div>



<body>

    <div class="content">
        <?php
        include_once 'includes/dbconnect.inc.php';

    
        switch ($_SESSION["bat_result"]){
            case 0:
                echo '<img src="graphics/out.png" alt="out" width="504.9" height="342.375" style="outline-style: solid;">';
                echo "<script>var audio = new Audio('sound_effects/crowd-groan.mp3');audio.play(); </script>";
                echo "<br><br>";
                echo 'Better luck next time';
                break;
            case 1:
                echo '<img src="graphics/single.png" alt="single" width="504.9" height="342.375" style="outline-style: solid;">';
                echo "<script>var audio = new Audio('sound_effects/Baseball_Hit_With_Cheer_Sound_Effect.mp3');audio.play(); </script>";
                break;
            case 2:
                echo '<img src="graphics/double.png" alt="double" width="504.9" height="342.375" style="outline-style: solid;">';
                echo "<script>var audio = new Audio('sound_effects/Baseball_Hit_With_Cheer_Sound_Effect.mp3');audio.play(); </script>";
                break;
            case 3:
                echo '<img src="graphics/triple.png" alt="triple" width="504.9" height="342.375" style="outline-style: solid;">';
                echo "<script>var audio = new Audio('sound_effects/Baseball_Hit_With_Cheer_Sound_Effect.mp3');audio.play(); </script>";
                break;
            case 4:
                echo '<img src="graphics/homerun_fireworks.png" alt="homerun" width="504.9" height="342.375" style="outline-style: solid;">';
                echo "<script>var audio = new Audio('sound_effects/Baseball_Hit_With_Cheer_Sound_Effect.mp3');audio.play(); </script>";
                break;

        };
        echo "<br><br>";
        $new_runs = $_SESSION["new_runs"];
        $runs = $_SESSION["runs"];
        $team_name = $_SESSION["team_name"];
        $outs = $_SESSION["outs"];
        
        if ($new_runs > 0){echo "$new_runs new run(s) were scored! <br><br>";}
        echo "Total runs for the <b>$team_name</b>: $runs <br>";
        echo "Current outs: $outs";


        
        // current runners (query database)

        ?>
        <br>
        <br>
        <button id='restart' class="btn success" onclick="redirectTo('index.php')"> Return to main page </button>
        <br>

        <!-- see standings?-->
    </div>
    
    <div class="footer">
  		<p> </p>
	</div>


</body>


</html>