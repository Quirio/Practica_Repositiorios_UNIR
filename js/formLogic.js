/*
*@
*@
*/
"use strict";
	function changeForm(){
		$("#form").empty();
		var option = $("#Selectable").val();
		switch(option) {
		    case "ADD":
		        $("#form").add("");
		        break;
		    case "UPDATE":
		        $("#form").add("");
		        break;
		    case "DELETE":
		   		$("#form").html("<spam>Escriba el id del libro a eliminar:</spam> <br> <input type=\"text\" name=\"NLibro\">  <input type=\"submit\" name=\"submit\" value=\"Submit\">");
		   		break;
		}
	}
