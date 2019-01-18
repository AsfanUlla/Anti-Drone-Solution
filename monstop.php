<?php
$iw = shell_exec('iwconfig');
$card= shell_exec('iw dev | awk \'$1=="Interface"{print $2}\' | sed -e \'2d\' ');
$message = "Monitor mode already disabled";
$moncheck = shell_exec('iwconfig wlan1 | grep Monitor | sed -e "s/Mode:/ /" | awk \'{print $1}\' | cut -b 5');
	if ($moncheck == 1) {
		echo "Stoping Monitor Mode on $card";
		$output = shell_exec('sudo ifconfig wlan1 down && sudo iwconfig wlan1 mode managed && sudo ifconfig wlan1 up && iwconfig');
		echo "<pre>$output</pre>";
	} 
	else {
		echo "<script type='text/javascript'>alert('$message');</script>";
		echo "<pre>$iw</pre>";
	}
?>
