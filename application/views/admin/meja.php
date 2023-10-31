<div class="ecommerce-widget">
                        <div class="row">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <div class="card">
                                    <h5 class="card-header"><?php echo $title; ?></h5>
                                    <div class="panel-header ml-4 mt-3">
                                        <a href="admin/meja/new" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Tambah</a>
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
                                                        <th>Meja No</th>
                                                        <th>Status</th>
                                                        <th>Opsi</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php $i = 1; ?>
                                                    <?php foreach($meja as $kat): ?>
                                                    <tr>
                                                        <td><?php echo $i; ?>.</td>
                                                        <td><?php echo $kat['meja_no']; ?></td>
                                                        <td>
                                                            <?php if($kat['meja_status'] == 1) { ?>
                                                                <span class="badge badge-success">Kosong</span>
                                                            <?php }else { ?>
                                                                <span class="badge badge-warning">Terpakai</span>
                                                            <?php } ?>
                                                        </td>
                                                        <td>
                                                            <?php if($kat['meja_status'] == 1) { ?>
                                                                <a href="admin/meja/terpakai/<?php echo $kat['meja_id']; ?>" class="btn btn-warning btn-sm">Terpakai</a>
                                                            <?php }else { ?>
                                                                <a href="admin/meja/kosongkan/<?php echo $kat['meja_id']; ?>" class="btn btn-info btn-sm">Kosongkan</a>
                                                            <?php } ?>
                                                            <a href="admin/meja/hapus/<?php echo $kat['meja_id']; ?>" onclick="return confirm('Yakin data ini akan dihapus?')" class="btn btn-danger btn-sm">Hapus</a>
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