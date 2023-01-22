<?php
// Error Upload
if(isset($error)) {
  echo '<p class="alert alert-warning">';
  echo $error;
  echo '</p>';
}


// Notifikasi error
echo validation_errors('<div class="alert alert-warning">','</div>');

// Form Open
echo form_open_multipart(base_url('admin/produk/gambar/'.$produk->id_produk),'class="form-horizontal"');
?>

<div class="form-group form-group-lg">
  <label class="col-md-2 control-label">Judul Gambar  :</label>

  <div class="col-md-8">
    <input type="text" name="judul_gambar" class="form-control"  placeholder="Judul Gambar Produk"
    value="<?php echo set_value('judul_gambar');?>" required>
  </div>
</div>

<div class="form-group form-group-lg">
  <label class="col-md-2 control-label">Upload Gambar  :</label>

  <div class="col-md-3">
    <input type="file" name="gambar" class="form-control"  placeholder="Gambar Produk"
    value="<?php echo set_value('gambar');?>" required>
  </div>
  <div class="col-md-5">
  	<button class="btn btn-success btn-lg" name="Submit" type="Submit"><i class="fa fa-save"></i> Simpan dan Upload Gambar</button>
    <button class="btn btn-info btn-lg" name="reset" type="reset"><i class="fa fa-refresh"></i> Reset</button>
  </div>
</div>

<?php echo form_close(); ?>

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
		<tr>
			<td>1</td>
			<td> <img src="<?php echo base_url('assets/upload/images/thumbs/'.$produk->gambar)?>" class="img img-responsive img-thumbnail" width="60"></td>
			<td><?php echo $produk->nama_produk; ?></td>
			<td>
				
			</td>
		</tr>
		<?php $no=2; foreach($gambar as $gambar) { ?>
		<tr>
			<td><?php echo $no++; ?></td>
			<td> <img src="<?php echo base_url('assets/upload/images/thumbs/'.$gambar->gambar)?>" class="img img-responsive img-thumbnail" width="60"></td>
			<td><?php echo $gambar->judul_gambar; ?></td>
			<td>
				
				
				<a href="<?php echo base_url('admin/produk/delete_gambar/'.$produk->id_produk.'/'.$gambar->id_gambar) ?>" class="btn btn-danger btn-xs" onclick="return confirm('Apakah anda yakin ingin menghapus gambar ini?')"><i class="fa fa-trash-o"></i> Hapus</a>
				
			</td>
		</tr>
		<?php } ?>
	</tbody>
</table>

