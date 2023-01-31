<?php

class UserDAO {
  private $dbConnect;

  public function __construct() {
    $this->dbConnect = MySQLDatabase::getInstance();
  }

  public function create($name,$secondname,$email, $password, $role_id) {
    $uid = -1;
    $query = "insert into user(name, secondname, email, password, role_id) values(?, ?, ?, ?, ?)";
    $hash=password_hash($password,PASSWORD_DEFAULT);
     if(!$preStmt = $this->dbConnect->prepare($query)){
        echo "Fehler by 'prepare' (" . $this->dbConnect->errno . ")" . $this->dbConnect->error . "<br>";
      }else{
        if(!$preStmt->bind_param("ssssi", $name, $secondname, $email, $hash, $role_id)){
          echo "Fehler by 'bind_param' (" . $this->dbConnect->errno . ")" . $this->dbConnect->error . "<br>";
        }else{
          if(!$preStmt->execute()){
             echo "Fehler by 'execute' (" . $this->dbConnect->errno . ")" . $this->dbConnect->error . "<br>";
          }else{
            $uid = $preStmt->insert_id;
                }
              }
            }


      $preStmt->free_result();
      $preStmt->close();
    return $uid;
  }

  
  public function readbyUID($uid) {
    $query = "select uid, name, secondname, email, role_id from user where uid = ?";
    $user = null;

    if(!$preStmt = $this->dbConnect->prepare($query)){
      echo "Fehler by 'prepare' (" . $this->dbConnect->errno . ")" . $this->dbConnect->error . "<br>";
    }else{
      if(!$preStmt->bind_param("i", $uid)){
        echo "Fehler by 'bind_param' (" . $this->dbConnect->errno . ")" . $this->dbConnect->error . "<br>";
      }else{
        if(!$preStmt->execute()){
        echo "Fehler by 'execute' (" . $this->dbConnect->errno . ")" . $this->dbConnect->error . "<br>";
        }else{
          if(!$preStmt->bind_result($uid, $name, $secondname, $email, $role_id)){
          echo "Fehler by 'bind_result' (" . $this->dbConnect->errno . ")" . $this->dbConnect->error . "<br>";
          }else{
            if($preStmt->fetch()){
            $user = new User($uid, $name, $secondname, $email, "", $role_id);
            }
            $preStmt->free_result();
          }
        }
      }
      $preStmt->close();
    }
    return $user;
  }


  public function readbyEmail($email) {
    $query = "select uid, name, secondname, email, role_id from user where email = ?";
    $user = null;

    if(!$preStmt = $this->dbConnect->prepare($query)){
      echo "Fehler by 'prepare' (" . $this->dbConnect->errno . ")" . $this->dbConnect->error . "<br>";
    }else{
      if(!$preStmt->bind_param("s", $email)){
        echo "Fehler by 'bind_param' (" . $this->dbConnect->errno . ")" . $this->dbConnect->error . "<br>";
      }else{
        if(!$preStmt->execute()){
        echo "Fehler by 'execute' (" . $this->dbConnect->errno . ")" . $this->dbConnect->error . "<br>";
        }else{
          if(!$preStmt->bind_result($uid, $name, $secondname, $email, $role_id)){
          echo "Fehler by 'bind_result' (" . $this->dbConnect->errno . ")" . $this->dbConnect->error . "<br>";
          }else{
            if($preStmt->fetch()){
            $user = new User($uid, $name, $secondname, $email, "",$role_id);
            }
            $preStmt->free_result();
          }
        }
      }
      $preStmt->close();
    }
    return $user;
  }

  public function readbyName($name) {
    $query = "select uid, name, secondname, email, role_id from user where name = ?";
    $user = null;

    if(!$preStmt = $this->dbConnect->prepare($query)){
      echo "Fehler by 'prepare' (" . $this->dbConnect->errno . ")" . $this->dbConnect->error . "<br>";
    }else{
      if(!$preStmt->bind_param("s", $name)){
        echo "Fehler by 'bind_param' (" . $this->dbConnect->errno . ")" . $this->dbConnect->error . "<br>";
      }else{
        if(!$preStmt->execute()){
        echo "Fehler by 'execute' (" . $this->dbConnect->errno . ")" . $this->dbConnect->error . "<br>";
        }else{
          if(!$preStmt->bind_result($uid, $name, $secondname, $email, $role_id)){
          echo "Fehler by 'bind_result' (" . $this->dbConnect->errno . ")" . $this->dbConnect->error . "<br>";
          }else{
            if($preStmt->fetch()){
            $user = new User($uid, $name, $secondname, $email,"", $role_id);
            }
            $preStmt->free_result();
          }
        }
      }
      $preStmt->close();
    }
    return $user;
  }

