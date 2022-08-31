<?php
namespace SlapGame\Army;
use SlapGame\Army\Bees;

class Worker extends Bees implements Soldier
{
  // Set the stats for this soldier type.
  public $health = 75;
  public $rank = 'worker';
  public $attack = 12;

  function __construct($soldiers) {
    // Set the number of soldiers of this type.
    $this->num_of_soldiers = $soldiers;
  }


}
