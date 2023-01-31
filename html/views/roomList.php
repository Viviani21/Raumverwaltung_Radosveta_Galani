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

		<h3 id="allrooms"> Freie räume am <?= $date ?> für die Zeit : <?= $zeit ?></h3>
<?php
			$x="";
		    echo '<table>
							<tr>
								<th>RaumNr</th>
								<th>Gebäude</th>
								
							</tr>';
							$roomList = $roomDAO->searchRoom($date,$tid);				
			for($i=0; $i < count($roomList); $i++){ 
				$x=($x=="#ccc")?"#eee":"#ccc";
					echo '<tr style="background-color: '.$x.'; ">
					
                    <td>'.$roomList[$i][0].'</td>
                    <td>'.$roomList[$i][1].'</td>	
						  
						   </tr>';
			}		
				echo "</table>"; 
							
            ?>
            <a href="#" onclick="myfun()" class="button table" >Drücken</a>
			
            <script type="text/javascript"> function myfun(){ window.print();}</script>
            </div>

  <footer role="contentinfo">
		<small>Copyright &copy; <time datetime="2020">2020</time> IT-Solution & Design GmbH | Tel: 040-123456 | E-Mail: raumverwaltung@it-solution.de</small>
    </footer>
</div>
    </body>

</html>