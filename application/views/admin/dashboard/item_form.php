  <div class="x_panel">
                  <div class="x_title">
                    <h2><?= $header; ?></h2>
                    <div class="clearfix"></div>
                    <?= validation_errors('<p style="color:red">','</p>'); ?>
                    <?php 
                    if ($this->session->flashdata('alert'))
                    {
                      echo '<div class="alert alert-danger alert-message">';
                      echo $this->session->flashdata('alert');
                      echo '</div>';
                    } 
                    ?>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />
                    <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                      <?php echo form_open('item/add_item'); ?>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Nama Barang
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" required="required" class="form-control col-md-7 col-xs-12" name="nama" value="<?= $nama; ?>">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name" name="gambar" >Gambar Barang
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="file" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Harga Barang</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input class="form-control col-md-7 col-xs-12" type="number" name="harga" value="<?= $harga; ?>">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Berat Barang (gr)</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input class="form-control col-md-7 col-xs-12" type="number" name="berat" value="<?= $berat; ?>">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Status</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select name="status" class="form-control">
                            <option value="">--Pilih Status--</option>
                            <option value="1"<?php if($status == 1) {echo "selected";} ?>>Aktif</option>
                            <option value="2"<?php if($status == 2) {echo "selected";} ?>>Tidak Aktif</option>
                          </select>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Deskripsi Barang
                        </label>
                        <div class="col-md-9 col-sm-6">
                          <textarea class="form-control" rows="4" name="desk" value="<?= $desk; ?>"></textarea>
                        </div>
                      </div>
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <button class="btn btn-primary" type="button">Batal</button>
                          <button class="btn btn-primary" type="reset">Reset</button>
                          <button type="submit" class="btn btn-success" name="Submit" value="Submit">Simpan</button>
                        </div>
                      </div>
                      <?php echo form_close(); ?>
                    </form>
                  </div>
                </div>