<!-- breadcrumb -->
<div class="bread-crumb bgwhite flex-w p-l-52 p-r-15 p-t-30 p-l-15-sm">
<a href="<?php echo base_url(); ?>" class="s-text16">
	Home
	<i class="fa fa-angle-right m-l-8 m-r-9" aria-hidden="true"></i>
</a>

<a href="<?php echo base_url('produk'); ?>" class="s-text16">
	Produk
	<i class="fa fa-angle-right m-l-8 m-r-9" aria-hidden="true"></i>
</a>

<span class="s-text17">
	<?php echo $title; ?>
</span>
</div>

<!-- Product Detail -->
<div class="container bgwhite p-t-35 p-b-80">
<div class="flex-w flex-sb">
	<div class="w-size13 p-t-30 respon5">
		<div class="wrap-slick3 flex-sb flex-w">
			<div class="wrap-slick3-dots"></div>

			<div class="slick3">
				<div class="item-slick3" data-thumb="<?php echo base_url('assets/upload/images/'.$produk->gambar); ?>">
					<div class="wrap-pic-w">
						<img src="<?php echo base_url('assets/upload/images/'.$produk->gambar); ?>" alt="<?php echo $produk->nama_produk; ?>">
					</div>
					
					<div class="rating">
						Nilai Rating : ☆ <?php echo number_format($produk->total_rating,'0',','); ?>
					</div>
				
				</div>
				
			</div>
		</div>
	</div>

	<div class="w-size14 p-t-30 respon5">
		<h1 class="product-detail-name m-text20 p-b-13">
			<?php echo $title; ?>
		</h1>
		<div class="clearfix"></div>
		<?php if($this->session->flashdata('sukses')) {
			echo '<div class="alert alert-warning">';
			echo $this->session->flashdata('sukses');
			echo '</div>';
		} ?>

		<?php
		if(isset($error)) {
			echo '<p class="alert alert-warning">';
			echo $error;
			echo '</p>';
		}
		// Notifikasi error
		echo validation_errors('<div class="alert alert-warning">','</div>'); 
		// form untuk memproses rating
		echo form_open(base_url('produk/detail/'.$produk->id_produk)); 
		// elemen yang dibawa
		echo form_hidden('id',$produk->id_produk);
		//echo form_hidden('qty', 1);
		// echo form_hidden('price',$produk->harga);
		// echo form_hidden('name', $produk->nama_produk);
		// elemen redirect
		echo form_hidden('redirect_page', str_replace('index.php/','',current_url()));
		?>

		<span class="m-text14">
			Rp. <?php echo number_format($produk->harga,'0',',','.'); ?>
		</span>

		<p class="s-text8 p-t-10">
			<?php echo $produk->keterangan; ?>
		</p>

		<!-- Form Rating  -->
		<div class=" p-b-60">
			<div class="flex-r-m flex-w p-t-10">
			<form class="leave-comment">
						<h4 class="m-text26 p-b-36 p-t-15">
							Silahkan Masukan Rating Produk ini
						</h4>

						<div class="bo4 of-hidden size15 m-b-20">
							<input class="sizefull s-text7 p-l-22 p-r-22" type="text" name="nama" placeholder="Nama Anda"
							value="<?php echo set_value('nama');?>" required>
						</div>

						<div class="rating">
							<input type="radio" name="nilai_rating" value="5" id="5"><label for="5">☆</label>
							<input type="radio" name="nilai_rating" value="4" id="4"><label for="4">☆</label>
							<input type="radio" name="nilai_rating" value="3" id="3"><label for="3">☆</label>
							<input type="radio" name="nilai_rating" value="2" id="2"><label for="2">☆</label>
							<input type="radio" name="nilai_rating" value="1" id="1"><label for="1">☆</label>
						</div>

						<textarea class="dis-block s-text7 size20 bo4 p-l-22 p-r-22 p-t-13 m-b-20" name="keterangan" placeholder="Masukan Saran Anda..." value="<?php echo set_value('keterangan'); ?>"></textarea>

						<div class="w-size25">
							<!-- Button -->
							<button class="flex-c-m size2 bg1 bo-rad-23 hov1 m-text3 trans-0-4" type="submit">
								Kirim
							</button>
						</div>
					</form>
				</div>
			</div>
		</div>
		<?php 
		//closing form 
		echo form_close();
		?>
		</div>
</div>
</div>


<!-- Relate Product -->
<section class="relateproduct bgwhite p-t-45 p-b-138">
<div class="container">
	<div class="sec-title p-b-60">
		<h3 class="m-text5 t-center">
			Related Products
		</h3>
	</div>

	<!-- Slide2 -->
	<div class="wrap-slick2">
		<div class="slick2">

		<?php foreach ($produk_related as $produk_related) { ?>
		<div class="item-slick2 p-l-15 p-r-15">
		<?php 
		// form untuk memproses belanjaan
		echo form_open(base_url('produk/detail/')); 
		// elemen yang dibawa
		echo form_hidden('id',$produk_related->id_produk);
		// echo form_hidden('qty', 1);
		// echo form_hidden('price',$produk_related->harga);
		// echo form_hidden('name', $produk_related->nama_produk);
		// elemen redirect
		echo form_hidden('redirect_page', str_replace('index.php/','',current_url()));
		?>
				

				<!-- Block2 -->
				<div class="block2">
					<div class="block2-img wrap-pic-w of-hidden pos-relative block2-labelnew">
						<img src="<?php echo base_url('assets/upload/images/'.$produk_related->gambar); ?>" alt="<?php echo $produk_related->nama_produk; ?>">

						<div class="block2-overlay trans-0-4">
							<a href="#" class="block2-btn-addwishlist hov-pointer trans-0-4">
								<i class="icon-wishlist icon_heart_alt" aria-hidden="true"></i>
								<i class="icon-wishlist icon_heart dis-none" aria-hidden="true"></i>
							</a>

							
						</div>
					</div>

					<div class="block2-txt p-t-20">
						<a href="<?php echo base_url('produk/detail/'.$produk_related->id_produk); ?>" class="block2-name dis-block s-text3 p-b-5">
							<?php echo $produk_related->nama_produk; ?>
						</a>

						<span class="block2-price m-text6 p-r-5">
							Rp. <?php echo number_format($produk_related->harga,'0',',','.'); ?>
						</span>
					</div>
				</div>

				<?php 
				//closing form 
				echo form_close();
				?>

			
		</div>
		<?php } ?>
	</div>
	</div>

</div>
</section>