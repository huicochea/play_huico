<?php

echo "CREATE DB BEGIN";
createMusicDB();
echo "END DB CREATE";

function createMusicDB() {
   $dbFileName = "../db/musicDatabase.db";
   if ($db = new SQLiteDatabase($dbFileName)) {
		// first let the engine check table, and create it eventualy
           $q = @$db->query('CREATE TABLE IF NOT EXISTS albums (id int PRIMARY KEY ASC, title TEXT, artist TEXT, cover TEXT, PRIMARY KEY (id))');

	}
}


?>