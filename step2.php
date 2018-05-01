<html>
<head>
	<title>TDE | Activation System</title>
	<link rel="icon" href="favicon.ico" type="image/x-icon"/>
	<link rel="shortcut icon" href="favicon.ico" type="image/x-icon"/>
	<link rel="stylesheet" type="text/css" href="style.css">
	<link href="https://fonts.googleapis.com/css?family=Do+Hyeon|Gugi|Ubuntu" rel="stylesheet">
</head>
<div>
<?php
session_start();
require_once("TeamSpeak3/TeamSpeak3.php");
require_once("config.php");
$verification_code = $_SESSION['verification_code'];
$uid = $_SESSION['uid'];
$ts3_VirtualServer = TeamSpeak3::factory("serverquery://$login:$pass@$ip:$qport/?server_port=$port&blocking=0&nickname=$name");
$client = $servergroups = $ts3_VirtualServer->clientGetByUid("$uid");
$_SESSION ['servergroups'] = explode(",", $client["client_servergroups"]);
if ( $_POST["verification_code"] == $verification_code ) {
	if(in_array(10,$_SESSION['servergroups'])) {
		echo "<label class='error'><font size='5'style='font-family: 'Bree Serif', serif;' >You are already activated.</font></label>"; 
		die();
	} else {
		if(in_array(15,$_SESSION['servergroups'])) {
			echo "<label class='error'><font size='5'style='font-family: 'Bree Serif', serif;' >You are already V.I.P, you don't need Activation</font></label>";
			die();
		} else {
			if(in_array(14,$_SESSION['servergroups'])) {
				echo "<label class='error'><font size='5'style='font-family: 'Bree Serif', serif;' >You are already a Moderator</font></label>";
				die();
			} else {
				if(in_array(13,$_SESSION['servergroups'])) {
					echo "<label class='error'><font size='5'style='font-family: 'Bree Serif', serif;' >You are already a Super Moderator</font></label>";
					die();
				} else {
					if(in_array(46,$_SESSION['servergroups'])) {
						echo "<label class='error'><font size='5'style='font-family: 'Bree Serif', serif;' >You are already a Community Chief</font></label>";
						die();
					} else {
						if(in_array(9,$_SESSION['servergroups'])) {
							echo "<label class='error'><font style='font-family: 'Bree Serif', serif;' size='5'>Nta rak Mol chi a weld l9ahba -_- ach baghi chi activation -_-</font></label>";
							die();
						} else {
								$uid = $_SESSION['uid'];
								sleep(0.1);
								$ts3_VirtualServer->clientGetByUid("$uid")->addServerGroup(10);
								echo "<label class='success'><font size='5' style='font-family: 'Bree Serif', serif;' >You've get activated</font></label>";
								sleep(1);
								$client = $ts3_VirtualServer->clientGetByUid("$uid");
								$ts3_VirtualServer->clientPoke($client, "[color=green]You've get activated[/color]");
								$ts3_VirtualServer->clientGetByUid("$uid")->move(72);
								sleep(20);
								header('Location: http://'. $website .'');
							}
						}
					}
				}	
			}
		}
} else {
	echo "<label class='error' style='font-family: 'Bree Serif', serif;'>Sorry, Verification Code is incorrect</label>";
}
session_unset();
?>