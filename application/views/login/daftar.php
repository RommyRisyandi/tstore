<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Daftar Akun</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		
		<!-- MATERIAL DESIGN ICONIC FONT -->
		<link rel="stylesheet" href="<?php echo base_url();?>/asset3/fonts/material-design-iconic-font/css/material-design-iconic-font.min.css">

		<!-- STYLE CSS -->
		<link rel="stylesheet" href="<?php echo base_url();?>/asset3/css/style.css">
	</head>

	<body>

		<div class="wrapper" style="background-image: url('<?php echo base_url();?>/asset3/images/bg-registration-form-1.jpg');">
			<div class="inner">
				<div class="image-holder">
					<img src="<?php echo base_url();?>/asset3/images/registration-form-1.jpg" alt="">
				</div>
				<form action="">
					<?php echo form_open('user/adaftar');?>
					<h3>Daftar Akun</h3>
					<div class="form-group">
						<input type="text" placeholder="Nama Awal" class="form-control">
						<input type="text" placeholder="Nama Akhir" class="form-control">
					</div>
					<div class="form-wrapper">
						<input type="text" placeholder="Username" class="form-control">
						<i class="zmdi zmdi-account"></i>
					</div>
					<div class="form-wrapper">
						<input type="text" placeholder="Alamat Email" class="form-control">
						<i class="zmdi zmdi-email"></i>
					</div>
					<div class="form-wrapper">
						<select name="jenis_kelamin" id="" class="form-control">
							<option value="" disabled selected>Jenis Kelamin</option>
							<option value="Laki-laki">Laki-laki</option>
							<option value="Perempuan">Perempuan</option>
							<option value="Lain2">Lain2</option>
						</select>
						<i class="zmdi zmdi-caret-down" style="font-size: 17px"></i>
					</div>
					<div class="form-wrapper">
						<input type="password" placeholder="Masukkan Password" class="form-control">
						<i class="zmdi zmdi-lock"></i>
					</div>
					<div class="form-wrapper">
						<input type="password" placeholder="Konfirmasi Password" class="form-control">
						<i class="zmdi zmdi-lock"></i>
					</div>
					<div class="form-wrapper">
						<input type="level" class="form-control" value="user" readonly>
						<i class="zmdi zmdi-lock"></i>
					</div>
					<button>Daftar Akun
						<i class="zmdi zmdi-arrow-right"></i>
					</button>
					<?php echo form_close(); ?>
				</form>
			</div>
		</div>
		
	</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>