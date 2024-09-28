<section class="bgwhite p-t-60 p-b-25">
		<div class="container">
			<div class="row">
        
				<div class="col-md-8 col-lg-9 p-b-80">
					<div class="p-r-50 p-r-0-lg">
						<div class="p-b-40">
							<div class="blog-detail-img wrap-pic-w">
								<img src="<?php echo base_url('assets/upload/berita/'.$berita->gambar); ?>" alt="IMG-BLOG">
							</div>

							<div class="blog-detail-txt p-t-33">
								<h4 class="p-b-11 m-text24">
									<?php echo $berita->judul; ?>
								</h4>

								<div class="s-text8 flex-w flex-m p-b-21">

									<span>
										<?php echo $berita->tanggal_post; ?>
										<span class="m-l-3 m-r-6">|</span>
									</span>

								</div>

								<p class="p-b-25">
									<?php echo $berita->keterangan; ?>
								</p>

								
							</div>

						</div>
						
					</div>
				</div>

				<div class="col-md-4 col-lg-3 p-b-80">
					<div class="rightbar">
						<!-- Categories -->
						<h4 class="m-text23 p-t-56 p-b-34">
							Kategori Produk
						</h4>

						<ul>
              <?php foreach ($listing_kategori as $listing_kategori) { ?>
							<li class="p-t-6 p-b-8 bo6">
								<a href="<?php echo base_url('produk/kategori/'.$listing_kategori->nama_kategori) ?>" class="s-text13 p-t-5 p-b-5">
									<?php echo $listing_kategori->nama_kategori; ?>
								</a>
							</li>
                <?php } ?>
						</ul>

						<!-- Featured Products -->
						<h4 class="m-text23 p-t-65 p-b-34">
							Related Products
						</h4>

						<ul class="bgwhite">
              <?php foreach ($produk_related as $produk_related) { ?>
							<li class="flex-w p-b-20">
								<a href="<?php echo base_url('produk/detail/'.$produk_related->id_produk) ?>" class="dis-block wrap-pic-w w-size22 m-r-20 trans-0-4 hov4">
									<img src="<?php echo base_url('assets/upload/images/'.$produk_related->gambar) ?>" alt="IMG-PRODUCT">
								</a>

								<div class="w-size23 p-t-5">
									<a href="<?php echo base_url('produk/detail/'.$produk_related->id_produk) ?>" class="s-text20">
										<?php echo $produk_related->nama_produk; ?>
									</a>

									<span class="dis-block s-text17 p-t-6">
										Rp.<?php echo number_format($produk_related->harga,'0',',','.'); ?>
									</span>
								</div>
							</li>
                <?php } ?>
						</ul>

						
					</div>
				</div>
			</div>
		</div>
	</section>