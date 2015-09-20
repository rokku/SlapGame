<?php
namespace Application\Model;
use Application\Model\Bees;

class Drone extends Bees implements Soldier
{
  protected $health = 50;
  protected $rank = 'drone';
  protected $attack = '15';

  function __construct($soldiers) {
    $num_of_soldiers = $soldiers;
  }

  public function create() {

    $army = array();

    for($i=0;$i<=$num_of_soldiers;$i++) {

        $army[] = $this->buildSolider($health,$rank,$attack);

    }
    return $army;
  }

  private function buildSolider($health,$rank,$attack) {
    $soldier['health'] = $health;
    $soldier['rank'] = $rank;
    $soldier['attack'] = $attack;
    $soldier['status'] = 'alive';
    return $soldier;
  }

}