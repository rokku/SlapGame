<?php
namespace \Application\Controller;

class Battle
{

  public function startAttack() {

    // Attacking! First, choose a bee to attack
    // @todo We could always put in a roll here to see whether the attack actually hits
    // but apparently we're really sharp so all hits are 100% likely to land.

    $target = $this->chooseBee(); // target acquired
    echo $target;
    $this->hit($target); // Hit the bee, and proceed.

  }

  private function chooseBee() {
    // Only choose bees that are live (hp > 0)
    $target = array_rand($_SESSION['bees']);
    if($_SESSION['bees'][$target]['status']=='dead') {$target = $this->chooseBee();}
    return $target;
  }

  private function hit($bee) {

    //echo 'This bee: '.$target.'<br/>';

    $health = (int)$_SESSION["bees"][$bee]['health'];
    //echo 'Health '.$health.'<br/>';
    $attackValue = (int)$_SESSION["bees"][$bee]['attack'];
    //echo 'Attack: '.$attackValue;
    $health = $health-$attackValue;
    if($health <=0) {
      $_SESSION["bees"][$bee]["status"]="dead"; echo 'KILL SHOT!';
    }
    $_SESSION["bees"][$bee]["health"] = $health;
    //echo '<br/>';
  }

}

?>
