<?php 
//Loading konfigurasi website
$site = $this->konfigurasi_model->listing();
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title><?php echo $title; ?></title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
<!-- ICON Dari konfigurasi website -->
	<link rel="icon" type="image/png" href="<?php echo base_url('assets/upload/images/'.$site->icon);?>"/>
<!-- SEO Google -->
<meta name="keywords" content="<?php echo $site->keywords; ?>">
<meta name="description" content="<?php echo $title; ?>, <?php echo $site->deskripsi; ?>">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>/asset/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>/asset/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>/asset/fonts/themify/themify-icons.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>/asset/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>/asset/fonts/elegant-font/html-css/style.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>/asset/vendor/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>/asset/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>/asset/vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>/asset/vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>/asset/vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>/asset/vendor/slick/slick.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>/asset/vendor/lightbox2/css/lightbox.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>/asset/css/util.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>/asset/css/main.css">
<!--===============================================================================================-->
<!-- Rating -->
<!-- Custom CSS -->
<link href="<?php echo base_url(); ?>asset5/css/style.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>asset5/css/bootstrap.min.css" rel="stylesheet">
<!--===============================================================================================-->
<style type="text/css" media="screen">
	ul.pagination {
		padding: 0 10px;
		background-color: red;
		border-radius: 10px;
		text-align: center !important;
	}
	.pagination a, .pagination b{
		padding: 10px 20px;
		text-decoration: none;
		border-radius: 50px;
		margin: 5px;
		float: left;
	}
	.pagination strong {
		padding: 10px 20px;
		text-decoration: none;
		border-radius: 50px;
		background-color: black;
		color: white;
		float:left
	}
	.pagination a {
		background-color: red;
		
		color: white;
	}
	.pagination b {
		background-color: black;
		color: white;
	}
	.pagination a:hover {
		background-color: black;
	}
</style>

</head>
<body class="animsition">