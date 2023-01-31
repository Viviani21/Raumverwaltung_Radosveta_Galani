<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title> BFW Raumverwaltung</title>
    <meta name="description" content="Anzeige aufgeben">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="css/bildschirm.css" rel="stylesheet" media="all">
</head>
<body >

	<header>
		<h1>Herzlich wilkommen bei Raumverwaltung</h1>	
	</header>
<div class="wrapper">
	<div id="panel">

    	<div  id="bild" >	
		</div>

		<div id="login">
			<h3>Um die Räumlichkeiten sich anzuschauen bzw. zu buchen, melden Sie sich bitte an.</h3>
			<p id="meldung"><?= $meldung ?></p>
    			<form  action="index.php?befehl=checkLogin" method="POST">
			 
				<label for="email">E-Mail:</label>
	 			<input type="text" name="email" placeholder="E-Mail " size="30">
	 			<br><br>
     			<label for="password">Kennwort :</label>
	  			<input type="password" name="password" placeholder=" Password " size="30">
			  	<br><br>
      			<input type="submit" name="button" value="Anmelden">
				</form>
		</div>
	</div>

	<br><br>	

	<footer role="contentinfo">
		<small>Copyright &copy; <time datetime="2020">2020</time> IT-Solution & Design GmbH | Tel: 040-123456 | E-Mail: raumverwaltung@it-solution.de</small>
		</footer>
</div>
</body>
</html>