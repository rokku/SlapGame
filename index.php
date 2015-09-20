<?php
session_start();

/**
 * Welcome to BeeSlap!
 * @author Mark Bridgeman <mark.bridgeman@gmail.com>
 * @link http://slap.bridgeman.eu
 *
 * My attempt here was to create as simple-as-possible an
 * application to demonstrate the Bee Slap game, while
 * retaining OOP principles, allow for future extensability
 * but not result in bloated code.
 *
**/

// Start composer
require_once __DIR__ . '/vendor/autoload.php';

/**
  * If this is a hit, we
  * want to run a battle round
**/

if(array_key_exists('hit',$_GET)) {

  // Load the Battle class.
  $attack = new SlapGame\Combat\Battle();
  // startAttack commits a hit against a target, and calculates damage.
  $hit = $attack->startAttack();

  $showArmy = '<h3>A bee was hit for '.$hit['attackValue'].'!</h3>';
  // Display the bees. This could be nicer.
  foreach($_SESSION["bees"] AS $key=>$value) {
    if($key == $hit['bee']) {$addclass = ' hit';} else {$addclass='';}
    $showArmy .= '<li id="bee'.$key.'" class="'.$value['status'].' '.$value['rank'].''.$addclass.'">'.$value['rank'].' #'.$key.' - hp: '.$value['health'].'</li>';
  }
}

elseif(isset($_GET['restart'])) {
  /**
   * Simply remove the session
   * and start the game fresh
  **/
  unset($_SESSION['bees']);
  header("Location: index.php");
}

else {
  /**
   * Generate a new army of bees, and
   * prepare for battle!
  **/

  $army = new SlapGame\Army\Bees();
  $buildArmy = $army->buildArmy(3,5,7);

  $_SESSION["bees"] = $buildArmy;

  foreach($_SESSION["bees"] AS $key=>$value) {
    $showArmy .= '<li id="bee'.$key.'" class="'.$value['status'].' '.$value['rank'].'">'.$value['rank'].' #'.$key.' - hp: '.$value['health'].'</li>';
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
      body {
          padding-top: 60px;
          /* 60px to make the container go all the way to the bottom of the topbar */
      }
      li {
          display: block;
          width: 18%;
          height: 60px;
          padding: 10px;
          border: 1px solid #ccc;
          float: left;
          margin: 10px;
      }
      li. ul {
          display: block width: 100%;
          clear: both;
      }
      a {
          clear: both;
      }
      li.queen {
          background: purple;
          color: #fff;
      }
      li.worker {
          background: orange;
      }
      li.drone {
          background: #ccc;
      }
      li.hit {
          border: 3px solid #f00;
          background: #f00;
          color:#fff;
      }
      li.dead {
          background: #000;
          color: #ccc;
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
