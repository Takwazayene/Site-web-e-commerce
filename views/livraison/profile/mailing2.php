<?php
		if(isset($_POST['submit'])){
			$to='zouaouibechir5@gmail.com';
			$sujet='test mail en local';
			$texte=$_POST['texte'];
			$header='From : test@gmail.com';
			mail($to,$sujet,$texte,$header);
		}
		header('Location: reclamation.php');

?>
