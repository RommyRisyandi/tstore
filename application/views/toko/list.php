<!-- Banner -->
<section class="banner bgwhite p-t-40 p-b-40">
		<div class="container">
			<div class="row">

        <?php foreach($toko as $toko) { ?>
				<div class="col-sm-10 col-md-8 col-lg-4 m-l-r-auto">
					<!-- block1 -->
					<div class="block1-overlay hov-img-zoom pos-relative m-b-30">
						<img src="<?php echo base_url('assets/upload/images/'.$toko->gambar); ?>" alt="IMG-BENNER">
            <div class="ab-t-l sizefull flex-col-c-m p-l-15 p-r-15">
            <span class="m-text9 fs-20-sm"><?php echo $toko->nama_toko; ?></span>
            <span class="l-text1 fs-35-sm"><?php echo $toko->alamat; ?></span>
            <span class="m-text9 fs-20-sm"><?php echo $toko->no_wa; ?></span>
            <a href="<?php echo $toko->link_alamat; ?>">
          <img class="" src="<?php echo base_url('asset/images/icons/map-marker.png'); ?>"></a>
            </div>

						<div class="block1-wrapbtn w-size2">
							<!-- Button -->
							<a href="<?php echo base_url('toko/cabang/'.$toko->id_toko); ?>" class="flex-c-m size2 m-text2 bg3 hov1 trans-0-4">
								Cabang (<?php echo $toko->total_cabang; ?>)
							</a>
						</div>
					</div>
				</div>
        <?php } ?>

				</div>
			</div>
		</div>
	</section>