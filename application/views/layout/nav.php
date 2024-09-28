<?php  
// AMBIL DATA MENU DARI KONFIGURASI
$nav_produk				= $this->konfigurasi_model->nav_produk();
$nav_produk_mobile		= $this->konfigurasi_model->nav_produk();
?>
<div class="wrap_header">
		<!-- Logo -->
		<a href="<?php echo base_url(); ?>" class="logo">
			<img src="<?php echo base_url('assets/upload/images/'.$site->logo); ?>" alt="<?php echo $site->namaweb; ?> | <?php echo $site->tagline; ?>">
		</a>

		<!-- Menu -->
		<div class="wrap_menu">
			<nav class="menu">
				<ul class="main_menu">
					<li>
						<a href="<?php echo base_url(); ?>">Beranda</a>
					</li>

					<li>
						<a href="<?php echo base_url('produk'); ?>">Produk</a>
						<ul class="sub_menu">
							<?php foreach ($nav_produk as $nav_produk) { ?>
							<li><a href="<?php echo base_url('produk/kategori/'.$nav_produk->slug_kategori); ?>">
								<?php echo $nav_produk->nama_kategori; ?>
							</a></li>
							<?php } ?>
						</ul>
					</li>

					<li>
						<a href="<?php echo base_url('toko'); ?>">Toko &amp; Cabang</a>
					</li>
					<li>
						<a href="<?php echo base_url('berita'); ?>">Berita &amp; Promosi</a>
					</li>

				</ul>
			</nav>
		</div>

		
		
	</div>
</div>


<!-- Header Mobile -->
<div class="wrap_header_mobile">
	<!-- Logo moblie -->
	<a href="<?php echo base_url(); ?>" class="logo-mobile">
		<img src="<?php echo base_url('assets/upload/images/'.$site->logo); ?>" alt="<?php echo $site->namaweb; ?> | <?php echo $site->tagline; ?>">
	</a>

	<!-- Button show menu -->
	<div class="btn-show-menu">
		

		<div class="btn-show-menu-mobile hamburger hamburger--squeeze">
			<span class="hamburger-box">
				<span class="hamburger-inner"></span>
			</span>
		</div>
	</div>
</div>

<!-- Menu Mobile -->
<div class="wrap-side-menu" >
	<nav class="side-menu">
		<ul class="main-menu">
			<li class="item-topbar-mobile p-l-20 p-t-8 p-b-8">
				<span class="topbar-child1">
					<?php echo $site->alamat; ?>
				</span>
			</li>

			<li class="item-topbar-mobile p-l-20 p-t-8 p-b-8">
				<div class="topbar-child2-mobile">
					<span class="topbar-email">
						<?php echo $site->email; ?>
					</span>

					<div class="topbar-language rs1-select2">
						<select class="selection-1" name="time">
							<option><?php echo $site->telepon; ?></option>
							<option><?php echo $site->alamat; ?></option>
						</select>
					</div>
				</div>
			</li>

			<li class="item-topbar-mobile p-l-10">
				<div class="topbar-social-mobile">
					<a href="<?php echo $site->facebook; ?>" class="topbar-social-item fa fa-facebook"></a>
					<a href="<?php echo $site->instagram; ?>" class="topbar-social-item fa fa-instagram"></a>
				</div>
			</li>

			<li class="item-menu-mobile">
				<a href="<?php echo base_url(); ?>">Beranda</a>
			</li>

			<li class="item-menu-mobile">
				<a href="<?php echo base_url('produk'); ?>">Produk</a>
				<ul class="sub_menu">
							<?php foreach ($nav_produk_mobile as $nav_produk_mobile) { ?>
							<li><a href="<?php echo base_url('produk/kategori/'.$nav_produk_mobile->slug_kategori); ?>">
								<?php echo $nav_produk_mobile->nama_kategori; ?>
							</a></li>
							<?php } ?>
						</ul>
				<i class="arrow-main-menu fa fa-angle-right" aria-hidden="true"></i>
			</li>

			<li class="item-menu-mobile">
				<a href="<?php echo base_url('toko'); ?>">Toko &amp; Cabang</a>
			</li>

			<li class="item-menu-mobile">
				<a href="<?php echo base_url('berita'); ?>">Berita &amp; Promosi</a>
			</li>
		</ul>
	</nav>
</div>
</header>
