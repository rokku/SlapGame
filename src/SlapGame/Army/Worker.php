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

    // Create the soldiers for this subclass type, and push into
    // the $army array();

    for($i=1;$i<=$this->num_of_soldiers;$i++) {

        $army[] = $this->buildSoldier($this->health,$this->rank,$this->attack);

    }
    return $army;
  }

  public function buildSoldier($health,$rank,$attack) {
    $soldier['health'] = $health;
    $soldier['rank'] = $rank;
    $soldier['attack'] = $attack;
    $soldier['status'] = 'alive';

    return $soldier;
  }

}
