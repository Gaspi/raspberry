
function clear_log_pioneer() {
    document.getElementById("cmdlog").value = "Console effacée";
    return;
}

function print_log_pioneer(str) {
    document.getElementById("cmdlog").value = str + "\n" + document.getElementById("cmdlog").value;
}





function AJAX(params, f) {
	var http = new XMLHttpRequest();
	http.open("POST", "ajax/ajax.php", true);
	//Send the proper header information along with the request
	http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	http.onreadystatechange = f;
	http.send(params);
}


function AJAX_telnet_pioneer_on() {
	AJAX("action=telnet_on",
		 function() {
			 if (this.readyState == 4 && this.status == 200) {
				 print_log_pioneer('-> ' + this.responseText);
			 }
		 });
}


function AJAX_telnet_pioneer(str) {
    if (str.length == 0 || str.length > 4) {
		print_log_pioneer("Erreur AJAX_telnet_pioneer: " + str.length);
		return;
    }
	AJAX("action=telnet&telnet=" + str,
		 function() {
			 if (this.readyState == 4 && this.status == 200) {
				 print_log_pioneer('-> ' + this.responseText);
			 }
		 });
}

