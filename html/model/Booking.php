<?php
class Booking {
  private $id;
  private $date;
  private $timeperiod;
  private $room;
  private $user;

  public function __construct($id, $date,   $timeperiod, $room, $user) {
    $this->id = $id;
    $this->date = $date;
    $this->timeperiod = $timeperiod;
    $this->room = $room;
    $this->user = $user;
  }

  public function getID() {
    return $this->id;
  }

  public function setID($id) {
    $this->id = $id;
  }

  public function getDate() {
    return $this->date;
  }

  public function setDate($date) {
    $this->date = $date;
  }

  public function getTimeperiod() {
    return $this->timeperiod;
  }

  public function setTimeperiod($timeperiod) {
    $this->timeperiod = $timeperiod;
  }

  public function getRoom() {
    return $this->room;
  }

  public function setRoom($room) {
    $this->room = $room;
  }

  public function getUser() {
    return $this->user;
  }

  public function setUser($user) {
    $this->user = $user;
  }

  public function __toString() {
    return $this->id . " " . $this->date . " " . $this->timeperiod . " " . $this->room . " " . $this->user;
  }

}

 ?>
