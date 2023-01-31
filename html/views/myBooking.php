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
  	<div class="mybooking">
		<h2>Meine Buchungen </h2><br>
		<a href="#" onclick="myfun()" class="button" >Drücken</a>
<script type="text/javascript"> function myfun(){ window.print();}</script>
		<p id="meldung"><?= $meldung ?></p>
		<?= $anlegen ?>	<br>
		<?= $search ?><br>
			<?php
			$x="";
		    echo '<table>
							<tr>
								<th>Buchung Nr.</th>
								<th>Buchung ID</th>
								<th>Raum Nr.</th>
								<th>Gebäude Nr.</th>
								<th>Datum</th>
								<th>Zeit</th>
								<th>Personen</th>
								<th>Art</th>
								<th>Ausstattung</th>
								<th></th>
							</tr>';

							$list1 = $bookingDAO->bookingUser($_SESSION['userID']);
			for($i=0; $i < count($list1); $i++){
				$x=($x=="#ccc")?"#eee":"#ccc";
					echo '<tr style="background-color: '.$x.'; ">
							<td>'.($i+1).'</td>
							<td>'.$list1[$i][0].'</td>
						  	<td>'.$list1[$i][1].'</td>
						 	<td>'.$list1[$i][2].'</td>
						 	<td>'.$list1[$i][3].'</td>
						 	<td>'.$list1[$i][4].'</td>
						 	 <td>'.$list1[$i][5].'</td>
						 	<td>'.$list1[$i][6].'</td>
						 	<td>'.$list1[$i][7].'</td>

              <td><a href="index.php?befehl=deleteBookingFormular&bid='.$list1[$i][0].'&roomnr='.$list1[$i][1].'&building='.$list1[$i][2].'&date='.$list1[$i][3].'&zeit='.$list1[$i][4].'" class="button table"> Löschen </a></td>
						</tr>';
			}
				echo "</table>";

			?>
		<br>


</div>
<footer role="contentinfo">
		<small>Copyright &copy; <time datetime="2020">2020</time> IT-Solution & Design GmbH | Tel: 040-123456 | E-Mail: raumverwaltung@it-solution.de</small>
		</footer>
		</div>
	</body>
</html>
