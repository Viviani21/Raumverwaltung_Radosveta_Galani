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
                    
  <div class="userupdate"> 
   
    <p id="meldung"><?= $meldung ?></p>
    <form  action="index.php?befehl=userUpdate" method="POST" id="userupdate">
    <h3>Benutzerdaten ändern:</h3>
    <label for="name">UserID:
          <input type="text" name="uid" readonly value="<?= $uid?>">
          </label><br>
      
        <label for="name">Name:
          <input type="text" name="name" value="<?= $name?>">
          </label><br>
       
          <label for="secondname">Nachname:
          <input type="text" name="secondname" value="<?= $secondname?>">
          </label><br>
    
          <label for="email">Email oder Benutzername:
          <input type="text" name="email" value="<?= $email?>">
          </label><br>

          <label for="role">Rechte</label>
              <select class="" name="role_id">
                <option value="3">Admin</option>
                <option  value="2">User</option>
                <option selected value="1">Gast</option>
              </select>
          </label><br><br>
      
           <button type="submit" name="submit" class="button table">Update</button>
           <button type="submit" name="abbrechen" value="Submit">Abbrechen</button>
      </form>
   </div> 
    
    <footer role="contentinfo">
		<small>Copyright &copy; <time datetime="2020">2020</time> IT-Solution & Design GmbH | Tel: 040-123456 | E-Mail: raumverwaltung@it-solution.de</small>
		</footer>
    </div>
    
  </body>
</html>
