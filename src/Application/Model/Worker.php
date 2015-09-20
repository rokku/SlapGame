<?php
namespace Application\Model;
use Application\Model\Bees;

class Worker extends Bee implements Soldier
{
  $health = 75;
  $rank = 'worker';
  $attack = '12';

  function __construct($soldiers) {
    $num_of_soldiers = $soldiers;
  }

  public function create() {

    $army = array();

    for($i=0;$i<=$num_of_soldiers;$i++) {

        $army[] = $this->buildSoldier($health,$rank,$attack);

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
