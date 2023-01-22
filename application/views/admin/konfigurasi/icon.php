<?php 
// Notifikasi
if($this->session->flashdata('sukses')) {
  echo '<p class="alert alert-success">';
  echo $this->session->flashdata('sukses');
  echo '</div>';
 }
 ?>
 
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
echo form_open_multipart(base_url('admin/konfigurasi/icon'),'class="form-horizontal"');
?>

<div class="form-group form-group-lg">
  <label class="col-md-3 control-label">Nama Website :</label>

  <div class="col-md-8">
    <input type="text" name="namaweb" class="form-control"  placeholder="Nama Web"
    value="<?php echo $konfigurasi->namaweb;?>" required>
  </div>
</div>

<div class="form-group">
  <label class="col-md-3 control-label">Upload Icon Baru :</label>

  <div class="col-md-8">
    <input type="file" name="icon" class="form-control"  placeholder="Upload Icon Baru"
    value="<?php echo $konfigurasi->icon;?>" required>
    Icon lama: <br>
    <img src="<?php echo base_url('assets/upload/images/'.$konfigurasi->icon) ?>" class="img img-responsive img-thumbnail" width="200">
  </div>
</div>



<div class="form-group">
  <label class="col-md-3 control-label"></label>
  <div class="col-md-5">
    <button class="btn btn-success btn-lg" name="Submit" type="Submit"><i class="fa fa-save"></i> Simpan</button>
    <button class="btn btn-info btn-lg" name="reset" type="reset"><i class="fa fa-refresh"></i> Reset</button>
  </div>
</div>
<?php echo form_close(); ?>