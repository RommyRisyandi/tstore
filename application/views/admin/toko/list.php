<p>
	<a href="<?php echo base_url('admin/toko/tambah')?>" class="btn btn-success btn-lg">
		<i class="fa fa-plus"></i> Tambah Toko Baru
	</a>

	</p>
<?php 
// Notifikasi
if($this->session->flashdata('sukses')) {
	echo '<p class="alert alert-success">';
	echo $this->session->flashdata('sukses');
	echo '</div>';
 }
 ?>
<table class="table table-bordered" id="example1">
	
	<thead>
		<tr>
		<th>No.</th>
		<th>Gambar</th>
		<th>Nama</th>
		<th>Nama Pemilik</th>
		<th>No.Whatsapp</th>
		<th>Aksi</th>
	    </tr>
	</thead>
	<tbody>
		<?php $no=1; foreach($toko as $toko) { ?>
		<tr>
			<td><?php echo $no++; ?></td>
			<td> <img src="<?php echo base_url('assets/upload/images/'.$toko->gambar)?>" class="img img-responsive img-thumbnail" width="60"></td>
			<td><?php echo $toko->nama_toko; ?></td>
			<td><?php echo $toko->nama_pemilik; ?></td>
			<td><?php echo $toko->no_wa; ?></td>
			<td>
        <a href="<?php echo base_url('admin/toko/cabang/'.$toko->id_toko) ?>" class="btn btn-success btn-xs"><i class="fa fa-image"></i> Cabang (<?php echo $toko->total_cabang; ?>)</a>
				<a href="<?php echo base_url('admin/toko/edit/'.$toko->id_toko) ?>" class="btn btn-warning btn-xs"><i class="fa fa-edit"></i> Ubah</a>
				<?php include('delete.php') ?>
			</td>
		</tr>
		<?php } ?>
	</tbody>
</table>

