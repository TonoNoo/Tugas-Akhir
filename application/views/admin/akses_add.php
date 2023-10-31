<div class="ecommerce-widget">
<div class="row">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="card">
            <h5 class="card-header"><?php echo $title; ?></h5>
            <div class="card-body">
                <form action="" method="post">
                    <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                    <div class="row">
                        <div class="form-group col-md-4">
                            <label class="col-form-label">Nama</label>
                            <input name="nama" type="text" class="form-control" value="<?php echo set_value('nama'); ?>" autofocus="">
                            <small class="text-danger"><?php echo form_error('nama'); ?></small>
                        </div>
                        <div class="form-group col-md-4">
                            <label class="col-form-label">Username</label>
                            <input name="username" type="text" class="form-control" value="<?php echo set_value('username'); ?>">
                            <small class="text-danger"><?php echo form_error('username'); ?></small>
                        </div>
                        <div class="form-group col-md-4">
                            <label class="col-form-label">Level</label>
                            <select name="level" class="form-control">
                                <option value="">-Pilih-</option>
                                <option value="1" <?php echo set_select('level', 1); ?>>Admin</option>
                                <option value="2" <?php echo set_select('level', 2); ?>>Kasir</option>
                                <option value="3" <?php echo set_select('level', 3); ?>>Koki</option>
                            </select>
                            <small class="text-danger"><?php echo form_error('level'); ?></small>
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="button" class="btn btn-warning btn-sm" onclick="kembali()">Kembali</button>
                        <button type="submit" class="btn btn-success btn-sm">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>