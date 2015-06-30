<?php
  include "class/mp3.php";
  
  function actualizar_lista($respuesta){
      if($respuesta=='SI'){
        return true;
      }
      else{
        return false;
      }
  }

  //Para crear el archivo xml con la informacion de las canciones cargadas en la carpeta /musica
  function crear(){
      set_time_limit(0);
      $ruta="musica";
      $GLOBALS ['contador']=1;

      //Empesamos la estructura del archivo xml      
      $xml = new DomDocument('1.0'); 
      $playlist = $xml->createElement('albumList');
      $playlist = $xml->appendChild($playlist);
   
      // comprobamos si lo que nos pasan es un direcotrio
      if (is_dir($ruta))
            {
            // Abrimos el directorio y comprobamos que
                if ($aux = opendir($ruta))
                {
                    while (($archivo = readdir($aux)) !== false)
                    {
                      // Si quisieramos mostrar todo el contenido del directorio pondrÃƒÂ­amos lo siguiente:
                      // echo '<br />' . $file . '<br />';
                      // Pero como lo que queremos es mostrar todos los archivos excepto "." y ".."
                        if ($archivo!="." && $archivo!="..")
                        {                     
                            $ruta_completa = $ruta . '/' . $archivo;  
                            //echo "Esto: ".$ruta_completa."<br>"; 
                            if (is_dir($ruta_completa))//Seran lo albunes
                            {
                            // Abrimos la nueva carpeta, esta sera el nombre del album
                                  if ($aux2 = opendir($ruta_completa))
                                  {
                                      //echo "Folder: ".$archivo."<br>"; 
                                      //Aui se empiezan a crear los albums
                                      $libro = $xml->createElement('album');//se empieza a iterar desde el album
                                      $libro = $playlist->appendChild($libro);
                                 
                                      $autor = $xml->createElement('albumID',"$GLOBALS[contador]");
                                      $autor = $libro->appendChild($autor);

                                      $titulo = $xml->createElement('albumTitle',htmlspecialchars(utf8_encode($archivo)));
                                      $titulo = $libro->appendChild($titulo);

                                      $anio = $xml->createElement('albumArtist','unknown');
                                      $anio = $libro->appendChild($anio);

                                      //$albumFolder = $xml->createElement('albumFolder','../data/ACDC/Back In Black/');//No se aun que es esto,parece ser la ubicacion de las imagenes
                                      $albumFolder = $xml->createElement('albumFolder','/images');
                                      $albumFolder = $libro->appendChild($albumFolder);

                                      $albumTracks = $xml->createElement('albumTracks');//Empieza la lista de canciones
                                      $albumTracks = $libro->appendChild($albumTracks);
                                                        
                                      $no_cancion = 1;
                                      while (($archivo2 = readdir($aux2)) !== false)
                                      {

                                        if ($archivo2!="." && $archivo!=".."){                     
                                              $ruta_completa2 = $ruta_completa . '/' . $archivo2;   
                                              if (is_dir($ruta_completa2))//No puede aver carpetas dentro de los albunes
                                              {
                                                  
                                              }
                                              else
                                              {
                                                    if(substr("$ruta_completa2", -3, 3)=="mp3"){ //El sistema solo soporta archivos con expencion mp3   

                                                      $track = $xml->createElement('track');
                                                      $track = $albumTracks->appendChild($track); 

                                                      $trackID = $xml->createElement('trackID',"$no_cancion");
                                                      $trackID = $track->appendChild($trackID);

                                                      $trackFile = $xml->createElement('trackFile', htmlspecialchars(utf8_encode($ruta_completa2)));//Ubicacion del archivo
                                                      $trackFile = $track->appendChild($trackFile);

                                                      $trackTitle = $xml->createElement('trackTitle', htmlspecialchars(utf8_encode($archivo2)));//Nombre del archivo
                                                      $trackTitle = $track->appendChild($trackTitle);

                                                      $trackArtist = $xml->createElement('trackArtist',"Unknow");
                                                      $trackArtist = $track->appendChild($trackArtist);
                                                      
                                                      //Calcular el timpo de la cancion
                                                      $mp3file = new MP3File(htmlspecialchars($ruta_completa2));
                                                      $duration2 = $mp3file->getDuration();//(slower) for VBR (or CBR)  

                                                      $trackLengh = $xml->createElement('trackLengh',MP3File::formatTime($duration2));
                                                      $trackLengh = $track->appendChild($trackLengh);


                                                      $trackFileSize = $xml->createElement('trackFileSize',formatSizeUnits(filesize(htmlspecialchars($ruta_completa2))));//Tamaño del archivo
                                                      $trackFileSize = $track->appendChild($trackFileSize);

                                                      //echo "Ubicacion del archivo: ".$ruta_completa2."<br>";                                              
                                                      $GLOBALS['contador']++;                                               
                                                      $no_cancion++;    
                                                    }                                                    
                                              }//Termina else carga de archivos
                                          }
                                      }
                                                                                    //Esto va despues del while
                                      $albumTracksCount = $xml->createElement('albumTracksCount',$no_cancion-1);
                                      $albumTracksCount = $libro->appendChild($albumTracksCount);

                                      $no_cancion = 1;

                                      $albumCover = $xml->createElement('albumCover',"images/disco.jpg");
                                      $albumCover = $libro->appendChild($albumCover);   
                                      closedir($aux2);   
                                  } 
                                
                            }
                            else
                            {//No son carpetas, por lo tanto no mostramos nada

                            }
                        }
                    }   
                    closedir($aux);   
                }        
            }      
    //Creamos el archivo
    
    $xml->formatOutput = true;
    $el_xml = $xml->saveXML();
    $xml->save('xml/playlistAllAlbums.xml');
  }
 
  //Para leerlo
  function leer(){
    echo "<p><b>Ahora mostrandolo con estilo</b></p>";
    $xml = simplexml_load_file('libros.xml');
    echo "<pre>";
    $salida ="";
    foreach($xml->libro as $item){
      $salida .=
        "<b>Autor:</b> " . $item->autor . "<br/>".
        "<b>Título:</b> " . $item->titulo . "<br/>".
        "<b>Ano:</b> " . $item->anio . "<br/>".
        "<b>Editorial:</b> " . $item->editorial . "<br/><hr/>";
    }
    echo $salida;
    echo "</pre>";
  }
 
   function formatSizeUnits($bytes)
    {
        if ($bytes >= 1073741824)
        {
            $bytes = number_format($bytes / 1073741824, 2) . ' GB';
        }
        elseif ($bytes >= 1048576)
        {
            $bytes = number_format($bytes / 1048576, 2) . ' MB';
        }
        elseif ($bytes >= 1024)
        {
            $bytes = number_format($bytes / 1024, 2) . ' KB';
        }
        elseif ($bytes > 1)
        {
            $bytes = $bytes . ' bytes';
        }
        elseif ($bytes == 1)
        {
            $bytes = $bytes . ' byte';
        }
        else
        {
            $bytes = '0 bytes';
        }

        return $bytes; 
    }

?>