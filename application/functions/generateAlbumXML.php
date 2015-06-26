<?php


function generateAlbumList($path) {
	
	$GLOBALS["generatedXML"] .="<?xml version='1.0'?>\n";
	$GLOBALS["generatedXML"] .="<albumList>\n";	
	listAlbumFolder($path);
	$GLOBALS["generatedXML"] .="</albumList>\n";
	$success = writeXMLfile($GLOBALS["generatedXML"]);	
	return $success;
}

function listAlbumFolder($path) {
// This function list contents of folder and goes recursive to find all music in folder and sub-folders
// Add into XML the information about music found
	if ($GLOBALS["trackID"] == "")
		$GLOBALS["trackID"] = 1;
	if ($GLOBALS["albumID"] == "")
		$GLOBALS["albumID"] = 1;
	if ($bufferTracksCount == "") 
		$bufferTracksCount = 0;
	
	if (is_dir($path)) {
		if ($dh = opendir($path)) {
			$musicFound = 0;
			$array_files = scandir($path);	
			for($i = 0;$array_files[$i] != ""; $i++) {
				
				if ($array_files[$i] != "." && $array_files[$i] != "..") {
					if (is_dir($path.$array_files[$i])) {
						$path .= $array_files[$i] . "/";
						$bufferTracksCount = 0;
						$path = listAlbumFolder($path);
					}
					elseif (substr($array_files[$i],0,1) != ".") {
						$completefilepath = $path.$array_files[$i];
						
						$extension = end(explode('.', $completefilepath));
						// Generate a name based on higher folder and upfolders
						// display all that appears after the "data" folder (home of musics)
						$folders = explode('/', $path);
						$folder_data_found = 0;
						$folderName = "";
						for ($j=0;$j < count($folders);$j++) {
							if ($folder_data_found == 1) {
								$folderName .= $folders[$j]." ";
							}
							if ($folders[$j] == "data") {
								$folder_data_found = 1;
							}

						}
						
						$file_size = formatBytes(filesize($completefilepath));
						// get the standard path in HTTP to content
						$initialVirtualdir = "http://".$_SERVER["HTTP_HOST"]."/data/";
						$virtualFilePath = $completefilepath;
						$virtualFilePath = str_replace($GLOBALS["rootPath"],$initialVirtualdir,$completefilepath);

						if ($extension == "mp3" || $extension == "m4a" || $extension == "mp4" || $extension == "ogg") {  
							$bufferTracksCount +=1;
							if ($musicFound == 0) {
								// this is the first music for the album : we add album information
								$GLOBALS["generatedXML"] .= "	<album>\n";
								$GLOBALS["generatedXML"] .= "		<albumID>".$GLOBALS["albumID"]."</albumID>\n";
								$GLOBALS["generatedXML"] .= "		<albumTitle>".$folderName."</albumTitle>\n";
								$GLOBALS["generatedXML"] .= "		<albumArtist>unknown</albumArtist>\n";
								$GLOBALS["generatedXML"] .= "		<albumFolder>".$path."</albumFolder>\n";
								$GLOBALS["generatedXML"] .= "		<albumTracks>\n";
								$GLOBALS["albumID"] += 1;
								$musicFound = 1;
							} 
							$GLOBALS["generatedXML"] .= "		<track>\n";
							$GLOBALS["generatedXML"] .= "			<trackID>".$GLOBALS["trackID"]."</trackID>\n";
							$GLOBALS["generatedXML"] .= "			<trackFile>".$virtualFilePath."</trackFile>\n";
							$GLOBALS["generatedXML"] .= "			<trackTitle>".$array_files[$i]."</trackTitle>\n";
							$GLOBALS["generatedXML"] .= "			<trackArtist>Unknow</trackArtist>\n";
							$GLOBALS["generatedXML"] .= "			<trackLengh>x:xx</trackLengh>\n";
							$GLOBALS["generatedXML"] .= "			<trackFileSize>".$file_size."</trackFileSize>\n";
							$GLOBALS["generatedXML"] .= "		</track>\n";
							
							$GLOBALS["trackID"] += 1;
						}
						if ($extension == "png" || $extension == "gif" || $extension == "jpg" || $extension == "jpeg") {  
							$matchKeyword = strripos($array_files[$i],"cover_small");
							
							// If no image, we add one in folder
							if ($bufferCover == "") {
								$bufferCover = $virtualFilePath;
							}
							// If the thumbnail exist, we use it in priority
							if ($matchKeyword !== false) {
								$bufferCover = $virtualFilePath;
							}
						}
						
					}
	
				}
			}
			
			if ($musicFound == 1) {
			// we created some album. we need to close the item in XML
				$GLOBALS["generatedXML"] .= "		</albumTracks>\n";
				$GLOBALS["generatedXML"] .= "		<albumTracksCount>".$bufferTracksCount."</albumTracksCount>\n";

				if ($bufferCover != "") {
					$GLOBALS["generatedXML"] .= "		<albumCover>".$bufferCover."</albumCover>\n";
					$bufferCover = "";
				}
				$GLOBALS["generatedXML"] .= "	</album>\n";
				$musicFound = 0;
			}
			
			closedir($dh);
			$new_path_array = explode("/", $path);
			$new_path = "";
			for ($i=0;$i< count($new_path_array) - 2;$i++) {
				$new_path .= $new_path_array[$i]."/";
			}

			return $new_path;
		}
	}
}


