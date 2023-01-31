<!DOCTYPE html>
<html lang="de" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Raum anlegen</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	  <link href="css/bildschirm.css" rel="stylesheet" media="all">
  </head>
  <body>
  <div class="wrapper">
    <nav><?=  $link ?></nav>
        
    <div class="newroom">
      <h3>Hier können Sie einen neuen Raum anlegen</h3>
      <p id="meldung"><?= $meldung ?></p>
      
	
		<br>
      <form  action="index.php?befehl=newRoom" method="post" id="newroom">
      
          <label for="number">Raum Nr:</label>
          <input type="text" name="number" >
          
          <label for="floor">Etage: </label>
          <input type="number" name="floor" >
         
          <label for="building">Building:</label>
          <input type="number" name="building">
          
          <label for="personen">Personen:
          <input type="number" name="personen" >
          </label>
      
          <label for="art">Art:</label>
          <input type="text" name="art" >
          
          <label for="equipment">Ausstattung: </label>
          <input type="text" name="equipment" >
         
          <button type="submit" name="save" >Anlegen</button>
          <button type="submit" name="abbrechen" value="Submit">Abbrechen</button>
      </form>
    </div> 
    <footer role="contentinfo">
		<small>Copyright &copy; <time datetime="2020">2020</time> IT-Solution & Design GmbH | Tel: 040-123456 | E-Mail: raumverwaltung@it-solution.de</small>
		</footer>
  </div>
  </body>
</html>
