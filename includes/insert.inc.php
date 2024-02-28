<?php
  session_start();
  include_once 'dbconnect.inc.php';
  include_once 'runBases.inc.php';

  //--------------------------------------
  // add bat result to the database
  //--------------------------------------

  // team id
  $team_name = $_POST['team_name'];
  $sqli2 = "SELECT team_id, name, runner1, runner2, runner3, runs, outs FROM teams";
  $result2 = mysqli_query($conn, $sqli2);
  $rows2 = array();
  while($r = mysqli_fetch_assoc($result2)) {
    $rows2[] = $r;
  }
  $names = array_column($rows2, 'name');
  $key = array_search($team_name, $names, true);
  $t_id = $rows2[$key]['team_id'];
  $runner1 = $rows2[$key]['runner1'];
  $runner2 = $rows2[$key]['runner2'];
  $runner3 = $rows2[$key]['runner3'];
  $runs = $rows2[$key]['runs'];
  $outs = $rows2[$key]['outs'];

  // date
  date_default_timezone_set('America/Denver');
  $bat_date = date('Y-m-d H:i:s');

  // bat result
  $bat_result = rand(0,4);

  // prepare dynamic query statement
  $sql = "INSERT INTO bats (bat_result, bat_date, team_id) 
              VALUES (?, ?, ?)";

  $stmt = $conn->prepare($sql);
  $stmt->bind_param('isi' , $bat_result,  $bat_date, $t_id);
  $stmt->execute();

  //--------------------------------------
  // update runners and runs in database
  //--------------------------------------

  $rbResult = runBases($bat_result, $runner1, $runner2, $runner3, $outs);
  $runs = $runs + $rbResult[3];

  $sql2 = "UPDATE teams SET runner1=?, runner2=?, runner3=?, runs=?, outs=? WHERE team_id=?";

  $stmt2 = $conn->prepare($sql2);
  $stmt2->bind_param('iiiiii' , $rbResult[0],  $rbResult[1], $rbResult[2], $runs, $rbResult[4], $t_id);
  $stmt2->execute();


  // session variables
  $_SESSION["t_id"] = $t_id;
  $_SESSION["team_name"] = $team_name;
  $_SESSION["bat_result"] = $bat_result;
  $_SESSION["runner1"] = $rbResult[0];
  $_SESSION["runner2"] = $rbResult[1];
  $_SESSION["runner3"] = $rbResult[2];
  $_SESSION["new_runs"] = $rbResult[3];
  $_SESSION["runs"] = $runs;
  $_SESSION["outs"] = $rbResult[4];


  // header("Location: ../index.php?bat=success");
  header("Location: ../result.php");
