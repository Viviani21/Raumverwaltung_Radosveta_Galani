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
   
    <section  id="paneluser"> 
    
<div class="userList">
<br><br><br>

<p id="meldung"><?= $meldung ?></p> 
<h3 id="allrooms">Hier können Sie freien Raum suchen und danach buchen !</h3><br>

<p id="meldung"><?= $meldung1 ?></p> 
<h4 id="allrooms"> Freie Zeiten für alle Räume nach Datum suchen </h3><br>
		<form style="width:20%; margin:auto; " action="index.php?befehl=timeSearch" method="post" >
	
    <label for="date"> Datum :</label>
    <input type="date" name="date" >
    <button type="submit" name="submit" class="button table">Suche</button>
		
		</form>
		<h4 id="allrooms">Übersicht alle "grünen" Räume in BFW </h4>
		
			<?php
			$x="";
		    echo '<table>
							<tr>
								<th>RaumNr</th>
								<th>Gebäude</th>
								<th>Etage</th>
								<th>Personen</th>
                <th>Art</th>
                <th>Ausstatung</th>
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
						  </tr>';
			}		
				echo "</table>";
							
			?>
    <br>

   
    <p class="anlegen"><a href="#" onclick="myfun()" class="button table" >Drücken</a></p>
			
		<script type="text/javascript"> function myfun(){ window.print();}</script>
  </div>
 
</section>
  <footer role="contentinfo">
		<small>Copyright &copy; <time datetime="2020">2020</time> IT-Solution & Design GmbH | Tel: 040-123456 | E-Mail: raumverwaltung@it-solution.de</small>
    </footer>
</div>
    </body>

</html>
