<?php

function telnet($msg) {
	$fp = fsockopen("192.168.1.4", 23, $errno, $errstr, 3);
	if (!$fp) {
		return 0;
	}
	stream_set_timeout($fp, 2);
	fputs($fp, $msg);
	$r = fgets($fp, 128);
	fclose($fp);
	return $r;
}

function telnet_turn_on() {
	$fp = fsockopen("192.168.1.4", 23, $errno, $errstr, 2);
	if (!$fp) {
		return 0;
	}
	stream_set_timeout($fp, 2);
	fputs($fp, "\r");
	usleep(100000);   // Sleep 100ms
	fputs($fp, "\rPO\r");
	$r = fgets($fp, 128);
	
	fclose($fp);
	return $r;
}

?>