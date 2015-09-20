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

  $attack = new Application\Controller\Battle();
  $attack->startAttack();

  foreach($_SESSION["bees"] AS $key=>$value) {
    $showArmy .= '<li id="bee'.$key.'" class="'.$value['status'].'">'.$value['rank'].' #'.$key.' - hp: '.$value['health'].' '.$value['status'].'</li>';
  }
}

elseif(isset($_GET['restart'])) {
  unset($_SESSION['bees']);
  header("Location: index.php");
}

else {
  $army = new Application\Model\Bees();
  $buildArmy = $army->buildArmy(3,5,7);
  print_r($buildArmy);echo 'done?';
  $_SESSION["bees"] = $buildArmy;
print_r($_SESSION["bees"]);echo 'done?';
  foreach($_SESSION["bees"] AS $key=>$value) {
    $showArmy .= '<li id="bee'.$key.'" class="'.$value['status'].'">'.$value['rank'].' #'.$key.' - hp: '.$value['health'].' '.$value['status'].'</li>';
  }
  $showArmy = 'New game'.$showArmy;
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


    <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
          <a class="brand" href="#">Slap The Bee!</a>

          <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <div class="nav-collapse collapse">
            <ul class="nav">
              <li class="active"><a href="#">Restart</a></li>
              <li><a href="http://github.com/rokku/SlapGame">Github</a></li>
              <li><a href="mark.bridgeman@gmail.com">Contact</a></li>
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>

    <div class="container">
      <ul>
        <?=$showArmy;?>
      </ul>
        <a href="?hit" class="btn btn-danger" type="button">Hit</a> | <a href="?restart" class="btn btn-primary" type="button">Restart</a>

      </div>
        <script src="http://code.jquery.com/jquery.js"></script>
        <script src="vendor/twbs/bootstrap/dist/js/bootstrap.min.js"></script>
  </body>
</html>
