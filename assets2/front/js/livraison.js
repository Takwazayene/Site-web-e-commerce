function envoyer()
{

	var nom= billing_first_name.value;
	var prenom= billing_last_name.value;
	if(nom.length==0 || prenom.length==0)
	{
		alert("veuillez saisir vos cordonnés");
	}
	else
	{
		alert("rempli avec succés");
	}
}