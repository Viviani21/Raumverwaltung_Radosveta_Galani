<?php
class Room {
  private $id;
  private $number;
  private $floor;
  private $building;
  private $personen;
  private $art;
  private $equipment;
  

  public function __construct($id, $number, $floor, $building, $personen, $art, $equipment) {
    $this->id = $id;
    $this->number = $number;
    $this->floor = $floor;
    $this->building = $building;
    $this->personen = $personen;
    $this->art = $art;
    $this->equipment = $equipment;
   
  }

  public function getID() {
    return $this->id;
  }

  public function setID($id) {
    $this->id = $id;
  }

  public function getNumber() {
    return $this->number;
  }

  public function setNumber($number) {
    $this->number = $number;
  }
  public function getFloor() {
    return $this->floor;
  }

  public function setFloor($floor) {
    $this->floor = $floor;
  }

  public function getBuilding() {
    return $this->building;
  }

  public function setBuilding($building) {
    $this->building = $building;
  }
  public function getPersonen() {
    return $this->personen;
  }

  public function setPersonen($personen) {
    $this->personen = $personen;
  }

  public function getArt() {
    return $this->art;
  }

  public function setArt($art) {
    $this->art = $art;
  }
  public function getEquipment() {
    return $this->equipment;
  }

  public function setEquipment($equipment) {
    $this->equipment = $equipment;
  }
  

  public function __toString() {
    return $this->id . " " . $this->number ." " . $this->floor . " " . $this->building ." " . $this->personen . " " . $this->art . " " .$this->equipment;
  }


}

 ?>