  public function readbySecondname($secondname) {
    $query = "select uid, name, secondname, email, role_id from user where secondname = ?";
    $user = null;

    if(!$preStmt = $this->dbConnect->prepare($query)){
      echo "Fehler by 'prepare' (" . $this->dbConnect->errno . ")" . $this->dbConnect->error . "<br>";
    }else{
      if(!$preStmt->bind_param("s", $secondname)){
        echo "Fehler by 'bind_param' (" . $this->dbConnect->errno . ")" . $this->dbConnect->error . "<br>";
      }else{
        if(!$preStmt->execute()){
        echo "Fehler by 'execute' (" . $this->dbConnect->errno . ")" . $this->dbConnect->error . "<br>";
        }else{
          if(!$preStmt->bind_result($uid, $name, $secondname, $email, $role_id)){
          echo "Fehler by 'bind_result' (" . $this->dbConnect->errno . ")" . $this->dbConnect->error . "<br>";
          }else{
            if($preStmt->fetch()){
            $user = new User($uid, $name, $secondname, $email,"", $role_id);
            }
            $preStmt->free_result();
          }
        }
      }
      $preStmt->close();
    }
    return $user;
  }



  public function readALL(){
    $query = 'select uid, name, secondname, email, password,( case role_id when 1 then "Gast" when 2 then "Benutzer" when 3 then "Admin"  end ) as role_id from user ';
    $userList = array();
    $resultData = $this->dbConnect->query($query);
    $resultArray = $resultData->fetch_all(MYSQLI_ASSOC);
    for($i=0; $i<count($resultArray); $i++) {
      $userList[] = new User($resultArray[$i]['uid'], $resultArray[$i]['name'], $resultArray[$i]['secondname'],
                             $resultArray[$i]['email'], $resultArray[$i]['password'], $resultArray[$i]['role_id']);
    }
    $resultData->free();
    return $userList;
  }


  public function checkByEmail($email) {
    $query = "select * from user where email = ?";
    $found=false;
    $preStmt = $this->dbConnect->prepare($query);
    if(!$preStmt->prepare($query)){
      echo "Fehler by 'prepare' (" . $this->dbConnect->errno . ")" . $this->dbConnect->error . "<br>";
    }else{
      if(!$preStmt->bind_param("s", $email)){
        echo "Fehler by 'bind_param' (" . $this->dbConnect->errno . ")" . $this->dbConnect->error . "<br>";
      }else{
        if(!$preStmt->execute()){
        echo "Fehler by 'execute' (" . $this->dbConnect->errno . ")" . $this->dbConnect->error . "<br>";
        }else{
          $preStmt->store_result();
          if($preStmt->num_rows >= 1){
            $found =true;
          }
        }
      }
    }
    return $found;
  }


  public function checkUser($email){

		$sql = " SELECT uid, name, secondname, email,  password, role_id FROM user WHERE email = ? ";

		$user = null;

		if(!$preStmt = $this->dbConnect->prepare($sql)){
			echo "Fehler bei SQL-Vorbereitung (" . $this->dbConnect->errno . ")" . $this->dbConnect->error ."<br>";
		}
		else{
			if(!$preStmt->bind_param("s", $email)){
				echo "Fehler beim Binding (" . $this->dbConnect->errno . ")" . $this->dbConnect->error ."<br>";
			}
			else{
				if(!$preStmt->execute()){
					echo "Fehler beim Ausführen (" . $this->dbConnect->errno . ")" . $this->dbConnect->error ."<br>";
				}
				else{
					if(!$preStmt->bind_result( $uid,$name, $secondname, $email, $password, $role_id )){
						echo "Fehler beim Ergebnis-Binding (" . $this->dbConnect->errno . ")" . $this->dbConnect->error ."<br>";
					}
					else{
						if($preStmt->fetch()){

							$user = new User( $uid, $name, $secondname, $email, $password, $role_id);
						}
						$preStmt->free_result();
					}
				}
			}
			$preStmt->close();
    }

    return $user;
  }

public function updateUser($name,$secondname,$email,$role_id,$uid){
  $query=" update user set name=?, secondname=?,email=?,role_id=?  where uid=?";

  if(!$preStmt = $this->dbConnect->prepare($query)){
    echo "Fehler by 'prepare' (" . $this->dbConnect->errno . ")" . $this->dbConnect->error . "<br>";
    }else{
      if(!$preStmt->bind_param("sssii", $name,$secondname,$email,$role_id,$uid)){
        echo "Fehler by 'bind_param' (" . $this->dbConnect->errno . ")" . $this->dbConnect->error . "<br>";
      }else{
        if(!$preStmt->execute()){
          echo "Fehler by 'execute' (" . $this->dbConnect->errno . ")" . $this->dbConnect->error . "<br>";
        }
      }
    $preStmt->close();
  }
}



  public function delete($uid){

      $query=" delete from  user  where uid=?";

      if(!$preStmt = $this->dbConnect->prepare($query)){
        echo "Fehler by 'prepare' (" . $this->dbConnect->errno . ")" . $this->dbConnect->error . "<br>";
        }else{
          if(!$preStmt->bind_param("i", $uid)){
            echo "Fehler by 'bind_param' (" . $this->dbConnect->errno . ")" . $this->dbConnect->error . "<br>";
          }else{
            if(!$preStmt->execute()){
              echo "Fehler by 'execute' (" . $this->dbConnect->errno . ")" . $this->dbConnect->error . "<br>";
            }
          }
        }
  }

}

 ?>
