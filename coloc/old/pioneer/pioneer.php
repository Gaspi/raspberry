<!doctype html>
<html lang="en">
<head>
  <?php include("includes/head.html"); ?>
  <script type="text/javascript" src="pioneer.js"></script>
</head>

<body>

<?php include("includes/header.html"); ?>

<?php include("includes/nav.html"); ?>


<article>

<h1> Pioneer </h1>

<input type="button" value="Power on" onclick="AJAX_telnet_pioneer_on()"> <br />
<input type="button" value="Power off" onclick="AJAX_telnet_pioneer('PF')"> <br />
<input type="button" value="Augmenter volume" onclick="AJAX_telnet_pioneer('VU')"> <br />
<input type="button" value="Réduire volume" onclick="AJAX_telnet_pioneer('VD')"> <br />
<input type="button" value="Mute" onclick="AJAX_telnet_pioneer('MZ')"> <br />
<input type="button" value="HDMI 1" onclick="AJAX_telnet_pioneer('19FN')"> <br />
<input type="button" value="HDMI 2" onclick="AJAX_telnet_pioneer('20FN')"> <br />
<input type="button" value="HDMI 3" onclick="AJAX_telnet_pioneer('21FN')"> <br />
<input type="button" value="HDMI 4" onclick="AJAX_telnet_pioneer('22FN')"> <br />
<input type="button" value="HDMI 5" onclick="AJAX_telnet_pioneer('23FN')"> <br />
<input type="button" value="HDMI 6" onclick="AJAX_telnet_pioneer('24FN')"> <br />

<textarea rows="20" cols="100" id="cmdlog">
Console initialisée
</textarea>
<br/>

<input type="button" value="Effacer console" onclick="clear_log_pioneer()"> <br/>

</article>

<?php include("includes/footer.html"); ?>

</body>
</html>
