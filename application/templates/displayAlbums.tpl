{section name=sec1 loop=$arrayAlbums}
	<div class="bloc" name="bloc">
			<div class="linkAlbum"><a href="displayPlaylist.php?albumID={$arrayAlbums[sec1].id}" target="_top"><img class="albumcover" src="{$arrayAlbums[sec1].cover}"></a></div>
			<div class="linkAlbum"><a href="displayPlaylist.php?albumID={$arrayAlbums[sec1].id}"  target="_top">{$arrayAlbums[sec1].title|truncate:40}</a><br />
			<span class="albumArtist">{$arrayAlbums[sec1].tracksCount} track(s)</span></div>			
	</div>
{/section}