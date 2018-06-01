<!doctype html>
<html lang="en">
<head>
  <?php include("includes/head.html"); ?>
  <script type="text/javascript" src="livebox.js"></script>
</head>

<body>

<?php include("includes/header.html"); ?>

<?php include("includes/nav.html"); ?>


<article>

  
<h1> Décodeur </h1>

<input type="button" value="ON/OFF" onclick="AJAX_livebox('116', '0')"> <br />

<input type="button" value="0" onclick="AJAX_livebox('512', '0')"> <br />
<input type="button" value="1" onclick="AJAX_livebox('513', '0')"> <br />
<input type="button" value="2" onclick="AJAX_livebox('514', '0')"> <br />
<input type="button" value="3" onclick="AJAX_livebox('515', '0')"> <br />
<input type="button" value="4" onclick="AJAX_livebox('516', '0')"> <br />
<input type="button" value="5" onclick="AJAX_livebox('517', '0')"> <br />
<input type="button" value="6" onclick="AJAX_livebox('518', '0')"> <br />
<input type="button" value="7" onclick="AJAX_livebox('519', '0')"> <br />
<input type="button" value="8" onclick="AJAX_livebox('520', '0')"> <br />
<input type="button" value="9" onclick="AJAX_livebox('521', '0')"> <br />

<input type="button" value="CH+" onclick="AJAX_livebox('402', '0')"> <br />
<input type="button" value="CH-" onclick="AJAX_livebox('403', '0')"> <br />

<input type="button" value="VOL+" onclick="AJAX_livebox('115', '0')"> <br />
<input type="button" value="VOL-" onclick="AJAX_livebox('114', '0')"> <br />

<input type="button" value="Mute" onclick="AJAX_livebox('113', '0')"> <br />

<input type="button" value="Up"    onclick="AJAX_livebox('103', '0')"> <br />
<input type="button" value="Down"  onclick="AJAX_livebox('108', '0')"> <br />
<input type="button" value="Left"  onclick="AJAX_livebox('105', '0')"> <br />
<input type="button" value="Right" onclick="AJAX_livebox('116', '0')"> <br />

<input type="button" value="Ok" onclick="AJAX_livebox('352', '0')"> <br />
<input type="button" value="Back" onclick="AJAX_livebox('158', '0')"> <br />
<input type="button" value="Menu" onclick="AJAX_livebox('139', '0')"> <br />

<input type="button" value="Play/Pause" onclick="AJAX_livebox('164', '0')"> <br />
<input type="button" value="FBWD" onclick="AJAX_livebox('168', '0')"> <br />
<input type="button" value="FFWD" onclick="AJAX_livebox('159', '0')"> <br />

<input type="button" value="Rec" onclick="AJAX_livebox('167', '0')"> <br />
<input type="button" value="Vod" onclick="AJAX_livebox('393', '0')"> <br />

<!--
116 : ON/OFF
512 : 0
513 : 1
514 : 2
515 : 3
516 : 4
517 : 5
518 : 6
519 : 7
520 : 8
521 : 9
402 : CH+
403 : CH-
115 : VOL+
114 : VOL-
113 : MUTE
103 : UP
108 : DOWN
105 : LEFT
116 : RIGHT
352 : OK
158 : BACK
139 : MENU
164 : PLAY/PAUSE
168 : FBWD
159 : FFWD
167 : REC
393 : VOD

-->

<textarea rows="20" cols="100" id="log_livebox">
Console initialisée
</textarea>
<br/>

<input type="button" value="Effacer console" onclick="clear_log_livebox()"> <br/>

</article>

<?php include("includes/footer.html"); ?>

</body>
</html>
