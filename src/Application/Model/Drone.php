<?php
namespace Application\Model;
use Application\Model\Bees;

class Drone extends Bees implements Soldier
{
  public $health = 50;
  public $rank = 'drone';
  public $attack = '15';

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
