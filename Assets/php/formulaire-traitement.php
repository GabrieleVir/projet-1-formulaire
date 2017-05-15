<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="../css/style.css" style="text/css">
</head>
<body>
	

	<header>
	 <h1>
	 	Réception de message
	 </h1>

	 <h2>Un client à une question !
	 <br>Voici toutes les données qu'il a donné :  
	 
	 </h2>	
	 

	</header>

	<div class="php">
		<?php
		include '../index.php';
		echo "<br/>".$nom."&nbsp;".$prenom."<br/>".$email."<br/>".$txt-msg."<br/>".$sujet."&nbsp;".$sujet_radio;

		?>
	</div>

</body>
</html>