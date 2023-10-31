<div class="ecommerce-widget">
<div class="row">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="card">
            <h5 class="card-header"><?php echo $title; ?></h5>
            <div class="card-body">
                <?php if($this->session->flashdata('flash')): ?>
                <div class="alert alert-success">
                    <?php echo $this->session->flashdata('flash'); ?>
                </div>
                <?php endif; ?>
                <?php if($this->session->flashdata('error')): ?>
                <div class="alert alert-danger">
                    <?php echo $this->session->flashdata('error'); ?>
                </div>
                <?php endif; ?>
                <form action="" method="post">
                    <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                    <div class="row">
                        <div class="form-group col-md-4">
                            <label class="col-form-label">Password baru</label>
                            <input name="password1" type="password" class="form-control" autofocus="">
                            <small class="text-danger"><?php echo form_error('password1'); ?></small>
                        </div>
                        <div class="form-group col-md-4">
                            <label class="col-form-label">Konfirmasi password baru</label>
                            <input name="password2" type="password" class="form-control">
                            <small class="text-danger"><?php echo form_error('password2'); ?></small>
                        </div>
                        <div class="form-group col-md-4">
                            <label class="col-form-label">Konfirmasi password lama</label>
                            <input name="password" type="password" class="form-control">
                            <small class="text-danger"><?php echo form_error('password'); ?></small>
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