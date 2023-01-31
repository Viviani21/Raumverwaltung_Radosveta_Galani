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
	  
	<div class="allusers">
		<h3 id="allusers">Userübersicht</h3>
		
		<p id="meldung"><?= $meldung ?></p><br>
		
        <?php
			$x="";
		    echo '<table>
							<tr>
								<th>ID</th>
								<th>Vorname</th>
								<th>Nachname</th>
								<th>Email oder Benutzername</th>
								<th>Role</th>
							    <th></th>
								<th></th>
								</tr>';
                            
							$userList = $userDAO->readAll();				
			for($i=0; $i < count($userList); $i++){ 
				$x=($x=="#ccc")?"#eee":"#ccc";
					echo '<tr style="background-color: '.$x.'; ">
					
						<td>'.$userList[$i]->getID().'</td>
                        <td>'.$userList[$i]->getName().'</td>
                        <td>'.$userList[$i]->getSecondName().'</td>
						<td>'.$userList[$i]->getEmail().'</td>
						<td>'.$userList[$i]->getRole_id().'</td>
                        <td><a href="index.php?befehl=userModify&uid='.$userList[$i]->getID().'&name='.$userList[$i]->getName().'&secondname='.$userList[$i]->getSecondName().'&email='.$userList[$i]->getEmail().'" class="button table" > Ändern</a></td>
						<td><a href="index.php?befehl=deleteUserFormular&uid='.$userList[$i]->getID().'&name='.$userList[$i]->getName().'&secondname='.$userList[$i]->getSecondName().'&email='.$userList[$i]->getEmail().' " class="button table" > Löschen</a></td>
                    </tr>';
            }		
				echo "</table>";
							
			?>
		<br>
		
		<a href="#" onclick="myfun()" class="button " >Drücken</a>
			<script type="text/javascript"> function myfun(){ window.print();}</script>
		</div> 
        <footer role="contentinfo">
		<small>Copyright &copy; <time datetime="2020">2020</time> IT-Solution & Design GmbH | Tel: 040-123456 | E-Mail: raumverwaltung@it-solution.de</small>
		</footer>
	</div>
	</body>
</html>




	
 
