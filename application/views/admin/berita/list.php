<p>
	<a href="<?php echo base_url('admin/berita/tambah')?>" class="btn btn-success btn-lg">
		<i class="fa fa-plus"></i> Tambah Berita Baru
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
		<th>Judul</th>
		<th>Tanggal Post</th>
		<th>Aksi</th>
	    </tr>
	</thead>
	<tbody>
		<?php $no=1; foreach($berita as $berita) { ?>
		<tr>
			<td><?php echo $no++; ?></td>
			<td> <img src="<?php echo base_url('assets/upload/berita/'.$berita->gambar)?>" class="img img-responsive img-thumbnail" width="60"></td>
			<td><?php echo $berita->judul; ?></td>
			<td><?php echo $berita->tanggal_post; ?></td>
			<td>
				<a href="<?php echo base_url('admin/berita/edit/'.$berita->id_berita) ?>" class="btn btn-warning btn-xs"><i class="fa fa-edit"></i> Ubah</a>
				<?php include('delete.php') ?>
			</td>
		</tr>
		<?php } ?>
	</tbody>
</table>