function cleanAlbumFolder($path) {
// This function clean files and folders searching for special char

	if (is_dir($path)) {
		if ($dh = opendir($path)) {
			for($i = 0;($file = readdir($dh)) !== false; $i++) {
				$currentScannedFileorFolder = $path.$file;
				if ($file != "." && $file != "..") {
					$specialChar = 0;
					if (filetype($currentScannedFileorFolder) == "dir") {
						$folderName = $file;
						$completePathfolderName = $path.$file."/";
						$newfolderName = $file;
						$specialChar = preg_match('/&/',$folderName);
						if ($specialChar != 0) {
							$newfolderName = str_replace("&", "and", $folderName);						
							$completePathNewfolderName = $path.$newfolderName."/";
							//echo "RENAME FOLDER : OLD=".$completePathfolderName." NEW=".$completePathNewfolderName."<br />";
							rename($completePathfolderName,$completePathNewfolderName);
						}
						$path .= $newfolderName . "/";
						$path = cleanAlbumFolder($path);
					}
					elseif (substr($file,0,1) != ".") {	
						$completefilepath = $path.$file;
			
						$fileName = $file;
						$specialChar = preg_match('/&/',$fileName);
						if ($specialChar != 0) {
							$newfilepath = str_replace("&", "and", $completefilepath);
							//echo "RENAME FILE : OLD=".$completefilepath." NEW=".$newfilepath."<br />";
							rename($completefilepath, $newfilepath);
						}
					}
	
				}
			}	
			closedir($dh);
			$new_path_array = explode("/", $path);
			$new_path = "";
			for ($i=0;$i< count($new_path_array) - 2;$i++) {
				$new_path .= $new_path_array[$i]."/";
			}
			return $new_path;
		}
	}
}

function formatBytes($size, $precision = 2)
{
    $base = log($size) / log(1024);
    $suffixes = array('', 'kb', 'Mb', 'Gb', 'Tb');   

    return round(pow(1024, $base - floor($base)), $precision) . $suffixes[floor($base)];
}

function writeXMLfile($dataToWrite) {
	$filepath = $GLOBALS["xmlPath"]."playlistAllAlbums.xml";
	$fp = fopen($filepath, 'w+');
	if (fwrite ($fp,$dataToWrite) !== FALSE) {
		return 1;
	}
	else {
		return 0;
	} 
	fclose($fp);
}

?>
