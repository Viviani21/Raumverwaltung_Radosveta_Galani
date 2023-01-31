<!DOCTYPE html>
<html lang="de" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Delete Raum</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="css/bildschirm.css" rel="stylesheet" media="all">
  </head>
  <body>
  <div class="wrapper">
  <nav>
  <?= $link ?>
  </nav>
  <div class="deleteuser">
  <h3>Wollen Sie wirklich den Benutzer löschen ? </h3>
    <p id="meldung"><?= $meldung ?></p>
    <form  action="index.php?befehl=deleteUser" method="post" id="deleteuser"><br>
      
        <label for="uid">BenutzerID:
          <input type="number" name="uid" readonly value= "<?= $uid?>">
          </label><br>
       
          <label for="name">Vorname:
          <input type="text" name="name" readonly value= "<?= $name?>">
          </label><br>
    
          <label for="secondname">Nachname:
          <input type="text" name="secondname" readonly value= "<?= $secondname?>">
          </label><br>
     
          <label for="email">Email oder Nickname:
          <input type="text" name="email" readonly value= "<?= $email?>">
          </label><br>
      
             <input type="submit" name="delete"  value="Löschen">
            <button type="submit" name="abbrechen" value="Submit">Abbrechen</button>
		</form>
  
    </div> 
  
    <footer role="contentinfo">
		<small>Copyright &copy; <time datetime="2020">2020</time> IT-Solution & Design GmbH | Tel: 040-123456 | E-Mail: raumverwaltung@it-solution.de</small>
    </footer>
      </div>
  </body>
</html>
