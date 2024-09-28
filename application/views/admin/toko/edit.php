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
echo form_open_multipart(base_url('admin/toko/edit/'.$toko->id_toko),'class="form-horizontal"');
?>

<div class="form-group form-group-lg">
  <label class="col-md-2 control-label">Nama Toko :</label>

  <div class="col-md-8">
    <input type="text" name="nama_toko" class="form-control"  placeholder="Nama Toko"
    value="<?php echo $toko->nama_toko;?>" required>
  </div>
</div>

<div class="form-group">
  <label class="col-md-2 control-label">Pemilik Toko :</label>

  <div class="col-md-5">
    <input type="text" name="nama_pemilik" class="form-control"  placeholder="Nama Pemilik Toko"
    value="<?php echo $toko->nama_pemilik;?>" required>
  </div>
</div>

<div class="form-group form-group-lg">
  <label class="col-md-2 control-label">Nomor Whatsapp :</label>

  <div class="col-md-8">
    <input type="number" name="no_wa" class="form-control"  placeholder="Nomor Whatsapp"
    value="<?php echo $toko->no_wa;?>" required>
  </div>
</div>

<div class="form-group">
  <label class="col-md-2 control-label">Alamat Lengkap :</label>

  <div class="col-md-10">
    <textarea name="alamat" class="form-control" placeholder="alamat" id="editor"><?php echo $toko->alamat; ?></textarea>
  </div>
</div>

<div class="form-group form-group-lg">
  <label class="col-md-2 control-label">Link Alamat Google Maps :</label>

  <div class="col-md-8">
    <input type="text" name="link_alamat" class="form-control"  placeholder="Link Alamat Google Maps"
    value="<?php echo $toko->link_alamat;?>" required>
  </div>
</div>

<div class="form-group">
  <label class="col-md-2 control-label">Upload Gambar Toko :</label>

  <div class="col-md-10">
    <input type="file" name="gambar" class="form-control">
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