<?php
namespace SlapGame\Army;
use SlapGame\Army\Bees;

class Queen extends Bees implements Soldier
{
  // Set the stats for this soldier type.
  public $health = 100;
  public $rank = 'queen';
  public $attack = 7;

  function __construct($soldiers) {
    // Set the number of soldiers of this type.
    $this->num_of_soldiers = $soldiers;
  }

}
