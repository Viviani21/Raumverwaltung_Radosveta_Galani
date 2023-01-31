<?php
class Role {
  private $id;
  private $position;

  public function __construct($id, $position) {
    $this->id = $id;
    $this->position = $position;
  }

  public function getID() {
    return $this->id;
  }

  public function setID($id) {
    $this->id= $id;
  }

  public function getPosition() {
    return $this->position;
  }

  public function setPosition($position) {
      $this->position = $position;
  }

  public function __toString() {
    return $this->id . " " . $this->position;
  }
}

 ?>
