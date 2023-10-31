<div class="ecommerce-widget">
<div class="row">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="card">
            <h5 class="card-header"><?php echo $title; ?></h5>
            <div class="card-body">
                <form action="" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                    <div class="row">
                        <div class="form-group col-md-8">
                            <label class="col-form-label">Nama</label>
                            <input name="nama" type="text" class="form-control" value="<?php echo set_value('nama'); ?>" autofocus="">
                            <small class="text-danger"><?php echo form_error('nama'); ?></small>
                        </div>
                        <div class="form-group col-md-4">
                            <label class="col-form-label">Harga</label>
                            <input name="harga" type="text" class="form-control" value="<?php echo set_value('harga'); ?>">
                            <small class="text-danger"><?php echo form_error('harga'); ?></small>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-4">
                            <label class="col-form-label">Kategori</label>
                            <select name="kategori" class="form-control">
                                <option value="">-Pilih-</option>
                                <?php foreach($kategori as $kat): ?>
                                    <option value="<?php echo $kat['kategori_id']; ?>" <?php echo set_select('kategori', $kat['kategori_id']); ?>><?php echo $kat['kategori_nama']; ?></option>
                                <?php endforeach; ?>
                            </select>
                            <small class="text-danger"><?php echo form_error('kategori'); ?></small>
                        </div>
                        <div class="form-group col-md-4">
                            <label class="col-form-label">Foto</label>
                            <input name="gambar" type="file" class="form-control">
                        </div>
                        <div class="form-group col-md-4">
                            <label class="col-form-label">Stok</label>
                            <select name="stok" class="form-control">
                                <option value="">-Pilih-</option>
                                <option value="Tersedia" <?php echo set_select('stok', 'Tersedia') ?>>Tersedia</option>
                                <option value="Kosong" <?php echo set_select('stok', 'Kosong') ?>>Kosong</option>
                            </select>
                            <small class="text-danger"><?php echo form_error('stok'); ?></small>
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