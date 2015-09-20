<?php
namespace Application\Model;

class Bees
{

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
?>
