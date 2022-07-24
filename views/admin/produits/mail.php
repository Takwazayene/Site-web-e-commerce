<?php
		
			$to='zayenetakwa@gmail.com';
			$sujet='Reclamation';
			$texte="ETS-ZAYENE vous informe que votre réclamation est en cours de traitement ! Merci pour votre fidélité !";
			$header='From : test@gmail.com';
			mail($to,$sujet,$texte,$header);
	
		header('Location: afficherReclamation.php');

?>
