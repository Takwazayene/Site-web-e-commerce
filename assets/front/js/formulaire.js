

/*function verifierNom (){
	const ver=document.getElementById("nom").value;
	var letters = /^[A-Za-z- -]+$/;
	const erreur=document.getElementById("erreurnom");
	if(ver!==""){
		ver.replace(' ','');
		ver.trim();
		if(ver!==""){
			
					if(!ver.match(letters)){
				erreur.innerHTML="id client n'est pas un numero";
			return false;
		}
			else{
			erreur.innerHTML="";
			return true;
		}}
		else{
			erreur.innerHTML="verifier votre id client";
			return false;
		}
	}
	else{
		erreur.innerHTML="verifier votre id client";
			return false;
	}
	
}

function verifierAdresse (){
	const ver=document.getElementById("adresse").value;
	const erreur=document.getElementById("erreuradresse");
	if(ver!==""){
		ver.replace(' ','');
		ver.trim();
		if(ver!==""){
			erreur.innerHTML="";
			return true;
		}
		else{
			erreur.innerHTML="verifier votre adresse";
			return false;
		}
	}
	else{
		erreur.innerHTML="verifier votre adresse";
			return false;
	}
	
}



function verifierCodepostal (){
	const ver=document.getElementById("codepostal").value;
	const erreur=document.getElementById("erreurcodepostal");
	if(ver!==""){
		ver.replace(' ','');
		ver.trim();
		if(ver!==""){
					if(isNaN(ver)){
				erreur.innerHTML="id commande est un numero";
			return false;
		}
			else{
			erreur.innerHTML="";
			return true;
		}}
		else{
			erreur.innerHTML="verifier votre id commande";
			return false;
		}
	}
	else{

		erreur.innerHTML="verifier votre id commande";
			return false;
	}
	
}


function verifierQuantite (){
	const ver=document.getElementById("quantite").value;
	const erreur=document.getElementById("erreurQuantite");
	if(ver!==""){
		ver.replace(' ','');
		ver.trim();
		if(ver!==""){
					if(isNaN(ver)){
				erreur.innerHTML="quantite est un numero";
			return false;
		}
			else{
			erreur.innerHTML="";
			return true;
		}}
		else{
			erreur.innerHTML="verifier quantite";
			return false;
		}
	}
	else{

		erreur.innerHTML="verifier quantite";
			return false;
	}
	
}*/

function verifierQuantite () {
var qte =parseInt(document.getElementById('quantite').value);//pour bien dire au javascript que c'est un nombre et pas une chaîne de caractères
//Tu peux utiliser parseFloat() à la place de ParseInt() si la valeur peut être un nombre à virgule.
const erreur=document.getElementById("erreurQuantite");
if(qte > 0) {
	erreur.innerHTML="";
			return true;
//le nombre est bon
} else {
	erreur.innerHTML="verifier quantite : quantite doit être positive";
			return false;
//dire à l'utilisateur qu'il a mal remplis
}
}


/*function verifierTotal (){
	const ver=document.getElementById("total").value;
	const erreur=document.getElementById("erreurTotal");
	if(ver!==""){
		ver.replace(' ','');
		ver.trim();
		if(ver!==""){
					if(isNaN(ver)){
				erreur.innerHTML="Prix total est un numero";
			return false;
		}
			else{
			erreur.innerHTML="";
			return true;
		}}
		else{
			erreur.innerHTML="verifier prix total";
			return false;
		}
	}
	else{

		erreur.innerHTML="verifier prix total";
			return false;
	}
	
}

function verifierEtat (){
	const ver=document.getElementById("etat").value;
	const erreur=document.getElementById("erreurEtat");
	if(ver!==""){
		ver.replace(' ','');
		ver.trim();
		if(ver!==""){
					if(isNaN(ver)){
				erreur.innerHTML="Etat est un numero :0/1";
			return false;
		}
			else{
			erreur.innerHTML="";
			return true;
		}}
		else{
			erreur.innerHTML="verifier etat";
			return false;
		}
	}
	else{

		erreur.innerHTML="verifier etat";
			return false;
	}
	
}





function verifierProduit (){
	const ver=document.getElementById("produit").value;
	const erreur=document.getElementById("erreurproduit");
	if(ver!==""){
		ver.replace(' ','');
		ver.trim();
		if(ver!==""){
					
			
			erreur.innerHTML="";
			return true;
		}
		else{
			erreur.innerHTML="verifier votre id produit";
			return false;
		}
	}
	else{

		erreur.innerHTML="verifier votre id produit";
			return false;
	}
	
}*/







/*function executerverif() {
	verifierNom();
	verifierPrenom ();
verifierAdresse ();
verifierVille ();
verifierCodepostal ();
verifierProduit ();
verifierQuantite ();
verifierTotal ();
verifierEtat();
if(verifierNom ()  && verifierCodepostal ()&& verifierProduit () && verifierQuantite ()&& verifierTotal ()&& verifierEtat ()){
return true;
}
else return false;

}*/


function executerverif() {
	

verifierQuantite();

if( verifierQuantite()){
return true;
}
else return false;

}



function confirmation() {
	
	confirm("ehehehe");
}
