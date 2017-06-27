<?php 
	function pr ($var) {
		echo "<pre>";
		print_r($var);
		echo "</pre>";
	}


	if(isset($_POST['submit'])) {
		    $options = array
		    (
			    'nom' 		=> FILTER_SANITIZE_STRING,
			    'prenom' 	=> FILTER_SANITIZE_STRING,
			    'mail' 		=> FILTER_VALIDATE_EMAIL,
			    'radio1' 	=> FILTER_SANITIZE_STRING,
			    'radio2' 	=> FILTER_SANITIZE_STRING,
			    'radio3' 	=> FILTER_SANITIZE_STRING,
			    'radio4' 	=> FILTER_SANITIZE_STRING,
			    'message' 	=> FILTER_SANITIZE_STRING
			);

		    //Sanitization avec les arrays
			$inputs_filtred = filter_input_array(INPUT_POST, $options);
	
			//Validation de tous les inputs
			if(!empty($inputs_filtred['nom']) && !empty($inputs_filtred['prenom']) && !empty($inputs_filtred['mail']) && !empty($inputs_filtred['message']) && (!empty($inputs_filtred['radio1']) || !empty($inputs_filtred['radio2']) || !empty($inputs_filtred['radio3']) || !empty($inputs_filtred['radio4']))) {
				$email = "Lalala@gmail.com";			
				if(!empty($inputs_filtred['radio1'])) {
					mail($email, 'Aide pour logiciel' , $inputs_filtred['message']);
				} elseif(!empty($inputs_filtred['radio2'])) {
					mail($email, 'Aide livraison' , $inputs_filtred['message']);	
				} elseif(!empty($inputs_filtred['radio3'])) {
					mail($email, 'Aide technique ' , $inputs_filtred['message']);	
				} elseif(!empty($inputs_filtred['radio4'])) {
					mail($email, 'Aide pour autre' , $inputs_filtred['message']);	
				}
				$titre_reussite = "Votre message a bien été envoyé.";

			} else {
				$msg_erreur = "Veuillez remplir tous les champs s'il vous plait";
				$titre_erreur = "Oups... Il y'a eu une erreur durant l'envoi de votre message";
			}	
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Bon envoi du message</title>

	<!-- css -->
	<link rel="stylesheet" type="text/css" href="../css/style.css">
</head>
<body>
	<section class="content-send">
		<h1> <?php if(isset($titre_reussite)) {echo $titre_reussite; } if(isset($titre_erreur)) {echo $titre_erreur;} ?> </h1>

		<p> Résumé :</p>
		<p> Nom : <?php echo $inputs_filtred['nom']; ?> </p>
		<p> Prénom : <?php echo $inputs_filtred['prenom']; ?> </p>
		<p> E-mail : <?php echo $inputs_filtred['mail']; ?> </p>
		<p> Message : <?php echo $inputs_filtred['message']; ?> </p>
	</section>
	<div class="button-position">	
		<a href="../../index2.php"> <button class="button is-primary button-position-retour">Retour au site</button></a>
<?php
		if(isset($titre_erreur)) :
?>
		<a href="../../index2.php"> <button class="button is-primary button-position-formulaire">Retour au formulaire de contact</button></a>	
<?php
		endif;
?>
	</div>
</body>
</html>