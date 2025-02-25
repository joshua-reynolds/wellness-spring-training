<?php
    session_start();
    include_once 'includes/dbconnect.inc.php';
    $new_runs = $_SESSION["new_runs"];
    $runs = $_SESSION["runs"];
    $team_name = $_SESSION["team_name"];
    $outs = $_SESSION["outs"];
    $remaining_attempts = $_SESSION["remaining_attempts"];
    $runner1 = $_SESSION["runner1"];
    $runner2 = $_SESSION["runner2"];
    $runner3 = $_SESSION["runner3"];
    $runners = array($runner1, $runner2, $runner3);
?>

<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Results</title>
	<link rel='stylesheet'  href="css/style.css">
	<script src="js/script.js"></script>
</head>





<body>

    <div id="headerDiv">
		
		<div id="logoDiv">
			<a href="https://wfrc.org/">
				<img src="graphics/WFRC logo long white_transparent.png" id="logo"  >
			</a>
		</div>

		<div id="titleDiv">
			<h1>
                <?php 
                    if ($_SESSION["bat_result"]==0){
                        echo 'Better luck next time, ' . $team_name;
                    } else {
                        echo 'Nice Work, ' . $team_name .'!';
                    };
                ?>
            </h1>
		</div>

	</div>

    <div class="flex-container">
        <div id="imageContentDiv">
            <div id="imageDiv">
                <?php
                    
                    switch ($_SESSION["bat_result"]){
                        case 0:
                            echo '<img id="image" src="graphics/ai_stadium - out.jpg" alt="out">';
                            echo "<script>var audio = new Audio('sound_effects/crowd-groan.mp3');audio.play(); </script>";
                            
                            break;
                        case 1:
                            echo '<img id="image" src="graphics/ai_stadium - single.jpg" alt="single">';
                            echo "<script>var audio = new Audio('sound_effects/Baseball_Hit_With_Cheer_Sound_Effect.mp3');audio.play(); </script>";
                            break;
                        case 2:
                            echo '<img id="image" src="graphics/ai_stadium - double.jpg" alt="double">';
                            echo "<script>var audio = new Audio('sound_effects/Baseball_Hit_With_Cheer_Sound_Effect.mp3');audio.play(); </script>";
                            break;
                        case 3:
                            echo '<img id="image" src="graphics/ai_stadium - triple.jpg" alt="triple">';
                            echo "<script>var audio = new Audio('sound_effects/Baseball_Hit_With_Cheer_Sound_Effect.mp3');audio.play(); </script>";
                            break;
                        case 4:
                            echo '<img id="image" src="graphics/ai_stadium - homerun fireworks.jpg" alt="homerun">';
                            echo "<script>var audio = new Audio('sound_effects/Baseball_Hit_With_Cheer_Sound_Effect.mp3');audio.play(); </script>";
                            break;

                    };
                    
                ?>
        </div>
        
        <div id="contentDiv3">
        
            <div id=runsP>
                <?php
                    if ($new_runs > 0){echo "$new_runs new run(s) were scored!!";}
                ?>
            </div>

            <div id=runsP>
                <?php
                    echo "Total Runs: $runs";
                ?>
            </div>

            <div id=outsP>
                <?php
                    echo "Current Outs: $outs";
                ?>
            </div>

            <div id=atBatsP>
                <?php
                    echo "Today's At-bats left: $remaining_attempts";
                    echo "<br><br>";
                ?>
            </div>

            <div id=runnersDiv>
                <?php
                    // current runners (query database)
                    if (in_array(1, $runners) == true && in_array(2, $runners) == true && in_array(3, $runners) == true){
                        echo '<img id=bases src="graphics/bases-first-second-third.png" alt="homerun">';
                        echo "<br><br>";
                    }
                    elseif(in_array(1, $runners) == true && in_array(2, $runners) == true  && in_array(3, $runners) == false){
                        echo '<img id=bases src="graphics/bases-first-second.png" alt="homerun"';
                        echo "<br><br>";
                    }
                    elseif(in_array(1, $runners) == true && in_array(2, $runners) == false  && in_array(3, $runners) == true){
                        echo '<img id=bases src="graphics/bases-first-third.png" alt="homerun"';
                        echo "<br><br>";
                    }
                    elseif(in_array(1, $runners) == false && in_array(2, $runners) == true  && in_array(3, $runners) == true){
                        echo '<img id=bases src="graphics/bases-second-third.png" alt="homerun"';
                        echo "<br><br>";
                    }
                    elseif(in_array(1, $runners) == true && in_array(2, $runners) == false  && in_array(3, $runners) == false){
                        echo '<img id=bases src="graphics/bases-first-only.png" alt="homerun"';
                        echo "<br><br>";
                    }
                    elseif(in_array(1, $runners) == false && in_array(2, $runners) == true  && in_array(3, $runners) == false){
                        echo '<img id=bases src="graphics/bases-second-only.png" alt="homerun"';
                        echo "<br><br>";
                    }
                    elseif(in_array(1, $runners) == false && in_array(2, $runners) == false  && in_array(3, $runners) == true){
                        echo '<img id=bases src="graphics/bases-third-only.png" alt="homerun"';
                        echo "<br><br>";
                    }
                    elseif(in_array(1, $runners) == false && in_array(2, $runners) == false  && in_array(3, $runners) == false){
                        echo '<img id=bases src="graphics/bases-empty.png" alt="homerun"';
                        echo "<br><br>";
                    }
                ?>
            </div>

		</div>


        <div id="teamSelectorDiv">
            <div id=buttonDiv>
                <button id='restart' class="btn success" onclick="redirectTo('index.php')"> Return to main page </button>
            </div>
        </div>	

        </div>
        
        
    </div>
    <div id="footerDiv">
			<b>2024 Winners</b>: <b style="color: EFBF04;">1. Bentown Tippers</b>,  <b style="color: A5A9B4;">2. Billville Jovyans</b>, <b style="color: CD7F32;">3. Dayville Daytrippers</b>
	</div>
</body>


</html>