
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
		<th>Gambar Produk</th>
		<th>Nama Produk</th>
		<th>Nama User</th>
		<th>Nilai Rating</th>
		<th>Keterangan</th>
		<th>Tanggal Post</th>
		<th>Aksi</th>
	    </tr>
	</thead>
	<tbody>
		<?php $no=1; foreach($rating as $rating) { ?>
		<tr>
			<td><?php echo $no++; ?></td>
			<td> <img src="<?php echo base_url('assets/upload/images/'.$rating->gambar)?>" class="img img-responsive img-thumbnail" width="60"></td>
			<td><?php echo $rating->nama_produk; ?></td>
			<td><?php echo $rating->nama; ?></td>
			<td><?php echo $rating->nilai_rating; ?></td>
			<td><?php echo $rating->keterangan;  ?></td>
      <td><?php echo $rating->tanggal_post ?></td>
			<td>
					<a href="<?php echo base_url('admin/produk/delete_rating/'.$rating->id_rating) ?>" class="btn btn-danger btn-xs" onclick="return confirm('Apakah anda yakin ingin menghapus Rating ini?')"><i class="fa fa-trash-o"></i> Hapus</a>
			</td>
		</tr>
		<?php } ?>
	</tbody>
</table>

