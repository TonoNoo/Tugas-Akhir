<div class="ecommerce-widget">
                        <div class="row">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <div class="card">
                                    <h5 class="card-header"><?php echo $title; ?></h5>
                                    <div class="panel-header ml-4 mt-3">
                                        <a href="admin/master/menu/new" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Tambah</a>
                                    </div>
                                    <div class="card-body">
                                        <?php if($this->session->flashdata('flash')): ?>
                                        <div class="alert alert-success">
                                            <?php echo $this->session->flashdata('flash'); ?>
                                        </div>
                                        <?php endif; ?>
                                        <div class="table-responsive">
                                            <table class="table table-striped table-bordered first" id="myTable">
                                                <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Nama</th>
                                                        <th>Harga</th>
                                                        <th>Foto</th>
                                                        <th>Kategori</th>
                                                        <th>Stok</th>
                                                        <th>Opsi</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php $i = 1; ?>
                                                    <?php foreach($menu as $kat): ?>
                                                    <tr>
                                                        <td><?php echo $i; ?>.</td>
                                                        <td><?php echo $kat['menu_nama']; ?></td>
                                                        <td><?php echo number_format($kat['menu_harga'],0,',','.'); ?></td>
                                                        <td><img src="wp-content/images/<?php echo $kat['menu_foto']; ?>" alt="menu" width="50"></td>
                                                        <td><?php echo $kat['kategori_nama']; ?></td>
                                                        <td>
                                                            <?php if($kat['menu_stok'] == 'Tersedia') { ?>
                                                                <span class="badge badge-success"><?php echo $kat['menu_stok']; ?></span>
                                                            <?php }else { ?>
                                                                <span class="badge badge-warning"><?php echo $kat['menu_stok']; ?></span>
                                                            <?php } ?>
                                                        </td>
                                                        <td>
                                                            <a href="admin/master/menu/edit/<?php echo $kat['menu_id']; ?>" class="btn btn-info btn-sm">Edit</a>
                                                            <a href="admin/master/menu/hapus/<?php echo $kat['menu_id']; ?>" onclick="return confirm('Yakin data ini akan dihapus?')" class="btn btn-danger btn-sm">Hapus</a>
                                                        </td>
                                                    </tr>
                                                    <?php $i++; ?>
                                                    <?php endforeach; ?>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>