<div class="ecommerce-widget">

                        <div class="row">
                            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                                <div class="card border-3 border-top border-top-primary">
                                    <div class="card-body">
                                        <h5 class="text-muted">Kategori</h5>
                                        <div class="metric-value d-inline-block">
                                            <h1 class="mb-1"><?php echo $kategori; ?></h1>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                                <div class="card border-3 border-top border-top-primary">
                                    <div class="card-body">
                                        <h5 class="text-muted">Menu</h5>
                                        <div class="metric-value d-inline-block">
                                            <h1 class="mb-1"><?php echo $tmenu; ?></h1>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                                <div class="card border-3 border-top border-top-primary">
                                    <div class="card-body">
                                        <h5 class="text-muted">Transaksi</h5>
                                        <div class="metric-value d-inline-block">
                                            <h1 class="mb-1"><?php echo $ttransaksi; ?></h1>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                                <div class="card border-3 border-top border-top-primary">
                                    <div class="card-body">
                                        <h5 class="text-muted">Profit</h5>
                                        <div class="metric-value d-inline-block">
                                            <h1 class="mb-1"><?php echo number_format($profit,0,',','.'); ?></h1>
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
                            <div class="col-xl-9 col-lg-12 col-md-6 col-sm-12 col-12">
                                <div class="card">
                                    <h5 class="card-header">Transaksi terakhir</h5>
                                    <div class="card-body p-0">
                                        <div class="table-responsive">
                                            <table class="table">
                                                <thead class="bg-light">
                                                    <tr class="border-0">
                                                        <th class="border-0">#</th>
                                                        <th class="border-0">Kode</th>
                                                        <th class="border-0">Meja</th>
                                                        <th class="border-0">Total</th>
                                                        <th class="border-0">Status</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php $i = 1; ?>
                                                    <?php foreach($ltransaksi as $kat): ?>
                                                    <tr>
                                                        <td><?php echo $i; ?>.</td>
                                                        <td><?php echo $kat['transaksi_kode']; ?></td>
                                                        <td><?php echo $kat['transaksi_meja']; ?></td>
                                                        <td><?php echo number_format($kat['transaksi_total'],0,',','.'); ?></td>
                                                        <td>
                                                            <?php if($kat['transaksi_status'] == 'Pending') { ?>
                                                                <span class="badge-dot badge-warning"></span><?php echo $kat['transaksi_status']; ?>
                                                            <?php }else if($kat['transaksi_status'] == 'Diproses') { ?>
                                                                <span class="badge-dot badge-info"></span><?php echo $kat['transaksi_status']; ?>
                                                            <?php }else { ?>
                                                                <span class="badge-dot badge-success"></span><?php echo $kat['transaksi_status']; ?>
                                                            <?php } ?>
                                                        </td>
                                                    </tr>
                                                    <?php $i++; ?>
                                                    <?php endforeach; ?>
                                                    
                                                    <tr>
                                                        <td colspan="5"><a href="admin/transaksi" class="btn btn-outline-light float-right">Semua transaksi</a></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- ============================================================== -->
                            <!-- end recent orders  -->

    
                            <!-- ============================================================== -->
                            <!-- ============================================================== -->
                            <!-- customer acquistion  -->
                            <!-- ============================================================== -->
                            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                                <div class="card">
                                    <h5 class="card-header">Customer Acquisition</h5>
                                    <div class="card-body">
                                        <div class="ct-chart ct-golden-section" style="height: 354px;"></div>
                                        <div class="text-center">
                                            <span class="legend-item mr-2">
                                                    <span class="fa-xs text-primary mr-1 legend-tile"><i class="fa fa-fw fa-square-full"></i></span>
                                            <span class="legend-text">Returning</span>
                                            </span>
                                            <span class="legend-item mr-2">

                                                    <span class="fa-xs text-secondary mr-1 legend-tile"><i class="fa fa-fw fa-square-full"></i></span>
                                            <span class="legend-text">First Time</span>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- ============================================================== -->
                            <!-- end customer acquistion  -->
                            <!-- ============================================================== -->
                        </div>

                        <div class="row">
                            <!-- ============================================================== -->
                            <!-- total revenue  -->
                            <!-- ============================================================== -->
  
                            
                            <!-- ============================================================== -->
                            <!-- ============================================================== -->
                            <!-- category revenue  -->
                            <!-- ============================================================== -->
                            <div class="col-xl-5 col-lg-5 col-md-12 col-sm-12 col-12">
                                <div class="card">
                                    <h5 class="card-header">Revenue by Category</h5>
                                    <div class="card-body">
                                        <div id="c3chart_category" style="height: 420px;"></div>
                                    </div>
                                </div>
                            </div>
                            <!-- ============================================================== -->
                            <!-- end category revenue  -->
                            <!-- ============================================================== -->

                            <div class="col-xl-7 col-lg-7 col-md-12 col-sm-12 col-12">
                                <div class="card">
                                    <h5 class="card-header"> Total Revenue</h5>
                                    <div class="card-body">
                                        <div id="morris_totalrevenue"></div>
                                    </div>
                                    <div class="card-footer">
                                        <p class="display-7 font-weight-bold"><span class="text-primary d-inline-block">$26,000</span><span class="text-success float-right">+9.45%</span></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    </div>