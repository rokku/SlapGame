<?php
session_start();
// Ad model domain -- models do the tasks.
// Add control domain -- controls ask for the tasks.
// Add view -- views show the task results.

// Start composer
require_once __DIR__ . '/vendor/autoload.php';


/**
 * Welcome to BeeSlap!
 * @author Mark Bridgeman <mark.bridgeman@gmail.com>
 * @link http://slap.bridgeman.eu
**/

if(array_key_exists('hit',$_GET)) {

  $attack = new SlapGame\Combat\Battle();
  $attack->startAttack();

  foreach($_SESSION["bees"] AS $key=>$value) {
    $showArmy .= '<li id="bee'.$key.'" class="'.$value['status'].' '.$value['rank'].'">'.$value['rank'].' #'.$key.' - hp: '.$value['health'].' '.$value['status'].'</li>';
  }
}

elseif(isset($_GET['restart'])) {
  unset($_SESSION['bees']);
  header("Location: index.php");
}

else {
  $army = new SlapGame\Army\Bees();
  $buildArmy = $army->buildArmy(3,5,7);

  $_SESSION["bees"] = $buildArmy;

  foreach($_SESSION["bees"] AS $key=>$value) {
    $showArmy .= '<li id="bee'.$key.'" class="'.$value['status'].' '.$value['rank'].'">'.$value['rank'].' #'.$key.' - hp: '.$value['health'].' '.$value['status'].'</li>';
  }
  $showArmy = $showArmy;
}

?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>SlappR!</title>
    <link href="vendor/twbs/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet" media="screen">
    <style type="text/css">
      li.dead {background:#efefef;}
      body {
        padding-top: 60px; /* 60px to make the container go all the way to the bottom of the topbar */
      }
    </style>
  </head>
  <body>
    <div class="container">
      <h2>Slap-A-Bee</h2>
      <ul>
        <?=$showArmy;?>
      </ul>
      <p>
        <a href="?hit" class="btn btn-danger" type="button">Hit</a> <a href="?restart" class="btn btn-primary" type="button">Restart</a>
</p>
      </div>
        <script src="http://code.jquery.com/jquery.js"></script>
        <script src="vendor/twbs/bootstrap/dist/js/bootstrap.min.js"></script>
  </body>
</html>
