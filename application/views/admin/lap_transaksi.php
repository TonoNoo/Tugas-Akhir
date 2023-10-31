<div class="ecommerce-widget">
                        <div class="row">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <div class="card">
                                    <h5 class="card-header"><?php echo $title; ?></h5>
                                    <div class="panel-header ml-4 mt-3">
                                        <form action="" method="post">
                                            <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                                            <div class="row">
                                                <div class="form-group col-md-3">
                                                    <label>Mulai</label>
                                                    <input type="date" class="form-control" name="start" value="<?php echo $start; ?>" required="">
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label>Sampai</label>
                                                    <input type="date" class="form-control" name="end" value="<?php echo $end; ?>" required="">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <button style="margin-top: 29px;" type="submit" class="btn btn-primary btn-sm">Lihat</button>
                                                    <?php if($start == '' AND $end == '') { ?>
                                                        <a style="margin-top: 29px;" href="admin/laporan/transaksi/print" target="_blank" class="btn btn-warning btn-sm">Print</a>
                                                        <a style="margin-top: 29px;" href="admin/laporan/transaksi/excel" class="btn btn-success btn-sm text-light">Excel</a>
                                                    <?php }else { ?>
                                                        <a style="margin-top: 29px;" href="admin/laporan/transaksi/print/<?php echo $start; ?>/<?php echo $end; ?>" target="_blank" class="btn btn-warning btn-sm">Print</a>
                                                        <a style="margin-top: 29px;" href="admin/laporan/transaksi/excel/<?php echo $start; ?>/<?php echo $end; ?>" class="btn btn-success btn-sm text-light">Excel</a>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-striped table-bordered first" id="myTable">
                                                <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Kode</th>
                                                        <th>Tanggal</th>
                                                        <th>Meja</th>
                                                        <th>Total</th>
                                                        <th>Status</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php $i = 1; ?>
                                                    <?php foreach($transaksi as $kat): ?>
                                                    <tr>
                                                        <td><?php echo $i; ?>.</td>
                                                        <td><?php echo $kat['transaksi_kode']; ?></td>
                                                        <td><?php echo date('d-m-Y', strtotime($kat['transaksi_tgl'])); ?></td>
                                                        <td><?php echo $kat['transaksi_meja']; ?></td>
                                                        <td><?php echo number_format($kat['transaksi_total'],0,',','.'); ?></td>
                                                        <td>
                                                            <?php if($kat['transaksi_status'] == 'Pending') { ?>
                                                                <span class="badge badge-warning"><?php echo $kat['transaksi_status']; ?></span>
                                                            <?php }else if($kat['transaksi_status'] == 'Diproses') { ?>
                                                                <span class="badge badge-info"><?php echo $kat['transaksi_status']; ?></span>
                                                            <?php }else { ?>
                                                                <span class="badge badge-success"><?php echo $kat['transaksi_status']; ?></span>
                                                            <?php } ?>
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