<?php
// Notifikasi error
echo validation_errors('<div class="alert alert-warning">','</div>');

// Form Open
echo form_open(base_url('admin/rekening/tambah'),'class="form-horizontal"');
?>

<div class="form-group">
  <label class="col-md-2 control-label">Nama Bank :</label>

  <div class="col-md-5">
    <input type="text" name="nama_bank" class="form-control"  placeholder="Nama Bank"
    value="<?php echo set_value('nama_bank');?>" required>
  </div>
</div>

<div class="form-group">
  <label class="col-md-2 control-label">Nomor Rekening :</label>

  <div class="col-md-5">
    <input type="number" name="nomor_rekening" class="form-control" placeholder="Nomor Rekening"
    value="<?php echo set_value('nomor_rekening');?>" required>
  </div>
</div>

<div class="form-group">
  <label class="col-md-2 control-label">Nama Pemilik Rekening (atas nama) :</label>

  <div class="col-md-5">
    <input type="text" name="nama_pemilik" class="form-control" placeholder="Nama Pemilik Rekening"
    value="<?php echo set_value('nama_pemilik');?>" required>
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