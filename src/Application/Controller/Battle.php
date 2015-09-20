<?php
namespace Application\Controller;

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
  }

  private function chooseBee() {
    // Only choose bees that are live (hp > 0)
    $target = array_rand($_SESSION['bees']);
    if($_SESSION['bees'][$target]['status']=='dead') {$target = $this->chooseBee();}
    return $target;
  }

  private function hit($bee) {

    //echo 'This bee: '.$target.'<br/>';

    $this->rollHit($bee,(int)$_SESSION["bees"][$bee]['attack'],(int)$_SESSION["bees"][$bee]['health']);


  }

  private function rollHit($bee,$attackValue,$currentHP) {
    
    $remainingHP = $currentHP-$attackValue;

    if($remainingHP <=0) {
      $this->killBee($bee);
    }

    $this->setHealth($bee,$remainingHP);
  }

  private function killBee($bee) {
    $_SESSION["bees"][$bee]["status"]="dead"; echo 'KILL SHOT!';
  }

  private function setHealth($bee,$health) {
    $_SESSION["bees"][$bee]["health"] = $health;
  }

  private function countQueens() {

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
    echo 'Battle is over';
    exit;
  }

}

 ?>
