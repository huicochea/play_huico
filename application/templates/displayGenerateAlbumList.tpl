<div class="generatePageConteneur">
<div class="generatePageTitle">Album list successfully generated</div>
<div><table class="generatePageTable">
<tr><td class="generatePageTableTitle">ALBUM TITLE</td><td>TRACKS</td></tr>
{section name=sec1 loop=$arrayAlbums}
			<tr><td>{$arrayAlbums[sec1].title}</td><td>{$arrayAlbums[sec1].tracksCount}</td>
{/section}
</table></div>
</div>