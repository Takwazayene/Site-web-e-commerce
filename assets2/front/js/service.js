function envoyer()
{
var country = checkout.billing_country.value;
var service = checkout.billing_service.value;
var Meca = checkout.billing_Meca.value;
var date = checkout.billing_date.value;

if( (billing_service.value==1) && (billing_country.value=1) && (billing_country.value=1) && (billing_country.value=1) )
{
alert("votre reservation a ete envoyer");
}
else if ((billing_service.value=="choisir une ville"))
{
alert("il faut que tout les chemins seront rempli");
}
}