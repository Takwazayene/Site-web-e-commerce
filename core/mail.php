<?php
include "../entities/Reclamation.php";
include "../core/ReclamationC.php";

 
    ini_set('display_errors',1);
 
    /*error_reporting(E_ALL);*/
 
    $from = "cirine.charrad@gmail.com";
 
    $to = "sirine.charrad@esprit.tn";
 
    $sujet = "Reclamation bien reçu  !";
 
    $message = " ETS-ZAYENE vous informe que votre réclamation est en cours de traitement ! Merci pour votre fidélité !";
    
    
     
 
    $headers = "From:".$from;


if(mail($to,$sujet,$message,$headers))
{
        //echo "L'email a bien été envoyé.";
       header('Location: afficherReclamation.php');
}
else
{
        echo "Une erreur c'est produite lors de l'envois de l'email.";
}
        



?>