<?php
namespace Application\Model;
use Application\Model\Bees;

class Queen extends Bees implements Soldier
{
  public $health;
  public $rank;
  public $attack;

  function __construct($soldiers) {
    $num_of_soldiers = $soldiers;
  }

  public function create() {
    $this->health = '100';
    $this->rank = 'queen';
    $this->attack = '7';
    $army = array();
    for($i=0;$i<=$num_of_soldiers;$i++) {

        $army[] = $this->buildSoldier('100','queen','7');

    }
    return $army;
  }

  private function buildSoldier($health,$rank,$attack) {
    $soldier['health'] = $health;
    $soldier['rank'] = $rank;
    $soldier['attack'] = $attack;
    $soldier['status'] = 'alive';
    print_r($soldier);
    return $soldier;
  }

}
