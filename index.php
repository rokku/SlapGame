<?php

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

// build 15 items. 3 Qs, 5 Ws, 7 Ds.

/*
class Bees extends ArrayObject
{
//  function __construct() { print "in army";}

  protected $_type = array(
                      'queen' => array('attack' => 7, 'health' => 100),
                      'worker' => array('attack' => 12, 'health' => 75),
                      'drone' => array('attack' => 18, 'health' => 80)
                    );


  public function buildArmy($queen,$worker,$drone) {

    $army = array();
    //Build queens

    for($i=1;$i<=$queen;$i++) {
      $army[] = $this->buildSoldier('queen',$i);
    }

    //Build workers
    for($i=1;$i<=$worker;$i++) {
      $army[] = $this->buildSoldier('worker',$i);
    }
    //Build drones
    for($i=1;$i<=$drone;$i++) {
      $army[] = $this->buildSoldier('drone',$i);
    }
    return $army;
  }

  private function buildSoldier($rank,$unit) {
	//print_r($this->_type);
    $soldier['health'] = $this->_type[$rank]['health'];
    $soldier['attack'] = $this->_type[$rank]['attack'];
    $soldier['status'] = 'alive';
    $soldier['rank'] = $rank;
    return $soldier;

  }

}

class Attack
{

  public function startAttack() {

    // Attacking! First, choose a bee to attack
    // @todo We could always put in a roll here to see whether the attack actually hits
    // but apparently we're really sharp so all hits are 100% likely to land.

    $target = $this->chooseBee(); // target acquired
    echo $target;
    $this->hit($target); // Hit the bee, and proceed.

  }

  private function chooseBee() {
    // Only choose bees that are live (hp > 0)
    $target = array_rand($_SESSION['bees']);
    if($_SESSION['bees'][$target]['status']=='dead') {$target = $this->chooseBee();}
    return $target;
  }
  private function hit($bee) {

    //echo 'This bee: '.$target.'<br/>';

    $health = (int)$_SESSION["bees"][$bee]['health'];
    //echo 'Health '.$health.'<br/>';
    $attackValue = (int)$_SESSION["bees"][$bee]['attack'];
    //echo 'Attack: '.$attackValue;
    $health = $health-$attackValue;
    if($health <=0) {
      $_SESSION["bees"][$bee]["status"]="dead"; echo 'KILL SHOT!';
    }
    $_SESSION["bees"][$bee]["health"] = $health;
    //echo '<br/>';
  }

}*/

class Inventory {

  public function displayBees() {

  }

  private function countQueens() {

  }

}

if(array_key_exists('hit',$_GET)) {

  echo 'Preparing to hit';
  $attack = new Battle;
  $attack->startAttack();

  foreach($_SESSION["bees"] AS $key=>$value) {
    $showArmy .= '<li id="bee'.$key.'" class="'.$value['status'].'">'.$value['rank'].' #'.$key.' - hp: '.$value['health'].' '.$value['status'].'</li><br/>';
  }
  echo $showArmy;
}

elseif(isset($_GET['restart'])) {
  unset($_SESSION['bees']);
  header("Location: index.php");
}

else {
  $army = new Application\Model\Bees();
  $buildArmy = $army->buildArmy(3,5,7);

  $_SESSION["bees"] = array();
  $_SESSION["bees"] = $buildArmy;

  foreach($buildArmy AS $key=>$value) {
    $showArmy .= '<li id="bee'.$key.'" class="'.$value['status'].'">'.$value['rank'].' #'.$key.' - hp: '.$value['health'].' '.$value['status'].'</li><br/>';
  }
  echo 'New game'; echo $showArmy;
}

?>

    <a href="?hit">Hit</a> | <a href="?restart">Restart</a>

    <style type="text/css">
     a {   display: block;
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
