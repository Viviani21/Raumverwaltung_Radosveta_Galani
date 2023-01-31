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
<p id="meldung"><?= $meldung ?></p><br>
		<h3 id="allrooms"> Buchungsmöglichkeiten  für   <?= $date ?></h3><br><br>
		
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
                                <th>08:00-10:00</th>
                                <th>10:00-12:00</th>
                                <th>12:00-15:00</th>
                                <th>08:00-15:00</th>
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
                <td>';
                if($bookingDAO->readTime4($date,$roomList[$i]->getID()) != true){
                    echo' <p style ="color :red;"> gebucht </p>';
                }else{
                        if($bookingDAO->readTime1($date,$roomList[$i]->getID()) == true){
                            echo' <p style ="color :green;"> frei</p>';
                        }else{
                            echo' <p style ="color :red;"> gebucht </p>';
                        }
                    }
                echo '
                </td>
                <td>';
                if($bookingDAO->readTime4($date,$roomList[$i]->getID()) != true){
                    echo' <p style ="color :red;"> gebucht </p>';
                }else{
                if($bookingDAO->readTime2($date,$roomList[$i]->getID()) == true){
                    echo' <p style ="color :green;"> frei</p>';
                }else{
                    echo' <p style ="color :red;"> gebucht </p>';
                }
            }
                echo '
                </td>
                <td>';
                if($bookingDAO->readTime4($date,$roomList[$i]->getID()) != true){
                    echo' <p style ="color :red;"> gebucht </p>';
                }else{
                if($bookingDAO->readTime3($date,$roomList[$i]->getID()) == true){
                    echo' <p style ="color :green;"> frei</p>';
                }else{
                    echo' <p style ="color :red;"> gebucht </p>';
                }
            }
                echo '
                </td>
                <td>';
                if($bookingDAO->readTime4($date,$roomList[$i]->getID()) == true){
                    $hourscheck=$bookingDAO->bookingHours($date,$roomList[$i]->getID());
                        if($hourscheck ==true){
                            echo' <p style ="color :red;"> gebucht </p>';
                        }else{
                            echo' <p style ="color :green;"> frei</p>';
                        }
                }else{
                    echo' <p style ="color :red;"> gebucht </p>';
                }'
                </td>

                
                </tr>';
                          
			}		
				echo "</table>";
							
			?>
            </form>
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