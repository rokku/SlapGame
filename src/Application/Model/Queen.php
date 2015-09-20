<?php
namespace Application\Model;
use Application\Model\Bees;

class Queen extends Bees implements Soldier
{
  public $health = 100;
  public $rank = 'queen';
  public $attack = '7';

  function __construct($soldiers) {
    $num_of_soldiers = $soldiers;
  }

  public function create() {

    $army = array();

    for($i=0;$i<=$this->num_of_soldiers;$i++) {

        $army[] = $this->buildSolider($this->health,$this->rank,$this->attack);

    }
    print_r($army);
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
