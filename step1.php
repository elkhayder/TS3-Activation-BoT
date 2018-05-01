<?php
session_start();
	require_once("config.php");
	if ( $_POST["uid"] == "" ) {
		$_SESSION['error'] = "UID can't be Blank";
		header('Location: index.php');
		die();
	}
	$uid = $_POST["uid"];
	$_SESSION['uid'] = $uid;
	$verification_code = strtoupper(get_rand_alphanumeric(6));
//////////////////////////////////////////
	$_SESSION['verification_code'] = $verification_code;
	require_once("TeamSpeak3/TeamSpeak3.php");
	$ts3_VirtualServer = TeamSpeak3::factory("serverquery://$login:$pass@$ip:$qport/?server_port=$port&blocking=0&nickname=$name");
	$client = $ts3_VirtualServer->clientGetByUid("$uid");
	$Client = $ts3_VirtualServer->clientGetByUid("$uid");
	$ts3_VirtualServer->clientPoke($client, "Your Verification Code is : $verification_code ");
	$client = $servergroups = $ts3_VirtualServer->clientGetByUid("$uid");
?>
<html>
<head>
	<title>TDE | Activation System</title>
	<link rel="icon" href="favicon.ico" type="image/x-icon"/>
	<link rel="shortcut icon" href="favicon.ico" type="image/x-icon"/>
	<link rel="stylesheet" type="text/css" href="style.css">
	<link href="https://fonts.googleapis.com/css?family=Do+Hyeon|Gugi|Ubuntu" rel="stylesheet">
</head>
<div>
<form action="step2.php" method="post">
<label style="text-align : left;" ><font size="5" style="font-family: 'Ubuntu', cursive;" ><code>If you are </code><?php echo $client ?><code>, Please Enter the verification code you've receive</code></font></label></br></br>
<label style="text-align : left;" ><font size="5" color="grey" style="font-family: 'Do Hyeon', sans-serif;" >Verification Code</font></label></br>
<input type="text" name="verification_code"></br>
<input class="button button1" type="submit">
</form>
</div>