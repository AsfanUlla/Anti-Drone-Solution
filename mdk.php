<?php
$card = shell_exec('iw dev | awk \'$1=="Interface"{print $2}\' | sed -e \'2d\' ');
$message = "Monitor mode not  enabled";
$moncheck = shell_exec('iwconfig wlan1 | grep Monitor | sed -e "s/Mode:/ /" | awk \'{print $1}\' | cut -b 5');
$dall = shell_exec('sudo mdk3 wlan1 d ');
	if ($moncheck == 1) {
		echo "<pre>$dall</pre>";
	}
	else {
	echo "<pre>$message</pre>";
	}
?>

