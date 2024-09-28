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
echo form_open_multipart(base_url('admin/slider/tambah'),'class="form-horizontal"');
?>

<div class="form-group form-group-lg">
  <label class="col-md-2 control-label">Judul :</label>

  <div class="col-md-8">
    <input type="text" name="judul" class="form-control"  placeholder="Judul Gambar"
    value="<?php echo set_value('judul');?>" required>
  </div>
</div>


<div class="form-group">
  <label class="col-md-2 control-label">Upload Gambar Slider :</label>

  <div class="col-md-10">
    <input type="file" name="slider" class="form-control" required="required">
  </div>
</div>

<div class="form-group">
  <label class="col-md-2 control-label"></label>
  <div class="col-md-5">
    <button class="btn btn-success btn-lg" name="Submit" type="Submit"><i class="fa fa-save"></i> Simpan</button>
    <button class="btn btn-info btn-lg" name="reset" type="reset"><i class="fa fa-refresh"></i> Reset</button>
  </div>
</div>
<?php echo form_close(); ?>