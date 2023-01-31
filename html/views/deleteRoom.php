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
  <div class="updateroom">
  <h3>Wollen Sie wirklich den Raum löschen ? </h3>
    <p id="meldung"><?= $meldung ?></p>
    <form  action="index.php?befehl=deleteRoom" method="POST" id="updateroom">
  
    <div id="input_feld">
      <label for="rid">Raum ID:
      <input type="number" name="rid" readonly value= "<?= $rid?>" >
      </label><br><br>
      </div> 
    <div id="input_feld">
      <label for="roomnr">Raum Nr:
      <input type="text" name="roomnr"  readonly value= "<?= $roomnr?>" >
      </label><br><br>
      </div> 
      
      <div id="input_feld"> 
      <label for="floor">Etage:
      <input type="number" name="floor"  readonly value= "<?= $floor?>">
      </label><br><br>
      </div> 
     
      <div id="input_feld">
      <label for="building">Building:
      <input type="number" name="building" readonly value= "<?= $building ?>">
      </label><br><br>
      </div> 
     
      <div id="input_feld">
      <label for="personen">Personen:
      <input type="number" name="personen"  readonly value= "<?= $personen ?>">
      </label><br><br>
      </div> 
     
      <div id="input_feld">
      <label for="art">Art:
      <input type="text" name="art" readonly value= "<?= $art ?>">
      </label><br><br>
      </div> 
      
      <div id="input_feld">
      <label for="equipment">Ausstattung:
      <input type="text" name="equipment"  readonly value= "<?= $equipment ?>">
      </label><br><br>
      </div> 
     
      <br><br>
      
      <div id="input_feld">
            <input type="submit" name="delete"  value="Löschen">
            <button type="submit" name="abbrechen" value="Submit">Abbrechen</button>
		</div>
    
    </form>
  
    </div> 
  
    <footer role="contentinfo">
		<small>Copyright &copy; <time datetime="2020">2020</time> IT-Solution & Design GmbH | Tel: 040-123456 | E-Mail: raumverwaltung@it-solution.de</small>
    </footer>
      </div>
  </body>
</html>
