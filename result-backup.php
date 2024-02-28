<?php
    session_start();
?>

<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
                echo '<img id="image" src="graphics/out.png" alt="out">';
                echo "<script>var audio = new Audio('sound_effects/crowd-groan.mp3');audio.play(); </script>";
                echo "<br><br>";
                echo 'Better luck next time';
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
        echo "<br><br>";
        $new_runs = $_SESSION["new_runs"];
        $runs = $_SESSION["runs"];
        $team_name = $_SESSION["team_name"];
        $outs = $_SESSION["outs"];
        $runner1 = $_SESSION["runner1"];
        $runner2 = $_SESSION["runner2"];
        $runner3 = $_SESSION["runner3"];
        $runners = array($runner1, $runner2, $runner3);
        
        if ($new_runs > 0){echo "$new_runs new run(s) were scored! <br><br>";}
        echo "Total runs for the <b>$team_name</b>: $runs <br>";
        echo "Current outs: $outs";
        echo "<br><br>";


        
        // current runners (query database)
        if (in_array(1, $runners) == true && in_array(2, $runners) == true && in_array(3, $runners) == true){
            echo '<img src="graphics/bases-first-second-third.png" alt="homerun" width="173" height="168" style="outline-style: solid;">';
            echo "<br><br>";
        }
        elseif(in_array(1, $runners) == true && in_array(2, $runners) == true  && in_array(3, $runners) == false){
            echo '<img src="graphics/bases-first-second.png" alt="homerun" width="173" height="168" style="outline-style: solid;">';
            echo "<br><br>";
        }
        elseif(in_array(1, $runners) == true && in_array(2, $runners) == false  && in_array(3, $runners) == true){
            echo '<img src="graphics/bases-first-third.png" alt="homerun" width="173" height="168" style="outline-style: solid;">';
            echo "<br><br>";
        }
        elseif(in_array(1, $runners) == false && in_array(2, $runners) == true  && in_array(3, $runners) == true){
            echo '<img src="graphics/bases-second-third.png" alt="homerun" width="173" height="168" style="outline-style: solid;">';
            echo "<br><br>";
        }
        elseif(in_array(1, $runners) == true && in_array(2, $runners) == false  && in_array(3, $runners) == false){
            echo '<img src="graphics/bases-first-only.png" alt="homerun" width="173" height="168" style="outline-style: solid;">';
            echo "<br><br>";
        }
        elseif(in_array(1, $runners) == false && in_array(2, $runners) == true  && in_array(3, $runners) == false){
            echo '<img src="graphics/bases-second-only.png" alt="homerun" width="173" height="168" style="outline-style: solid;">';
            echo "<br><br>";
        }
        elseif(in_array(1, $runners) == false && in_array(2, $runners) == false  && in_array(3, $runners) == true){
            echo '<img src="graphics/bases-third-only.png" alt="homerun" width="173" height="168" style="outline-style: solid;">';
            echo "<br><br>";
        }
        elseif(in_array(1, $runners) == false && in_array(2, $runners) == false  && in_array(3, $runners) == false){
            echo '<img src="graphics/bases-empty.png" alt="homerun" width="173" height="168" style="outline-style: solid;">';
            echo "<br><br>";
        }

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