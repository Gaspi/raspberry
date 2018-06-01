<?php


require_once ('/var/www/ajax/pioneer.php');


function fail($code, $message) {
	exit( json_encode( array('error' => $code, 'message' => $message) ) );
}


function success($ar) {
	$ar['error'] = 0;
	exit( json_encode($ar) );
}



function read_post($key)
{
	if (! array_key_exists($key, $_POST) ) {
		fail(1, 'Missing '.$key.' in POST.');
	}
	return  $_POST[$key];
}




switch( read_post("action") ) {
	case "ip":
		$get_IP = "dig TXT +short o-o.myaddr.l.google.com @ns1.google.com | awk -F'\"' '{ print $2}'";
		success( array('ip' => $get_IP) );

	case "telnet":
		$telnet_code = htmlspecialchars( read_post('telnet') );
		$resp = telnet( $telnet_code . "\r" );
		if ($resp === 0) {
			fail(4, "Could not connect to Pioneer...");
		} else {
			success( array('response' => $resp) );
		}
		break;
	
	case "telnet_on":
		$resp = telnet_turn_on();
		success( array('message' => "Message 'turn on' sent", 'response' => $resp) );
		break;
		
	case "livebox":
	
		$code_touche = htmlspecialchars( read_post('code_touche'));
		$code_mode   = htmlspecialchars( read_post('code_mode'  ));
		$req = "http://192.168.1.3:8080/remoteControl/cmd?operation=01&key=".$code_touche."&mode=".$code_mode;
		$r = file_get_contents($req);
		$response = json_decode($r, true);
		$response['query'] = $req;
		success( array('message' => 'Commande réussie', 'response' => $response) );
		break;

	default:
		fail(2, 'Unrecognized action in POST.');
}



?>