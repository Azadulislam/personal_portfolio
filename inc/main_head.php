<?php
  include_once ("admin/classes/Database.php");
  $db = new classes\Database;

  $sel_admin = $db->select("SELECT * FROM `administrator`");
  $admin = $sel_admin->fetch_assoc();
  $sel_img = $db->select("SELECT * FROM `images`");
  $img = $sel_img->fetch_assoc();
  $dir = "admin/uploades/img_file/";
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="IE=7">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="keywords" content="html,css,html5,azadkh,azad kh,developer azad, fullstuck web pro azad">
    <meta name="author" content="Azadul islam">
    <meta name="description" content="Web veleloper">
    <meta property="og:image" content="<?= $dir.$admin['profile_img'] ?>" />
    
    <link rel="shortcut icon" href="<?= $dir.$img['fav_icon'] ?>" type="image/x-icon">
    <link href="<?= $dir.$img['logo_img'] ?>" rel="icon" type="image/png">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css\bootstrap.min.css">
    <title><?php echo $title ?></title>
    <!-- animated heding -->
    <link rel="stylesheet" href="css/style.css">
    <!-- font awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.14.0/css/all.css" integrity="sha384-HzLeBuhoNPvSl5KYnjx0BT+WB0QEEqLprO+NBkkk5gbc67FTaL7XIGa2w1L0Xbgc" crossorigin="anonymous">
    <!-- font link -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;1,400;1,500&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,300;0,423;1,400&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Merriweather:ital,wght@0,300;0,400;1,900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro&display=swap" rel="stylesheet">
    <!-- owl carousel css -->
    <link rel="stylesheet" href="css\owl.carousel.min.css">
    <link rel="stylesheet" href="css\owl.theme.default.min.css">
    <!-- common style.css -->
    <link rel="stylesheet" href="scss/style.css">
    
    <script src="js/modernizr.js"></script> 
    </head>
    <body>
      