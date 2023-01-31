<?php
class RoomDAO {
  private $dbConnect;

  public function __construct() {
    $this->dbConnect = MySQLDatabase::getInstance();
  }

  public function create($number, $floor, $building, $personen, $art, $equipment) {
    $rid = -1;
    $query = "insert into room(number, floor, building, personen, art, equipment) values(?, ?, ?, ? , ?, ?)";
    if(!$preStmt = $this->dbConnect->prepare($query)){
      echo "Fehler by 'prepare' (" . $this->dbConnect->errno . ")" . $this->dbConnect->error . "<br>";
    }else{
      if(!$preStmt->bind_param("siiiss", $number, $floor, $building, $personen, $art, $equipment)){
        echo "Fehler by 'bind_param' (" . $this->dbConnect->errno . ")" . $this->dbConnect->error . "<br>";
      }else{
        if(!$preStmt->execute()){
          echo "Fehler by 'execute' (" . $this->dbConnect->errno . ")" . $this->dbConnect->error . "<br>";
        }else{
          $rid = $preStmt->insert_id;
        }
      }
    }
  $preStmt->free_result();
  $preStmt->close();
  return $rid;
  }

  public function read($rid) {
    $query = "select rid, number, floor, building, personen, art, equipment from room where rid = ?";
    $room = null;
    $rid = intval($rid);
    if(!$preStmt = $this->dbConnect->prepare($query)){
      echo "Fehler by 'prepare' (" . $this->dbConnect->errno . ")" . $this->dbConnect->error . "<br>";
    }else{
      if(!$preStmt->bind_param("i", $rid)){
        echo "Fehler by 'bind_param' (" . $this->dbConnect->errno . ")" . $this->dbConnect->error . "<br>";
      }else{
        if(!$preStmt->execute()){
        echo "Fehler by 'execute' (" . $this->dbConnect->errno . ")" . $this->dbConnect->error . "<br>";
        }else{
          if(!$preStmt->bind_result($rid, $number, $floor, $building,  $personen, $art, $equipment)){
          echo "Fehler by 'bind_result' (" . $this->dbConnect->errno . ")" . $this->dbConnect->error . "<br>";
          }else{
            if($preStmt->fetch()){
            $room = new Room($rid, $number, $floor, $building, $personen, $art, $equipment);
            }
            $preStmt->free_result();
          }
        }
      }
      $preStmt->close();
    }
    return $room;
  }

  public function readALL()
  {
    $query = "SELECT rid, number, floor, building, personen, art, equipment from room ";
    $roomList = array();

    $resultData = $this->dbConnect->query($query);
    $resultArray = $resultData->fetch_all(MYSQLI_ASSOC);

    for($i=0; $i < count($resultArray);  $i++)
    {
      $roomList[] = new Room($resultArray[$i]['rid'], $resultArray[$i]['number'], $resultArray[$i]['floor'],
                             $resultArray[$i]['building'],$resultArray[$i]['personen'],$resultArray[$i]['art'], $resultArray[$i]['equipment']);
    }

    $resultData->free();

    return $roomList;
  }


  public function readByNumberBuilding($number, $building)
  {
    $query = "SELECT rid, number, floor, building, personen,art, equipment from room  where number = ? and building = ? ";
    $room = null;
    $preStmt = $this->dbConnect->prepare($query);
    $preStmt->bind_param("si", $number, $building);
    $preStmt->execute();
    $preStmt->bind_result($rid, $number, $floor, $building, $personen, $art, $equipment);
    if($preStmt->fetch()){
      $room = new Room($rid, $number, $floor, $building, $personen, $art, $equipment);
    }
    $preStmt->free_result();
    $preStmt->close();

    return $room;

  }


public function updateRoom($roomnr, $floor, $building, $personen, $art, $equipment, $rid){
  $query=" update room set number=?, floor=?, building=?, personen=?, art=?, equipment=? where rid=?";

  if(!$preStmt = $this->dbConnect->prepare($query)){
    echo "Fehler by 'prepare' (" . $this->dbConnect->errno . ")" . $this->dbConnect->error . "<br>";
    }else{
      if(!$preStmt->bind_param("siiissi", $roomnr, $floor, $building, $personen, $art, $equipment, $rid)){
        echo "Fehler by 'bind_param' (" . $this->dbConnect->errno . ")" . $this->dbConnect->error . "<br>";
      }else{
        if(!$preStmt->execute()){
          echo "Fehler by 'execute' (" . $this->dbConnect->errno . ")" . $this->dbConnect->error . "<br>";
        }
      }
    }
}
  public function delete($rid){

      $query=" delete from  room  where rid=?";

      if(!$preStmt = $this->dbConnect->prepare($query)){
        echo "Fehler by 'prepare' (" . $this->dbConnect->errno . ")" . $this->dbConnect->error . "<br>";
        }else{
          if(!$preStmt->bind_param("i", $rid)){
            echo "Fehler by 'bind_param' (" . $this->dbConnect->errno . ")" . $this->dbConnect->error . "<br>";
          }else{
            if(!$preStmt->execute()){
              echo "Fehler by 'execute' (" . $this->dbConnect->errno . ")" . $this->dbConnect->error . "<br>";
            }
          }
        }
  }

public function buchen($rid){
  $sql ="SELECT rid, number, floor, building, personen,art, equipment from room  where rid = ? ";
  $room = null;
  $preStmt = $this->dbConnect->prepare($sql);
  $preStmt->bind_param("i", $rid);
  $preStmt->execute();
  $preStmt->bind_result($rid, $number, $floor, $building, $personen, $art, $equipment);
  if($preStmt->fetch()){
    $room = new Room($rid, $number, $floor, $building, $personen, $art, $equipment);
  }

  $preStmt->free_result();
  $preStmt->close();
  return $room;

}

public function searchRoom($date,$tid) {
  $query = "select r.number, r.building  from room r
  where
  not r.rid in(select r.rid from room r, booking b , timeperiod t where r.rid=b.rid and b.tid=t.tid and b.date=? and  t.tid=? group by 1)
  order by 1";
  $roomList=array();

  $preStmt = $this->dbConnect->prepare($query);
  if(!$preStmt->prepare($query)){
    echo "Fehler by 'prepare' (" . $this->dbConnect->errno . ")" . $this->dbConnect->error . "<br>";
  }else{
    if(!$preStmt->bind_param("si", $date,$tid)){
      echo "Fehler by 'bind_param' (" . $this->dbConnect->errno . ")" . $this->dbConnect->error . "<br>";
    }else{
      if(!$preStmt->execute()){
      echo "Fehler by 'execute' (" . $this->dbConnect->errno . ")" . $this->dbConnect->error . "<br>";
      }else{

        $result  = $preStmt->get_result();
        $resultArray = $result->fetch_all(MYSQLI_ASSOC);

        for($i=0; $i<count($resultArray);  $i++)
        {
          $roomList[] = array($resultArray[$i]['number'],$resultArray[$i]['building']);
        }
        $result->free();

      }
    }
  }

  return $roomList;
}
}
 ?>
