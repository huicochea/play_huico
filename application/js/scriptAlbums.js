$(document).ready(OnReady); // Abonne le callback � ex�cuter lorsque tout le DOM est charg�
function OnReady(){
    $("form").submit(OnSubmit); // Abonne un callback � l'�v�nement "submit" du formulaire
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
        type: $(this).attr("method"), // R�cup�re la m�thode d'envoi du formulaire
        url: $(this).attr("action"), // R�cup�re l'url du script qui re�oit la requ�te
        data: $(this).serialize(), // Fabrique la "query string" contenant les deux nombres
        success: OnSuccess // Callback qui r�cup�re la r�ponse du serveur
    });
    return false; // Annule l'envoi classique du formulaire
	
} 

function OnSuccess(result){
    $("#result").html(result); // Ins�re le r�sultat dans la balise d'id "result"
	OnReady(); // On retravaille une fois la nouvelle page charg�e
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
