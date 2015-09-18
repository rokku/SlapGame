<?php

/**
 * Welcome to BeeSlap!
 * @author Mark Bridgeman <mark.bridgeman@gmail.com>
 * @link http://slap.bridgeman.eu
**/

// build 15 items. 3 Qs, 5 Ws, 7 Ds.


$health;
$health['queen'] = '100';
$health['worker'] = '75';
$health['drone'] = '50';

class Army
{
//  function __construct() { print "in army";}

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

  private function buildSoldier($type,$unit) {
	global $health;
    $soldier[$type][] = $health[$type];
    return $soldier;

  }

}

$army = new Army();

$bees = $army->buildArmy(3,5,7);

//print_r($bees);

?>
