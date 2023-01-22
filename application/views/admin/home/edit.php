<?php
// Notifikasi error
echo validation_errors('<div class="alert alert-warning">','</div>');

// Form Open
echo form_open(base_url('admin/home/edit/'.$home->id_user), 'class="form-horizontal"');
?>

<div class="form-group">
  <label class="col-sm-2 control-label">Nama User :</label>

  <div class="col-md-5">
    <input type="text" name="nama" class="form-control"  placeholder="Nama User"
    value="<?php echo $home->nama;?>" required>
  </div>
</div>

<div class="form-group">
  <label class="col-sm-2 control-label">Email :</label>

  <div class="col-md-5">
    <input type="email" name="email" class="form-control"  placeholder="Email User"
    value="<?php echo $home->email;?>" required>
  </div>
</div>

<div class="form-group">
  <label class="col-sm-2 control-label">Username :</label>

  <div class="col-md-5">
    <input type="text" name="username" class="form-control"  placeholder="Username"
    value="<?php echo $home->username;?>" readonly>
  </div>
</div>

<div class="form-group">
  <label class="col-sm-2 control-label">Password :</label>

  <div class="col-md-5">
    <input type="password" name="password" class="form-control"  placeholder="Password"
    value="<?php echo $home->password;?>" required>
  </div>
</div>

<div class="form-group">
  <label class="col-sm-2 control-label">Level Hak Akses :</label>

  <div class="col-md-5">
    <select name="akses_level" class="form-control">
    	<option value="Admin">Admin</option>
    	<option value="User" <?php if($home->akses_level=="User") { echo "selected"; } ?>>User</option>
    </select>
  </div>
</div>

<div class="form-group">
  <label class="col-sm-2 control-label"></label>
  <div class="col-md-5">
    <button class="btn btn-success btn-lg" name="submit" type="submit"><i class="fa fa-save"></i> Simpan</button>
    <button class="btn btn-info btn-lg" name="reset" type="reset"><i class="fa fa-refresh"></i> Reset</button>
  </div>
</div>
<?php echo form_close(); ?>