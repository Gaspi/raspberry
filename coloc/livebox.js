
function clear_log_livebox() {
    document.getElementById("log_livebox").value = "Console effacée";
    return;
}

function print_log_livebox(str) {
    document.getElementById("log_livebox").value = str + "\n" + document.getElementById("log_livebox").value;
}




function AJAX(params, f) {
	var http = new XMLHttpRequest();
	http.open("POST", "ajax/ajax.php", true);
	//Send the proper header information along with the request
	http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	http.onreadystatechange = f;
	http.send(params);
}


function AJAX_livebox(code_touche, code_mode) {
	AJAX("action=livebox&code_touche=" + code_touche + "&code_mode=" + code_mode,
		 function() {
			 if (this.readyState == 4 && this.status == 200) {
				 print_log_livebox('-> ' + this.responseText);
			 }
		 });
}




