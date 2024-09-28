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
echo form_open_multipart(base_url('admin/toko/cabang/'.$toko->id_toko),'class="form-horizontal"');
?>

<div class="form-group form-group-lg">
  <label class="col-md-2 control-label">Nama Cabang  :</label>

  <div class="col-md-8">
    <input type="text" name="nama_cabang" class="form-control"  placeholder="Nama Cabang Toko"
    value="<?php echo set_value('nama_cabang');?>" required>
  </div>
</div>

<div class="form-group">
  <label class="col-md-2 control-label">Nomor WhatsApp :</label>

  <div class="col-md-5">
    <input type="text" name="no_wa" class="form-control"  placeholder="Link Lokasi Google Maps"
    value="<?php echo set_value('no_wa');?>" required>
  </div>
</div>

<div class="form-group">
  <label class="col-md-2 control-label">Link Alamat Google Maps :</label>

  <div class="col-md-5">
    <input type="text" name="link_alamat" class="form-control"  placeholder="Link Lokasi Google Maps"
    value="<?php echo set_value('link_alamat');?>" required>
  </div>
</div>

<div class="form-group">
  <label class="col-md-2 control-label">Alamat Lengkap :</label>

  <div class="col-md-10">
    <textarea name="alamat" class="form-control" placeholder="alamat" id="editor"><?php echo set_value('alamat'); ?></textarea>
  </div>
</div>

<div class="form-group form-group-lg">
  <label class="col-md-2 control-label">Upload Gambar  :</label>

  <div class="col-md-3">
    <input type="file" name="gambar" class="form-control"  placeholder="Gambar Cabang Toko"
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
		<th>Nama Toko/Cabang</th>
		<th>Nomor WhatsApp</th>
		<th>Alamat</th>
		<th>Aksi</th>
	    </tr>
	</thead>
	<tbody>
		<tr>
			<td>1</td>
			<td> <img src="<?php echo base_url('assets/upload/images/'.$toko->gambar)?>" class="img img-responsive img-thumbnail" width="60"></td>
			<td><?php echo $toko->nama_toko; ?></td>
			<td><?php echo $toko->no_wa; ?></td>
			<td><?php echo $toko->alamat; ?></td>
			<td>
				
			</td>
		</tr>
		<?php $no=2; foreach($cabang as $cabang) { ?>
		<tr>
			<td><?php echo $no++; ?></td>
			<td> <img src="<?php echo base_url('assets/upload/images/'.$cabang->gambar)?>" class="img img-responsive img-thumbnail" width="60"></td>
			<td><?php echo $cabang->nama_cabang; ?></td>
			<td><?php echo $cabang->no_wa; ?></td>
			<td><?php echo $cabang->alamat; ?></td>
			<td>
				
				
				<a href="<?php echo base_url('admin/toko/delete_cabang/'.$toko->id_toko.'/'.$cabang->id_cabang) ?>" class="btn btn-danger btn-xs" onclick="return confirm('Apakah anda yakin ingin menghapus gambar ini?')"><i class="fa fa-trash-o"></i> Hapus</a>
				
			</td>
		</tr>
		<?php } ?>
	</tbody>
</table>

