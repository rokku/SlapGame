<?php
namespace SlapGame\Combat;

class Battle
{
  protected $health;
  protected $attackValue;

  public function startAttack() {

    // Attacking! First, choose a bee to attack
    // @todo We could always put in a roll here to see whether the attack actually hits
    // but apparently we're really sharp so all hits are 100% likely to land.

    $target = $this->chooseBee(); // target acquired
    $this->hit($target); // Hit the bee, and proceed.
    if($this->countQueens()<=0) { $this->endBattle(); }
    return $target;
  }

  private function chooseBee() {
    // Only choose bees that are alive (hp > 0). It's no good slapping a dead bee. Remember this.
    $target['bee'] = array_rand($_SESSION['bees']);
    $target['attackValue'] = $_SESSION['bees'][$target['bee']]['attack'];
    if($_SESSION['bees'][$target['bee']]['status']=='dead') {$target = $this->chooseBee();}
    return $target;
  }

  private function hit($target) {

    // Rolling our attack on our target.
    $this->rollHit($target,(int)$_SESSION["bees"][$target['bee']]['attack'],(int)$_SESSION["bees"][$target['bee']]['health']);
  }

  private function rollHit($bee,$attackValue,$currentHP) {
    // Calculating how our hit performed.
    $remainingHP = $currentHP-$attackValue;

    if($remainingHP <=0) {
      // If health goes beneath 0, the bee is dead.
      $this->killBee($bee);
    }
    // Update the army array with the health of this bee's node.
    $this->setHealth($bee,$remainingHP);
  }

  private function killBee($bee) {
    // Finish it off and update the array.
    $_SESSION["bees"][$bee['bee']]["status"]="dead";
  }

  private function setHealth($bee,$health) {
    // Update bee's health in array.
    $_SESSION["bees"][$bee['bee']]["health"] = $health;
  }

  private function countQueens() {
    // We need to count the number of queens left after each round.
    // If all bees die, then the entire game is over.
    $bees = $_SESSION['bees'];
    $queens = 0;
    foreach($bees AS $key=>$value) {
      foreach($value AS $key2=>$value2) {
        if($key2=='rank' && $value2=='queen') {
          if($value['status']=='alive') {
            $queens++;
          }
        }
      }
    }
    return $queens;
  }

  private function endBattle() {
    // End the battle (usually when all bees are dead, but sometimes when 3 queens die ahead of everything else)
    // This could be much nicer, but does the job for now.
    echo 'Battle is over';
    exit;
  }

}

 ?>
