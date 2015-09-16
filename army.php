<?php

interface Attack
{
  public function makeAttack($bee);
  public function reportAttack($bee,$hit);
  public function reduceHealth($bee);
}

interface Bee
{
  public function createBee($type);
  public function getHealth($bee);
}


class Hive implements Bee
{
  private $army = array();

  // Build your mighty army of bees
  public function buildArmy($queens,$workers,$drones) {

    // 3 types of bees, as per function vars.
    // We need 3 queens, 5 workers, and 7 drones, but this can vary based on the variable request

  }

  public function createBee($type) {

  }

  public function  getHealth($bee) {

  }

}

?>
