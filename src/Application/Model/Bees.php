<?php
namespace Application\Model;
use Application\Model\Queen;
use Application\Model\Worker;
use Application\Model\Drone;

interface Soldier {

  public function create();

}

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
    $queens = new Queen($queen);
    $queenSoldiers = $queens->create();

    //Build workers
    $workers = new Worker($worker);
    $workerSoldiers = $workers->create();

    //Build drones
    $drones = new Drone($drone);
    $droneSoldiers = $drones->create();

    array_merge($army,$queenSoldiers);
    array_merge($army,$workerSoldiers);
    array_merge($army,$droneSoldiers);
print_r($army);
    return $army;
  }

  private function buildSoldier($rank,$unit) {

    $soldier['health'] = $this->_type[$rank]['health'];
    $soldier['attack'] = $this->_type[$rank]['attack'];
    $soldier['status'] = 'alive';
    $soldier['rank'] = $rank;
    return $soldier;

  }

}
?>
