{section name=sec1 loop=$arrayAlbums}
	<div class="bloc" name="bloc">
			<div class="linkAlbum"><a href="displayPlaylist.php?albumID={$arrayAlbums[sec1].id}"><img class="albumcover" src="{$arrayAlbums[sec1].cover}"></a></div>
			<div class="linkAlbum"><a href="displayPlaylist.php?albumID={$arrayAlbums[sec1].id}">{$arrayAlbums[sec1].title}</a></div>
			<!--<div id="albumArtist">Pink Floyd | 11 tracks</button></div>	-->
	</div>
{/section}