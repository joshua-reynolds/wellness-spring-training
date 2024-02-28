<?php
    session_start();
    include_once 'includes/dbconnect.inc.php';
    $new_runs = $_SESSION["new_runs"];
    $runs = $_SESSION["runs"];
    $team_name = $_SESSION["team_name"];
    $outs = $_SESSION["outs"];
    $runner1 = $_SESSION["runner1"];
    $runner2 = $_SESSION["runner2"];
    $runner3 = $_SESSION["runner3"];
    $runners = array($runner1, $runner2, $runner3);
?>

<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Results</title>
	<link rel='stylesheet'  href="main.css">
	<script src="script.js"></script>
</head>





<body>

    <div id="headerDiv">
		
		<div id="logoDiv">
			<a href="https://wfrc.org/">
				<img src="graphics/logo.png" id="logo"  >
			</a>
		</div>

		<div id="titleDiv">
			<h1>
                <?php 
                    if ($_SESSION["bat_result"]==0){
                        echo 'Better luck next time';
                    } else {
                        echo 'Nice Work!';
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
                            echo '<img id="image" src="graphics/out.png" alt="out">';
                            echo "<script>var audio = new Audio('sound_effects/crowd-groan.mp3');audio.play(); </script>";
                            
                            break;
                        case 1:
                            echo '<img id="image" src="graphics/single.png" alt="single">';
                            echo "<script>var audio = new Audio('sound_effects/Baseball_Hit_With_Cheer_Sound_Effect.mp3');audio.play(); </script>";
                            break;
                        case 2:
                            echo '<img id="image" src="graphics/double.png" alt="double">';
                            echo "<script>var audio = new Audio('sound_effects/Baseball_Hit_With_Cheer_Sound_Effect.mp3');audio.play(); </script>";
                            break;
                        case 3:
                            echo '<img id="image" src="graphics/triple.png" alt="triple">';
                            echo "<script>var audio = new Audio('sound_effects/Baseball_Hit_With_Cheer_Sound_Effect.mp3');audio.play(); </script>";
                            break;
                        case 4:
                            echo '<img id="image" src="graphics/homerun_fireworks.png" alt="homerun">';
                            echo "<script>var audio = new Audio('sound_effects/Baseball_Hit_With_Cheer_Sound_Effect.mp3');audio.play(); </script>";
                            break;

                    };
                    
                ?>
        </div>
        
        <div id="contentDiv3">
            <div id=runsP>
                <?php
                    echo "<b>$team_name</b>";
                ?>
            </div>
        
            <div id=runsP>
                <?php
                    if ($new_runs > 0){echo "$new_runs new run(s) were scored!!";}
                ?>
            </div>

            <div id=runsP>
                <?php
                    echo "Total runs: $runs";
                ?>
            </div>

            <div id=outsP>
                <?php
                    echo "Current outs: $outs";
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
                        echo '<img src="graphics/bases-first-third.png" alt="homerun"';
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
			<b>2023 Winners</b>: <b style="color: gold;">1. Bentown Tippers</b>,  <b style="color: silver;">2T. Dayville Daytrippers</b>, <b style="color: silver;">2T. Megtown Senders</b>
	</div>
</body>


</html>