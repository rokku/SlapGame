<?php
namespace SlapGame\Army;
use SlapGame\Army\Bees;

class Worker extends Bees implements Soldier
{
  // Set the stats for this soldier type.
  public $health = 75;
  public $rank = 'worker';
  public $attack = '12';

  function __construct($soldiers) {
    // Set the number of soldiers of this type.
    $this->num_of_soldiers = $soldiers;
  }

  public function create($army) {
    if(!$army) {
      throw new Exception('No army is available');
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
      throw new Exception('Any new soldier needs all stats to be presented');
    }
    $soldier['health'] = $health;
    $soldier['rank'] = $rank;
    $soldier['attack'] = $attack;
    $soldier['status'] = 'alive';

    return $soldier;
  }

}
