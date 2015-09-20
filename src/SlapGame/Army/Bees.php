<?php
namespace SlapGame\Army;
use SlapGame\Army\Queen;
use SlapGame\Army\Worker;
use SlapGame\ArmyDrone;

interface Soldier {

  public function create($army);

}

class Bees
{

  public function buildArmy($queen,$worker,$drone) {

    $army = array();

    //Build queens
    $queens = new Queen($queen);
    $army = $queens->create($army);

    //Build workers
    $workers = new Worker($worker);
    $army = $workers->create($army);

    //Build drones
    $drones = new Drone($drone);
    $army = $drones->create($army);

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
