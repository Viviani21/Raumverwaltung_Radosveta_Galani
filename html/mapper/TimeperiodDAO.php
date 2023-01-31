<?php

class TimeperiodDAO {
  private $dbConnect;

  public function __construct() {
    $this->dbConnect = MySQLDatabase::getInstance();
  }


  public function read($tid) {
    $query = "SELECT tid,period FROM  timeperiod where tid = ?";
    $timeperiod = null;

    if(!$preStmt = $this->dbConnect->prepare($query)){
      echo "Fehler by 'prepare' (" . $this->dbConnect->errno . ")" . $this->dbConnect->error . "<br>";
    }else{
      if(!$preStmt->bind_param("i", $tid)){
        echo "Fehler by 'bind_param' (" . $this->dbConnect->errno . ")" . $this->dbConnect->error . "<br>";
      }else{
        if(!$preStmt->execute()){
        echo "Fehler by 'execute' (" . $this->dbConnect->errno . ")" . $this->dbConnect->error . "<br>";
        }else{
          if(!$preStmt->bind_result($tid, $period)){
          echo "Fehler by 'bind_result' (" . $this->dbConnect->errno . ")" . $this->dbConnect->error . "<br>";
          }else{
            if($preStmt->fetch()){
            $timeperiod = new Timeperiod($tid, $period);
            }
            $preStmt->free_result();
          }
        }
      }
      $preStmt->close();
    }
    return $timeperiod;
  }

   public function readALL()
  {
    $query = "SELECT tid, period FROM timeperiod ";
    $timeperiodList = array();
    
    $resultData = $this->dbConnect->query($query);
    $resultArray = $resultData->fetch_all(MYSQLI_ASSOC);
    
    for($i= 0; $i < count($resultArray); $i++) 
    {
      $timeperiodList[] = new Timeperiod($resultArray[$i]['tid'], $resultArray[$i]['period']);
    }

    $resultData->free();
    return $timeperiodList;
  }

    public function readByPeriod($period){
      $query=" select tid, period  from timeperiod where period=? ";
     $timeperiod=NULL;
      $preStmt = $this->dbConnect->prepare($query);
      $preStmt->bind_param("s", $period);
      $preStmt->execute();
      $preStmt->bind_result($tid, $period);
      if($preStmt->fetch()){
           $timeperiod = new Timeperiod($tid, $period);
                }
      $preStmt->free_result();
      $preStmt->close();
     
      return $timeperiod;
    }


  }
?>