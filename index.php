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
<html>
  <head>
    <meta charset="utf-8">
    <title>SlappR!</title>
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
    <?=$showArmy;?>
        <a href="?hit">Hit</a> | <a href="?restart">Restart</a>



  </body>
</html>
