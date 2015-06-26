$(document).ready(OnReady); // Abonne le callback à exécuter lorsque tout le DOM est chargé
function OnReady(){
    $("form").submit(OnSubmit); // Abonne un callback à l'évènement "submit" du formulaire
   $('.linkAlbum a').unbind('click'); // Supprime les infos sur linkalbum
   $('.linkAlbum a').click(function(){ // Les rajoute
	  var url = $(this).attr('href'); // Ajoute un load sur tous les a href de la classe linkAlbums
	  $('#result').load(url, function() {
		OnReady();
	});
	  return false;
	});	
}

function OnSubmit(data){

	$.ajax({
        type: $(this).attr("method"), // Récupère la méthode d'envoi du formulaire
        url: $(this).attr("action"), // Récupère l'url du script qui reçoit la requête
        data: $(this).serialize(), // Fabrique la "query string" contenant les deux nombres
        success: OnSuccess // Callback qui récupère la réponse du serveur
    });
    return false; // Annule l'envoi classique du formulaire
	
} 

function OnSuccess(result){
    $("#result").html(result); // Insère le résultat dans la balise d'id "result"
	OnReady(); // On retravaille une fois la nouvelle page chargée
}

function afficher_cacher(id)
{
        if(document.getElementById(id).style.visibility=="hidden")
        {
                document.getElementById(id).style.visibility="visible";
				document.getElementById(id).style.display="block";
        }
        else
        {
                document.getElementById(id).style.visibility="hidden";
				document.getElementById(id).style.display="none";
        }
        return true;
}
