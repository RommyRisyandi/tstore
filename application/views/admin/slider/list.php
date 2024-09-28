<p>
	<a href="<?php echo base_url('admin/slider/tambah')?>" class="btn btn-success btn-lg">
		<i class="fa fa-plus"></i> Tambah Slider Baru
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
		<th>Aksi</th>
	    </tr>
	</thead>
	<tbody>
		<?php $no=2; foreach($slider as $slider) { ?>
		<tr>
			<td><?php echo $no++; ?></td>
			<td> <img src="<?php echo base_url('assets/upload/slider/'.$slider->slider)?>" class="img img-responsive img-thumbnail" width="60"></td>
			<td><?php echo $slider->judul; ?></td>
			<td>	
                <?php include('delete.php') ?>
			</td>
		</tr>
		<?php } ?>
	</tbody>
</table>

