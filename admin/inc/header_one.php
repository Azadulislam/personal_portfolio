<?php
	session_start();
	include_once ('classes/Database.php');
	include_once ('classes/Admin.php');
	$db = new classes\Database;
	$admin = new classes\Admin;
	$img = $db->select("SELECT * FROM `images`");
	$image = $img->fetch_assoc();
	$dir = "uploades/img_file/";
?>
<?php
	$admins = $db->select("SELECT * FROM `administrator`");
	$adm = $admins->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
	<meta name="description" content="">
	<meta name="author" content="">
	<link rel="shortcut icon" href="<?= $dir.$image['fav_icon'] ?>" type="image/x-icon">

	<title><?= $title ?></title>
	<link rel="stylesheet" href="assets/styles/style.min.css">

	<!-- Waves Effect -->
	<link rel="stylesheet" href="assets/plugin/waves/waves.min.css">

</head>

<body>

<div id="single-wrapper">

