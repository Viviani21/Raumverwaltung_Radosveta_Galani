<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <title>Raumverwaltung</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="css/bildschirm.css" rel="stylesheet" media="all">
</head>
<body>
<div class="wrapper">
	<nav><?=  $link ?></nav>
	                         
	<div class="allrooms">
		<h3 id="allrooms">Raumübersicht alle "grünen"  Räume </h3>
		
		<p id="meldung"><?= $meldung ?></p>
		<p id="meldung"><?= $meldung1 ?></p>
		<p class="anlegen"><?= $anlegen ?></p>
		<p>Freie Räume nach Datum suchen :</p>
		<form style="width:20%; margin:auto; " action="index.php?befehl=timeSearch" method="post" >

			<input type="date" name="date" >
			<button type="submit" name="submit" class="button table">Suche</button>

		</form><br>					
		
		<br>
		
			<?php
			$x="";
		    echo '<table>
							<tr>
								<th>ID</th>
								<th>RaumNr</th>
								<th>Gebäude</th>
								<th>Etage</th>
								<th>Personen</th>
								<th>Art</th>
								<th>Ausstatung</th>
								<th></th>
								<th></th>
								
							</tr>';
							$roomList = $roomDAO->readAll();				
			for($i=0; $i < count($roomList); $i++){ 
				$x=($x=="#ccc")?"#eee":"#ccc";
					echo '<tr style="background-color: '.$x.'; ">
								<td>'.$roomList[$i]->getID().'</td>
								<td>'.$roomList[$i]->getNumber().'</td>
						        <td>'.$roomList[$i]->getBuilding().'</td>
						        <td>'.$roomList[$i]->getFloor().'</td>					
						        <td>'.$roomList[$i]->getPersonen().'</td>
						        <td>'.$roomList[$i]->getArt().'</td>
								<td>'.$roomList[$i]->getEquipment().'</td>
								
						        <td><a href="index.php?befehl=modifyRoom&rid='.$roomList[$i]->getID().
																	'&roomnr='.$roomList[$i]->getNumber().
																	'&floor='.$roomList[$i]->getFloor().
																	'&building='.$roomList[$i]->getBuilding().
																	'&personen='.$roomList[$i]->getPersonen().
																	'&art='.$roomList[$i]->getArt().
																	'&equipment='.$roomList[$i]->getEquipment().'
										" class="button table"> Ändern </a></td>
                                <td><a href="index.php?befehl=deleteRoomFormular&rid='.$roomList[$i]->getID().
																	'&roomnr='.$roomList[$i]->getNumber().
																	'&floor='.$roomList[$i]->getFloor().
																	'&building='.$roomList[$i]->getBuilding().
																	'&personen='.$roomList[$i]->getPersonen().
																	'&art='.$roomList[$i]->getArt().
																	'&equipment='.$roomList[$i]->getEquipment().'
										" class="button table"> Löschen </a></td>
                                
						   </tr>';
			}		
				echo "</table>";
							
			?>
		
		<br>
		

		<a href="#" onclick="myfun()" class="button table" >Drücken</a>
			
		<script type="text/javascript"> function myfun(){ window.print();}</script>
		
	</div> 
		<footer role="contentinfo">
			<small>Copyright &copy; <time datetime="2020">2020</time> IT-Solution & Design GmbH | Tel: 040-123456 | E-Mail: raumverwaltung@it-solution.de</small>
		</footer>
	</div>
	</body>
</html>
