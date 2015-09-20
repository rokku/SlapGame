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
    $queens = new Queen(3);
    $queenSoldiers = $queens->create();
    print_r($queenSoldiers);
    //Build workers
    $workers = new Worker(5);
    $workerSoldiers = $workers->create();

    //Build drones
    $drones = new Drone(7);
    $droneSoldiers = $drones->create();

    array_push($army,$queenSoldiers);
    echo 'army';
    print_r($army);
    array_push($army,$workerSoldiers);
    array_push($army,$droneSoldiers);

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
