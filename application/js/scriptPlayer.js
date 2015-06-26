
var myPlaylist = "";

$(document).ready(function(){

	myPlaylist = new jPlayerPlaylist({
		jPlayer: "#jquery_jplayer_1",
		cssSelectorAncestor: "#jp_container_1"
	}, 
	
	[]

	
	, {
		swfPath: "js",
		supplied: "mp3",
		wmode: "window"
	});
	afficher_cacher('jp-playlist');

});

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
function afficher(id)
{
        document.getElementById(id).style.visibility="visible";
		document.getElementById(id).style.display="block";
        return true;
}
function cacher(id)
{
        document.getElementById(id).style.visibility="hidden";
		document.getElementById(id).style.display="none";
        return true;
}
function load_playlist(content) {
	myPlaylist.setPlaylist(content);
	setTimeout(function(){
        myPlaylist.play(0);
    }, 1000); 
	//myPlaylist.pause();
}

function load_track(content) {
	myPlaylist.remove();
	myPlaylist.add(content);
	setTimeout(function(){
        myPlaylist.play(0);
    }, 1000);
	//myPlaylist.pause();
}
function add_track(content) {	
	myPlaylist.add(content);
}

/////////
function cambiacolor_over(celda){ celda.style.backgroundColor="#ffff30" } 

function cambiacolor_out(celda){ celda.style.backgroundColor="#ffffff" }

function doSearch() { 
	var tableReg = document.getElementById('datos'); var searchText = document.getElementById('searchTerm').value.toLowerCase(); var cellsOfRow=""; var found=false; var compareWith=""; 
		// Recorremos todas las filas con contenido de la tabla 
		for (var i = 1; i < tableReg.rows.length; i++) { cellsOfRow = tableReg.rows[i].getElementsByTagName('td'); found = false; 
		// Recorremos todas las celdas 
		for (var j = 0; j < cellsOfRow.length && !found; j++) { compareWith = cellsOfRow[j].innerHTML.toLowerCase(); 
		// Buscamos el texto en el contenido de la celda 
		if (searchText.length == 0 || (compareWith.indexOf(searchText) > -1)) { found = true; } } if(found) { tableReg.rows[i].style.display = ''; } 
		else { 
		// si no ha encontrado ninguna coincidencia, esconde la 
		// fila de la tabla 
		tableReg.rows[i].style.display = 'none'; } } 
} 



