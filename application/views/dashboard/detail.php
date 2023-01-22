<!-- Content page -->
<section class="bgwhite p-t-55 p-b-65">
<div class="container">
	<div class="row">
		<div class="col-sm-6 col-md-3 col-lg-3 p-b-50">
			<div class="leftbar p-r-20 p-r-0-sm">
				<!--  -->
				<?php include('menu.php'); ?>				
			</div>
		</div>

		<div class="col-sm-6 col-md-9 col-lg-9 p-b-50">
			<!-- Product -->
			
				
					<h2><?php echo $title; ?></h2>
					<hr>
				<p>Berikut adalah riwayat belanja Anda</p>

				<?php 
				// Jika ada Transaksi, tampilkan tabel
				if($header_transaksi) { 
				?>

				<table class="table table-bordered">
					<thead>
						<tr>
							<th width="20%">KODE TRANSAKSI</th>
							<th>: <?php echo $header_transaksi->kode_transaksi; ?></th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>Tanggal</td>
							<td>: <?php echo date('d-m-Y',strtotime($header_transaksi->tanggal_transaksi)); ?></td>
						</tr>

						<tr>
							<td>Jumlah Total</td>
							<td>: <?php echo number_format($header_transaksi->jumlah_transaksi); ?></td>
						</tr>

						<tr>
							<td>Status Bayar</td>
							<td>: <?php echo $header_transaksi->status_bayar; ?></td>
						</tr>

					</tbody>
				</table>
				
				<table class="table table-bordered" width="100%">
					<thead>
						<tr class="bg-success">
							<th>NO.</th>
							<th>KODE</th>
							<th>NAMA PRODUK</th>
							<th>JUMLAH</th>
							<th>HARGA</th>
							<th>SUB TOTAL</th>
							
						</tr>
					</thead>
					<tbody>
					   <?php $i=1; foreach ($transaksi as $transaksi) { ?>
						<tr>
							<td><?php echo $i; ?></td>
							<td><?php echo $transaksi->kode_produk; ?></td>
							<td><?php echo $transaksi->nama_produk; ?></td>
							<td><?php echo number_format($transaksi->jumlah); ?></td>
							<td><?php echo number_format($transaksi->harga); ?></td>
							<td><?php echo number_format($transaksi->total_harga); ?></td>
						</tr>
						<?php $i++; } ?>
					</tbody>
				</table>

				<?php 
				// Jika tidak, tampilakan notifikasi
				}else{ ?>
					<p class="alert alert-success">
						<i class="fa fa-warning"></i> Belum ada data transaksi </p>
					</p>

				<?php } ?>	
				
				
			

			
		</div>
	</div>
</div>
</section>

