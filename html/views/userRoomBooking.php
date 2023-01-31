<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    
	  <link href="css/bildschirm.css" rel="stylesheet" media="all">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking</title>
</head>
<body>
<div class="wrapper">
    <nav><?=  $link ?></nav>
         
<div class="booking">
<h3>Raum buchen :</h3>
<p id="meldung"><?= $meldung ?></p>
<form action="index.php?befehl=userRoomBooking" method="post" id="booking">
  <label for="roomnr">Raum Nr :</label>
  <input type="text" id="roomnr" name="roomnr"  readonly value="<?php echo  $roomnr   ?>"><br><br>
 
  <label for="building">Gebäude :</label>
  <input type="text" id="building" name="building"  readonly value="<?php echo  $building ?>"><br><br>
  
  <label for="date" >Datum :</label>
  <input type="date" id="date" name="date"  readonly value="<?php echo  $date   ?>"><br><br>
  <label for="zeit" >Zeit :</label>
  <input type="text" id="period" name="period"   readonly value="<?php echo  $period ?>"><br><br>

  <!-- <input type="text" id="building" name="building"  readonly value=""><br><br> -->
  
  
  
  <!-- <input type="date" id="date" name="date"><br><br> -->
  <!-- <label for="zeit">Zeit :</label> -->
  <!-- <select name="zeit"  >
    <option value="1">8:00-10:00</option>
    <option value="2">10:00-12:00</option>
    <option value="3">12:00-15:00</option>
    <option value="4">08:00-15:00</option>
</select> -->
<br><br>

  <button type="submit" name="buchen"  >Buchen</button>
  <button type="submit" name="abbrechen" >Abbrechen</button>

</form>
<br><br>	
  </div> 
  <footer role="contentinfo">
		<small>Copyright &copy; <time datetime="2020">2020</time> IT-Solution & Design GmbH | Tel: 040-123456 | E-Mail: raumverwaltung@it-solution.de</small>
		</footer>
	</div>
</body>
</html> 