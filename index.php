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

  protected $type = array(
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

$soldier['health'] = $this->type[$rank]['health']; 	  $soldier['rank'] = $rank;
    return $soldier;
  }

}

$army = new Bees();

$_SESSION['bees'] = array();

$bees = $army->buildArmy(3,5,7);

$_SESSION['bees'] = $bees;

foreach($bees AS $key=>$value) {
  echo $value['rank'].' #'.$key.' - hp: '.$value['health'].'<br/>';
}

print_r($_SESSION);

?>
