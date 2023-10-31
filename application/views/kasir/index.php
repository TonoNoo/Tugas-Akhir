<div class="ecommerce-widget">

                        <div class="row">
                            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                                <div class="card border-3 border-top border-top-primary">
                                    <div class="card-body">
                                        <h5 class="text-muted">Pending</h5>
                                        <div class="metric-value d-inline-block">
                                            <h1 class="mb-1"><?php echo $pending; ?></h1>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                                <div class="card border-3 border-top border-top-primary">
                                    <div class="card-body">
                                        <h5 class="text-muted">Belum Dibayar</h5>
                                        <div class="metric-value d-inline-block">
                                            <h1 class="mb-1"><?php echo $bdibayar; ?></h1>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                                <div class="card border-3 border-top border-top-primary">
                                    <div class="card-body">
                                        <h5 class="text-muted">Dibayar</h5>
                                        <div class="metric-value d-inline-block">
                                            <h1 class="mb-1"><?php echo $dibayar; ?></h1>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                                <div class="card border-3 border-top border-top-primary">
                                    <div class="card-body">
                                        <h5 class="text-muted">Transaksi Hari Ini</h5>
                                        <div class="metric-value d-inline-block">
                                            <h1 class="mb-1"><?php echo $ttransaksi; ?></h1>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <!-- ============================================================== -->
                      
                            <!-- ============================================================== -->

                                          <!-- recent orders  -->
                            <!-- ============================================================== -->
                            <div class="col-xl-12 col-lg-12 col-md-6 col-sm-12 col-12">
                                <div class="card">
                                    <h5 class="card-header">Transaksi hari ini</h5>
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
                                                        <th>Opsi</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php $i = 1; ?>
                                                    <?php foreach($ltransaksi as $kat): ?>
                                                    <tr>
                                                        <td><?php echo $i; ?>.</td>
                                                        <td><?php echo $kat['transaksi_kode']; ?></td>
                                                        <td><?php echo date('d-m-Y H:i', strtotime($kat['transaksi_created'])); ?></td>
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
                                                        <td>
                                                            <a data-toggle="modal" data-target="#exampleModal<?php echo $kat['transaksi_id']; ?>" class="btn btn-info btn-sm text-dark">Detail</a>
                                                            <?php if($kat['transaksi_status'] == 'Pending') { ?>                                                                
                                                            <a href="kasir/transaksi/konfirmasi/<?php echo $kat['transaksi_id']; ?>" class="btn btn-secondary btn-sm">Konfirmasi</a>
                                                            <?php }else if($kat['transaksi_status'] == 'Diproses') { ?>                                                                
                                                            <a href="kasir/transaksi/selesai/<?php echo $kat['transaksi_id']; ?>" class="btn btn-secondary btn-sm">Selesai</a>
                                                            <?php }else { ?>
                                                            <?php } ?>                                                            
                                                            <a href="kasir/transaksi/struk/<?php echo $kat['transaksi_id']; ?>" target="_blank" class="btn btn-success btn-sm text-light">Struk</a>
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
                    <?php foreach($ltransaksi as $kat): ?>
                    <?php $item = $this->db->get_where('tb_detail_transaksi',['dt_id' => $kat['transaksi_id']])->result_array(); ?>
                    <div class="modal fade" id="exampleModal<?php echo $kat['transaksi_id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Rincian transaksi <?php echo $kat['transaksi_kode']; ?></h5>
      </div>
      <div class="modal-body">
        <div class="table-responsive">
            <table class="table table-bordered first">
                <thead>
                    <tr>
                        <th>Item</th>
                        <th>Jumlah</th>
                        <th>Harga</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $total = 0; ?>
                    <?php foreach($item as $kat): ?>
                        <?php $total += $kat['dt_subtotal']; ?>
                    <?php $cekitem = $this->db->get_where('tb_menu',['menu_id' => $kat['dt_item']])->row_array(); ?>
                    <tr>
                        <td><?php echo $cekitem['menu_nama']; ?></td>
                        <td><?php echo $kat['dt_qty']; ?></td>
                        <td><?php echo number_format($kat['dt_subtotal'],0,',','.'); ?></td>
                    </tr>
                    <?php endforeach; ?>
                    <tr>
                        <th colspan="2">Total</th>
                        <th>Rp. <?php echo number_format($total,0,',','.'); ?></th>
                    </tr>
            </table>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Tutup</button>
      </div>
    </div>
  </div>
</div>
                                                    <?php endforeach; ?>