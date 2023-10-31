<div class="ecommerce-widget">
                        <div class="row">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <div class="card">
                                    <h5 class="card-header"><?php echo $title; ?></h5>
                                    <div class="panel-header ml-4 mt-3">
                                        <a href="admin/akses/new" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Tambah</a>
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
                                                        <th>Username</th>
                                                        <th>Password</th>
                                                        <th>Foto</th>
                                                        <th>Level</th>
                                                        <th>Opsi</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php $i = 1; ?>
                                                    <?php foreach($akses as $kat): ?>
                                                    <tr>
                                                        <td><?php echo $i; ?>.</td>
                                                        <td><?php echo $kat['admin_nama']; ?></td>
                                                        <td><?php echo $kat['admin_username']; ?></td>
                                                        <td>
                                                            <?php if(password_verify('12345', $kat['admin_password'])) { ?>
                                                                <i>12345</i>
                                                            <?php }else { ?>
                                                                <i class="fa fa-lock"></i>
                                                            <?php } ?>
                                                        </td>
                                                        <td><img src="wp-content/images/<?php echo $kat['admin_foto']; ?>" alt="avatar" width="50"></td>
                                                        <td>
                                                            <?php if($kat['admin_level'] == 1) { ?>
                                                                Admin
                                                            <?php }else if($kat['admin_level'] == 2) { ?>
                                                                Kasir
                                                            <?php }else { ?>
                                                                Koki
                                                            <?php } ?>
                                                        </td>
                                                        <td>
                                                            <a href="admin/akses/edit/<?php echo $kat['admin_id']; ?>" class="btn btn-info btn-sm">Edit</a>
                                                            <a href="admin/akses/hapus/<?php echo $kat['admin_id']; ?>" onclick="return confirm('Yakin data ini akan dihapus?')" class="btn btn-danger btn-sm">Hapus</a>
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