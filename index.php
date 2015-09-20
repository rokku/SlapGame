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
    $showArmy .= '<li id="bee'.$key.'" class="'.$value['status'].'">'.$value['rank'].' #'.$key.' - hp: '.$value['health'].' '.$value['status'].'</li><br/>';
  }
}

elseif(isset($_GET['restart'])) {
  unset($_SESSION['bees']);
  header("Location: index.php");
}

else {
  $army = new Application\Model\Bees();
  $buildArmy = $army->buildArmy(3,5,7);
  $_SESSION["bees"] = $buildArmy;

  foreach($buildArmy AS $key=>$value) {
    $showArmy .= '<li id="bee'.$key.'" class="'.$value['status'].'">'.$value['rank'].' #'.$key.' - hp: '.$value['health'].' '.$value['status'].'</li><br/>';
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
      a {
        display: block;
        width: 200px;
        font-size: 50px;
        background: #ff0000;
        color: #fff;
        text-align: center;
        text-decoration: none;
        font-family: sans-serif;
        float:left;
      }

      li.dead {background:#efefef;}
  </style>
  </head>
  <body>


    <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
          <a class="brand" href="#">Slap The Bee!</a>
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
    <?=$showArmy;?>
        <a href="?hit" class="btn btn-danger">Hit</a> | <a href="?restart" class="btn btn-primary">Restart</a>

      </div>
        <script src="http://code.jquery.com/jquery.js"></script>
        <script src="vendor/twbs/bootstrap/dist/js/bootstrap.min.js"></script>
  </body>
</html>
