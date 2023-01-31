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
                                        
    <div class="adminmenu">
      
      <p id="meldung"><?= $meldung ?></p>
      <p>Bitte wählen Sie, was Sie tun möchten:</p><br><br>
       <div class="panel2" >
      <div id="a">
          <a href="index.php?befehl=userManage" class="button" > Benutzer verwalten</a>
        </div>
        <div id="b">
          <a href="index.php?befehl=adminRooms" class="button" > Räume  verwalten</a>
        </div>
        <div id="c">
        <a href="index.php?befehl=allBooking" class="button" > Buchungen  verwalten</a>
        </div>
      </div>
      </div>
    <footer role="contentinfo">
    <small>Copyright &copy; <time datetime="2020">2020</time> IT-Solution & Design GmbH | Tel: 040-123456 | E-Mail: raumverwaltung@it-solution.de</small>
    </footer>
</div>
  </body>
</html>
