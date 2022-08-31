<?php
namespace SlapGame\Army;
use SlapGame\Army\Queen;
use SlapGame\Army\Worker;
use SlapGame\Army\Drone;
use Exception;

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

  public function create($army) {
    if(!$army) {
      echo 'No army is available';
    }
    // Create the soldiers for this subclass type, and push into
    // the $army array();

    for($i=1;$i<=$this->num_of_soldiers;$i++) {
        try {
          $army[] = $this->buildSoldier($this->health,$this->rank,$this->attack);
        } catch(Exception $e) {
          echo 'Error: could not create this soldier - ', $e->getMessage(), "\n";
        }
    }
    return $army;
  }

  public function buildSoldier($health,$rank,$attack) {
    if(!$health || !$rank || !$attack) {
      echo 'Any new soldier needs all stats to be presented';
    }
    $soldier['health'] = $health;
    $soldier['rank'] = $rank;
    $soldier['attack'] = $attack;
    $soldier['status'] = 'alive';

    return $soldier;
  }

}
?>
