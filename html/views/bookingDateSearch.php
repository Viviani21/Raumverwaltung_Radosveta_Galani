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
	<nav>
  		<?= $link ?>
 	</nav>
  	<div class="allbooking">
		<h2>Alle Buchungen für <?= $date ?> </h2>

		<!-- <p id="meldung"><?= $meldung ?></p> -->
		<!-- <p class="anlegen"><?= $anlegen ,$search ?></p> -->
			<?php
			$x="";
		    echo '<table>
							<tr>
								<th>Buchung<br> Nr.</th>
								<th>Buchung<br> ID.</th>
								<th>Nachname<br></th>
								<th>Raum <br>Nr.</th>
								<th>Geb.<br> Nr.</th>
								<th>Datum<br></th>
								<th>Zeit<br></th>
								<th>Personen<br></th>
								<th>Art<br></th>
								<th>Ausstattung<br></th>
								<th></th>
								<th></th>
                            </tr>';
                           
							$list = $bookingDAO->searchDateBooking($date);	
			for($i=0; $i < count($list); $i++){ 
				$x=($x=="#ccc")?"#eee":"#ccc";
					echo '<tr style="background-color: '.$x.'; ">
					
						  <td>'.($i+1).'</td>
						  <td>'.$list[$i][0].'</td>
						  <td>'.$list[$i][1].'</td>					
						  <td>'.$list[$i][2].'</td>
						  <td>'.$list[$i][3].'</td>
						  <td>'.$list[$i][4].'</td>
						  <td>'.$list[$i][5].'</td>
						  <td>'.$list[$i][6].'</td>
						  <td>'.$list[$i][7].'</td>
						  <td>'.$list[$i][8].'</td>
						  
						  <td><a href="index.php?befehl=deleteBookingFormular&bid='.$list[$i][0].'&roomnr='.$list[$i][2].'&building='.$list[$i][3].'&date='.$list[$i][4].'&zeit='.$list[$i][5].'" class="button table"> Löschen </a></td>
						   </tr>';
			}		
				echo "</table>";
							
			?>
		<br>
		<a href="#" onclick="myfun()" class="button" >Drücken</a>
<script type="text/javascript"> function myfun(){ window.print();}</script>

</div> 
<footer role="contentinfo">
		<small>Copyright &copy; <time datetime="2020">2020</time> IT-Solution & Design GmbH | Tel: 040-123456 | E-Mail: raumverwaltung@it-solution.de</small>
		</footer>
		</div>
	</body>
</html>




	
 
