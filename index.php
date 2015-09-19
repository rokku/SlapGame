<?php

/**
 * Welcome to BeeSlap!
 * @author Mark Bridgeman <mark.bridgeman@gmail.com>
 * @link http://slap.bridgeman.eu
**/

// build 15 items. 3 Qs, 5 Ws, 7 Ds.


class Bees
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

    $_SESSION['bees'] = array();
    $_SESSION['bees'] = $army;
  }

  private function buildSoldier($rank,$unit) {
	//print_r($this->_type);
    $soldier['health'] = $this->_type[$rank]['health'];
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

    $this->hit($target); // Hit the bee, and proceed.

  }

  private function chooseBee() {
    // Only choose bees that are live (hp > 0)
    $target = array_rand($_SESSION['bees']);
    return $target;
  }
  private function hit($bee) {

    $rank = $bee['rank'];
    $health = (int)$bee['health'];
    $attackValue = (int)$this->_type[$rank]['attack'];
    $health = $health-$attackValue;

    print_r($bee);
  }

  private function getHealth($bee)
  {
    # code...
  }

  public function isDead($bee)
  {
    # code...
  }
}

class Inventory {

  public function displayBees() {

  }

  private function countQueens() {

  }

}


$army = new Bees();

if(!$_SESSION['bees']) {
  $army->buildArmy(3,5,7);
}

foreach($_SESSION['bees'] AS $key=>$value) {
  echo $value['rank'].' #'.$key.' - hp: '.$value['health'].'<br/>';
}

if(isset($_GET['hit'])) {
  $attack = new Attack;
  $attack->startAttack();
}

?>

<a href="?hit">Hit</a> | <a href="?restart">Restart</a>
