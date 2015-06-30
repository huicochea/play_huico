
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
	myPlaylist.setPlaylist(content);//Carga la playlist
	setTimeout(function(){
        myPlaylist.play(0);
    }, 1000); 
	//myPlaylist.pause();
}

function load_track(content) {
	var nombre = content.title.substring(0, content.title.length-3);
	$("#playlist_song").html(nombre);
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