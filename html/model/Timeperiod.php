<?php
class Timeperiod {
  private $tid;
  private $period;

  public function __construct($tid, $period) {
    $this->tid = $tid;
    $this->period = $period;
  }

  public function getID() {
    return $this->tid;
  }

  public function setTID($tid) {
    $this->tid = $tid;
  }

  public function getPeriod() {
    return $this->period;
  }

  public function setPeriod($period) {
    $this->period = $period;
  }

  public  function __toString() {
    return $this->tid . " " . $this->period;
  }
}
 ?>
