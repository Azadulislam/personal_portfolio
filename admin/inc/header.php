<?php
	session_start();
	use classes\Database;
	include_once ('classes/Database.php');
	$db = new classes\Database;
	$img = $db->select("SELECT * FROM `images`");
	$image = $img->fetch_assoc();
	$img_dir = "uploades/img_file/";
	if(!isset($_SESSION['user'])){
		header('location:login');
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
	<meta name="description" content="">
	<meta name="author" content="">
	<link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
	<title><?= $title ?></title>
	<link rel="shortcut icon" href="<?= $img_dir.$image['fav_icon'] ?>" type="image/x-icon">
	<link rel="stylesheet" href="assets/plugin/tinymce/skins/lightgray/skin.min.css">
	<!--Bootstrap Styles-->
	<link rel="stylesheet" href="assets\plugin\bootstrap\css\bootstrap.css">
	<!-- Logo  -->
	
	
	
	<!-- TinyMCE -->
	<!-- Must include this script FIRST -->
	<script src="assets/plugin/tinymce/tinymce.min.js"></script>
	
	<!-- mCustomScrollbar -->
	<link rel="stylesheet" href="assets/plugin/mCustomScrollbar/jquery.mCustomScrollbar.min.css">

	<!-- Waves Effect -->
	<link rel="stylesheet" href="assets/plugin/waves/waves.min.css">
	
	<!-- Sweet Alert -->
	<link rel="stylesheet" href="assets/plugin/sweet-alert/sweetalert.css">
	
	<!-- Datepicker -->
	<link rel="stylesheet" href="assets/plugin/datepicker/css/bootstrap-datepicker.min.css">
	
	
	<!-- Percent Circle -->
	<link rel="stylesheet" href="assets/plugin/percircle/css/percircle.css">
	
	<!-- Chartist Chart -->
	<link rel="stylesheet" href="assets/plugin/chart/chartist/chartist.min.css">
	
	<!-- Dropify -->
	<link rel="stylesheet" href="assets/plugin/dropify/css/dropify.min.css">
	<!-- FullCalendar -->
	<link rel="stylesheet" href="assets/plugin/fullcalendar/fullcalendar.min.css">
	<link rel="stylesheet" href="assets/plugin/fullcalendar/fullcalendar.print.css" media='print'>
	<!-- Main Styles -->
	<link rel="stylesheet" href="assets/styles/style.min.css">
	
	<!-- Dark Themes -->
	<link rel="stylesheet" href="assets/styles/style-dark.min.css">
	
	<!-- Data Tables -->
	<link rel="stylesheet" href="assets/plugin/datatables/media/css/dataTables.bootstrap.min.css">
	<link rel="stylesheet" href="assets/plugin/datatables/extensions/Responsive/css/responsive.bootstrap.min.css">
	
	<!--Custom Style -->
	<link rel="stylesheet" href="scss\css\style.css">
	
	
</head>
<body>
	