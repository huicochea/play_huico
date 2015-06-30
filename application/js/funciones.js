$(document).ready(function(){
	
});

function delet_song(obj){
	//console.log(obj.name);//Esta es la ruta del archivo a eliminar
	var ruta = obj.name;
	var nombre = obj.id.substring(0, obj.id.length-3);	
	var idc = obj.className;
	//console.log( nombre );//Esta es el nombre del archivo a eliminar
	var r=confirm("Realmente deseas eliminar la cancion: "+nombre);
	if(r){//Se elimina la cancion por ajax, si la respuesta fue existosa se remueve el elemento donde se mostraba la cancion por medio de jquery
		$.ajax({
			url: "ajax/elimina.php",
			type: "post",
			dataType: "html",
			data:{
		           ruta:ruta            
		        },
			success: function( data ) {
		           if(data==1){
		           		alert("Eliminada con exito!");
		           		console.log(idc);
		           		$("#"+idc).remove();
		           }
		           else{
		           		alert("Error al eliminar!");
		           }
		        }
		}).done(function() {
			
		});	   		
	}
	else{
		//No se elimino
	}
}

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

