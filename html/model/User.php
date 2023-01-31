<?php
class User {
  private $id;
  private $name;
  private $secondname;
  private $email;
  private $password;
  private $role_id;

  public function __construct($id, $name, $secondname, $email, $password,  $role_id) {
    $this->id = $id;
    $this->name = $name;
    $this->secondname = $secondname;
    $this->email = $email;
    $this->password = $password;
    $this->role = $role_id;
  }

  public function getID() {
    return $this->id;
  }

  public function setID($id) {
    $this->id = $id;
  }

  public function getName() {
    return $this->name;
  }

  public function setName($name) {
    $this->name = $name;
  }

  public function getSecondName() {
    return $this->secondname;
  }

  public function setSecondName($secondname) {
    $this->secondname = $secondname;
  }

  public function getEmail() {
    return $this->email;
  }

  public function setEmail($email) {
    $this->email = $email;
  }

  public function getPassword() {
    return $this->password;
  }

  public function setPassword($password) {
    $this->password = $password;
  }

  public function getRole_id() {
    return $this->role;
  }

  public function setRole_id($role_id) {
    $this->role_id= $role_id;
  }

  public function __toString() {
    return $this->id . " " . $this->name . " " . $this->secondname . " " . $this->role_id;
  }

}
 ?>
