<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<link rel="icon" type="image/png" href="images/favicon.ico" />
<title>PLAY HUICO</title>
<!-- <script src="js/jquery-1.8.2.js"></script> -->
<script src="js/jquery-2.1.4.js"></script>
<script src="js/scriptAlbums.js"></script>
<script src="js/scriptPlayer.js"></script>
<script src="js/funciones.js"></script>
<script type="text/javascript" src="js/jquery.jplayer.min.js"></script>

<script type="text/javascript" src="js/jplayer.playlist.min.js"></script>

<link href="css/jplayer.css" rel="stylesheet" type="text/css" />

<link href="css/style.css" rel="stylesheet" type="text/css" />
<link rel="apple-touch-icon" href="images/icon_iphone.png" />
</head>
<body>
<div id="header">
   <div id="fondHeader">
      <div id="player">{include file="jplayer.tpl"}</div>
      <div id="logo">
         <center>
            <div class="linkAlbum" ><a href="displayAlbums.php" onclick="javascript:cacher('jp-playlist');">
               <img border="0" src="images/logo.png"></a>			
         </center>
         </div>
      </div>
      <div id="search">
         <div id="search-form">
            <form method="post" action="displaySearchResults.php">
               <input class="search-textfield" type="text" name="keywordsSearched" id="keywordsSearched" placeholder="BUSCAR FOLDER"/>
               <button class="search-button">&nbsp;</button>
         </div>
      </div>
      </form>		
   </div>
</div>
</div>
