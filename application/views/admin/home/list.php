<p>
	<a href="<?php echo base_url('admin/home/tambah')?>" class="btn btn-success btn-lg">
		<i class="fa fa-plus"></i> Tambah User Baru
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
		<th>Nama</th>
		<th>Email</th>
		<th>Username</th>
		<th>Level</th>
		<th>Aksi</th>
	    </tr>
	</thead>
	<tbody>
		<?php $no=1; foreach($home as $home) { ?>
		<tr>
			<td><?php echo $no++; ?></td>
			<td><?php echo $home->nama; ?></td>
			<td><?php echo $home->email; ?></td>
			<td><?php echo $home->username; ?></td>
			<td><?php echo $home->akses_level; ?></td>
			<td>
				<a href="<?php echo base_url('admin/home/edit/'.$home->id_user) ?>" class="btn btn-warning btn-xs"><i class="fa fa-edit"></i> Ubah</a>
				<a href="<?php echo base_url('admin/home/delete/'.$home->id_user) ?>" class="btn btn-danger btn-xs" onclick="return confirm('Apakah anda yakin ingin menghapus User ini?')"><i class="fa fa-trash-o"></i> Hapus</a>
			</td>
		</tr>
		<?php } ?>
	</tbody>
</table>

