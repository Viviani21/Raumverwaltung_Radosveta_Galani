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

		    <h3 id="allrooms"> Buchungsmöglichkeiten  für   <?= $date ?> </h3><br>
		
			<?php
			$x="";
		    echo '<table>
                            <tr>
                                <th>RaumNr</th>
								<th>Gebäude</th>
								<th>Etage</th>
								<th>Personen</th>
                                <th>Art</th>
                                <th>Ausstatung</th>';
                $periodList=$timeperiodDAO->readALL();
                for($i=0; $i < count($periodList); $i++){ 
                         echo '<th>'.$periodList[$i]->getPeriod().' </th>';
                }
					echo	'</tr>';
                            
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
                            <td>'; 
                    
                            if($bookingDAO->readTime4($date,$roomList[$i]->getID()) != true){
                                echo' <p style ="color :red;"> gebucht </p>';
                            }else{
                                if($bookingDAO->readTime1($date,$roomList[$i]->getID()) == true){
                           
                                    $period=$periodList[0]->getPeriod();
                                    echo '<a href="index.php?befehl=bookingFormular&rid='.$roomList[$i]->getID().
                                                            '&date='.$date.
                                                            '&roomnr='.$roomList[$i]->getNumber().
                                                            '&building='.$roomList[$i]->getBuilding().
                                                            '&period='.$period.'
                                                            
                                                            " class=" button table" > Buchen</a>';
                                }else{
                                     echo' <p style ="color :red;"> gebucht </p>';
                                }
                            }
                        echo '</td>
                        <td>';
                            if($bookingDAO->readTime4($date,$roomList[$i]->getID()) != true){
                                echo' <p style ="color :red;"> gebucht </p>';
                            }else{
                                if($bookingDAO->readTime2($date,$roomList[$i]->getID()) == true){

                                    $period=$periodList[1]->getPeriod();
                                    echo '<a href="index.php?befehl=bookingFormular&rid='.$roomList[$i]->getID().
                                                    '&date='.$date.
                                                    '&roomnr='.$roomList[$i]->getNumber().
                                                    '&building='.$roomList[$i]->getBuilding().
                                                    '&period='.$period.'
                                                    
                                                    " class=" button table" > Buchen</a>';
                                }else{
                                    echo' <p style ="color :red;"> gebucht </p>';
                                }
                            }
                        echo '</td>
                        <td>';
                            if($bookingDAO->readTime4($date,$roomList[$i]->getID()) != true){
                                echo' <p style ="color :red;"> gebucht </p>';
                            }else{
                                if($bookingDAO->readTime3($date,$roomList[$i]->getID()) == true){

                                $period=$periodList[2]->getPeriod();
                                echo '<a href="index.php?befehl=bookingFormular&rid='.$roomList[$i]->getID().
                                                    '&date='.$date.
                                                    '&tid=3&roomnr='.$roomList[$i]->getNumber().
                                                    '&building='.$roomList[$i]->getBuilding().
                                                    '&period='.$period.'
                                            
                                                    " class=" button table" > Buchen</a>';
                                }else{
                                    echo' <p style ="color :red;"> gebucht </p>';
                                }
                            }
                        echo '</td>
                        <td>';
                            if($bookingDAO->readTime4($date,$roomList[$i]->getID()) == true){

                                $period=$periodList[3]->getPeriod();
                                $hourscheck=$bookingDAO->bookingHours($date,$roomList[$i]->getID());
					                if($hourscheck ==true){
                                        echo' <p style ="color :red;"> gebucht </p>';
					                }else{
                                        echo '<a href="index.php?befehl=bookingFormular&rid='.$roomList[$i]->getID().
                                                                '&date='.$date.
                                                                '&tid=4&roomnr='.$roomList[$i]->getNumber().
                                                                '&building='.$roomList[$i]->getBuilding().
                                                                '&period='.$period.'
                                                        
                                                                " class=" button table" > Buchen</a>';
                                    }
                            }else{
                                echo' <p style ="color :red;"> gebucht </p>';
                            }'
                        </td>

                
                    </tr>';
                          
			}		
			echo "</table>";
							
			?>
            
       
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