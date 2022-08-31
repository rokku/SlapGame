<?php
namespace SlapGame\Army;
use SlapGame\Army\Bees;

class Drone extends Bees implements Soldier
{
  // Set the stats for this soldier type.
  public $health = 50;
  public $rank = 'drone';
  public $attack = 15;

  function __construct($soldiers) {
    // Set the number of soldiers of this type.
    $this->num_of_soldiers = $soldiers;
  }



}
