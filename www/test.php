<?php


function telnet($msg) {
	$fp = fsockopen("192.168.1.4", 23, $errno, $errstr, 30);
	
	if (!$fp) {
		echo 'Could not connect to Pioneer...';
		exit();
	}
	
	fputs($fp, $msg);
	$r = fgets($fp, 128);
	fclose($fp);
	return $r;
}

function telnet_turn_on() {
	$fp = fsockopen("192.168.1.4", 23, $errno, $errstr, 3);
	
	if (!$fp) {
		echo 'Could not connect to Pioneer...';
		exit();
	}
	
	fputs($fp, "\r");
	usleep(100000);
	fputs($fp, "\rPO\r");
	
	fclose($fp);
}

echo telnet("PF\r");
usleep(3000000);

turn_on()

?>