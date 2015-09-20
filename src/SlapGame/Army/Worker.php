<?php
namespace SlapGame\Army;
use SlapGame\Army\Bees;

class Worker extends Bees implements Soldier
{
  public $health = 75;
  public $rank = 'worker';
  public $attack = '12';

  function __construct($soldiers) {
    $this->num_of_soldiers = $soldiers;
  }

  public function create($army) {

    for($i=1;$i<=$this->num_of_soldiers;$i++) {

        $army[] = $this->buildSoldier($this->health,$this->rank,$this->attack);

    }
    return $army;
  }

  private function buildSoldier($health,$rank,$attack) {
    $soldier['health'] = $health;
    $soldier['rank'] = $rank;
    $soldier['attack'] = $attack;
    $soldier['status'] = 'alive';

    return $soldier;
  }

}