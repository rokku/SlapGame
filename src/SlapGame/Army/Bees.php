<?php
namespace SlapGame\Army;
use SlapGame\Army\Queen;
use SlapGame\Army\Worker;
use SlapGame\Army\Drone;

interface Soldier {

  public function create($army);
  public function buildSoldier($health,$rank,$attack);

}

/**
 * We're building an army of bees!
 * A Bees subclass, which controls the building of the Army,
 * with subclasses for each soldier type.
 * The number of soldiers per rank are set in /index.php; we
 * could always allow for people to choose how many of each they
 * face off against. We could also look to allow the bees to fight back!
**/

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

}
?>
