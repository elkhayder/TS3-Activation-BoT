<?php 
error_reporting(0);
session_start();
if (!empty($_SESSION['error'])) {
    if (  $_SESSION['error']!== "" ) {
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
	<form method="post" action="step1.php" >
		<label class="error" ><font size="5" style="font-family: 'Ubuntu', cursive;" >Error : UID can't Be Blank</font></label></br></br>
		<label><font size="5" color="grey" style="font-family: 'Do Hyeon', sans-serif;" >UID</font></label></br>
		<input type="text" name="uid"></br>
		<input class="button button1" type="submit">
	</form>
</div>
</html>
<?php } else { ?>
<html>
<head>
	<title>TDE | Activation System</title>
	<link rel="icon" href="favicon.ico" type="image/x-icon"/>
	<link rel="shortcut icon" href="favicon.ico" type="image/x-icon"/>
	<link rel="stylesheet" type="text/css" href="style.css">
	<link href="https://fonts.googleapis.com/css?family=Do+Hyeon|Gugi|Ubuntu" rel="stylesheet">
</head>
<div>
	<form method="post" action="step1.php" >
		<label style="text-align : left;" >UID :   </label>
		<input id="uid" type="text" name="uid"></br>
		<input value="submit" class="button button1" type="submit">
	</form>
</div>
</html>
<?php } 
session_unset();
} else {
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
	<form method="post" action="step1.php" >
		<label><font size="5" color="grey" style="font-family: 'Do Hyeon', sans-serif;" >UID</font></label></br>
		<input type="text" name="uid"></br>
		<input class="button button1" type="submit" value="Verificate"></input>
	</form>
</div>
</html>
<?php
}
?>