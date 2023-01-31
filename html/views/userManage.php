<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="css/bildschirm.css" rel="stylesheet" media="all">
    <title>Raumverwaltung</title>
  </head>
  
  <body>

  <div class="wrapper">
    <nav><?=  $link ?></nav>
     
    <section  id="panel1"> 
   
      <div class="newuser">

     <form  action="index.php?befehl=userNew" method="post" id="newuser"><br>
      <h3>Neuen Benutzer anlegen:</h3><br>
      <p id="meldung"><?= $meldung ?></p>
        <label for="name">Name:
          <input type="text" name="name" value="">
          </label><br>
       
          <label for="secondname">Nachname:
          <input type="text" name="secondname" value="">
          </label><br>
    
          <label for="email">Email oder Nickname:
          <input type="text" name="email" value="">
          </label><br>
     
          <label for="password">Kennwort:
          <input type="password" name="password" value="">
          </label><br>
     
          <label for="role">Rechte</label>
              <select class="" name="role_id">
                <option value="3">Admin</option>
                <option  value="2">User</option>
                <option selected value="1">Gast</option>
              </select>
          </label><br><br>
      
          <input type="submit" name="save" value="Anlegen">

      </form>
   
    </div> 
    <div class="usersearch">
    
    <form  action="index.php?befehl=userFind" method="post" id="usersearch"><br><br>
    <p id="meldung"><?= $delete?></p>
        <button type="submit" name="ballusers">Alle Benutzer anzeigen</button>
            <br><br><br><br>
            <h3>Benutzer suchen:</h3><br>
            <p id="meldung"><?= $meldung1,$user  ?></p>
             <label for="choose">Suche nach :</label>
             <select  name="choose">
                     <option value="uid">ID</option>
                     <option selected value="email">E-Mail</option>
                    <option value="name">Vorname</option>
                    <option value="secondname">Nachname</option>
                </select>
                <input type="text" name="search" >
                <br><br>
            <button type="submit" name="bsearch">Suchen</button><br><br><br>
           
      
            <!-- <label for="role"> Suche nach Rolle:
                 <select  name="role">
                    <option selected value="2">User</option>
                    <option value="1">Gast</option>
                </select>
            </label>
            <br><br>
            <button type="submit" name="brole">Suchen</button><br><br>
             -->
            <?= $userList
			/* $x="";
		    echo '<table >
							<tr>
								<th>RaumNr</th>
								<th>Gebäude</th>
								<th>Etage</th>
								<th>Personen</th>
								<th>Art</th>
								<th>Ausstatung</th>
								<th</th>
								<th></th>
								<th></th>
							</tr>';
							$roomList = $roomDAO->readAll();				
			for($i=0; $i < count($roomList); $i++){ 
				$x=($x=="#ccc")?"#eee":"#ccc";
					echo '<tr style="background-color: '.$x.'; ">
					
						   <td>'.$roomList[$i]->getNumber().'</td>
						  <td>'.$roomList[$i]->getBuilding().'</td>
						  <td>'.$roomList[$i]->getFloor().'</td>					
						  <td>'.$roomList[$i]->getPersonen().'</td>
						  <td>'.$roomList[$i]->getArt().'</td>
						  <td>'.$roomList[$i]->getEquipment().'</td>
						   <td><a href="index.php?befehl=bookingFormular&roomnr='.$roomList[$i]->getNumber().'&building='.$roomList[$i]->getBuilding().'" class=" button table" > Buchen</a></td>
						   <td><a href="index.php?befehl=modifyRoom&rid='.$roomList[$i]->getID().'&roomnr='.$roomList[$i]->getNumber().'&floor='.$roomList[$i]->getFloor().'&building='.$roomList[$i]->getBuilding().'&personen='.$roomList[$i]->getPersonen().'&art='.$roomList[$i]->getArt().'&equipment='.$roomList[$i]->getEquipment().'" class="button table"> Ändern</a></td>
						   <td><a href="index.php?befehl=" class="button table" > Löschen</a></td>
						   </tr>';
			}		
				echo "</table>";
							 */
      ?>  
      
            
      
          
    </form>
    </div>
    </section>
    

    <footer role="contentinfo">
		<small>Copyright &copy; <time datetime="2020">2020</time> IT-Solution & Design GmbH | Tel: 040-123456 | E-Mail: raumverwaltung@it-solution.de</small>
		</footer>
    </div>
    
  </body>
</html>
