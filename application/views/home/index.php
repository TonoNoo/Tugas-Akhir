<div class="row">
                        <div class="col-xl-9 col-lg-8 col-md-8 col-sm-12 col-12">
    <!-- <div class="alert alert-danger"></div> -->
                            <div class="row">
                                <?php foreach($menus as $ms): ?>
                                <div class="col-xl-4 col-lg-6 col-md-12 col-sm-12 col-12 content">
                                    <div class="product-thumbnail">
                                        <div class="product-img-head">
                                            <div class="product-img">
                                                <img style="width: 228px;height: 250px;" src="wp-content/images/<?php echo $ms['menu_foto']; ?>" alt="<?php echo $ms['menu_nama']; ?>" class="img-fluid"></div>
                                            
                                        </div>
                                        <div class="product-content">
                                            <div class="product-content-head">
                                                <h3 class="product-title"><?php echo $ms['menu_nama']; ?></h3>
                                                <div class="product-rating d-inline-block">
                                                    <i><?php echo $ms['kategori_nama']; ?></i>
                                                </div>
                                                <div class="product-price">Rp. <?php echo number_format($ms['menu_harga'],0,',','.'); ?></div>
                                            </div>
                                            <div class="product-btn">
                                                <?php if($ms['menu_stok'] == 'Tersedia') { ?>
                                                    <a href="cart/add/<?php echo $ms['menu_id']; ?>" class="btn btn-primary">Pilih</a>
                                                    <a class="btn btn-success text-light"><?php echo $ms['menu_stok']; ?></a>
                                                <?php }else { ?>
                                                    <a onclick="alert('Mohon maaf, menu tidak tersedia/kosong.');" class="btn btn-primary text-light">Pilih</a>
                                                    <a class="btn btn-danger text-light"><?php echo $ms['menu_stok']; ?></a>
                                                <?php } ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php endforeach; ?>

                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mb-3 text-center">
                                    <a href="#" class="btn btn-outline-secondary btn-sm" id="loadMore">Lainnya</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-md-4 col-sm-12 col-12">
                            <div class="product-sidebar">
                                <div class="product-sidebar-widget">
                                    <h4 class="mb-0">Cari Menu</h4>
                                </div>
                                <div class="product-sidebar-widget">
                                    <form action="" method="post">
                                        <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="kategori" placeholder="cari menu, kategori atau harga" required="">
                                        </div>  
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary btn-sm">Temukan</button>
                                        </div>
                                    </form>
                                </div>
                                <div class="product-sidebar-widget">
                                    <h4 class="product-sidebar-widget-title">Pesanan Anda</h4>
                                    <form action="cart/update" method="post">
                                        <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                                        
                                        <div class="table table-responsive">
                                            <table id="myTable">
                                                <thead>
                                                    <tr>
                                                        <th>Hapus</th>
                                                        <th>Menu</th>
                                                        <th>Jml</th>
                                                        <th>Harga</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php foreach($keranjang as $krj): ?>
                                                        <tr>
                                                            <td>
                                                                <a href="cart/delete/<?php echo $krj['rowid']; ?>" class="badge badge-danger"><i class="fa fa-times"></i></a>
                                                            </td>
                                                            <td><?php echo $krj['name']; ?></td>
                                                            <td><input style="width: 55px;" type="number" min="0" name="cart[<?php echo $krj['id'];?>][qty]"  class="form-control" value="<?php echo $krj['qty']; ?>"></td>
                                                            <td><?php echo number_format($krj['subtotal'],0,',','.'); ?></td>
                                                        </tr>
<input type="hidden" name="cart[<?php echo $krj['id'];?>][id]" value="<?php echo $krj['id'];?>" />
  <input type="hidden" name="cart[<?php echo $krj['id'];?>][rowid]" value="<?php echo $krj['rowid'];?>" />
  <input type="hidden" name="cart[<?php echo $krj['id'];?>][name]" value="<?php echo $krj['name'];?>" />
  <input type="hidden" name="cart[<?php echo $krj['id'];?>][price]" value="<?php echo $krj['price'];?>" />
                                                    <?php endforeach; ?>
                                                    <tr>
                                                        <th colspan="3">Total</th>
                                                        <th>Rp. <?php echo number_format($this->cart->total(),0,',','.'); ?></th>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="form-group mt-2">
                                            <button type="submit" class="btn btn-info btn-sm">Update</button>
                                            <a href="cart/empty" class="btn btn-warning btn-sm">Ubah Pesanan</a>
                                        </div>
                                    </form>
                                </div>
                                <div class="product-sidebar-widget">
                                    <form action="order-menu" method="post">
                                        <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                                        <div class="form-group">
                                            <label>Kode Pesanan</label>
                                            <input type="text" class="form-control" value="<?php echo $kodepsn; ?>" readonly="">
                                        </div>
                                        <div class="form-group">
                                            <label>No Meja</label>
                                            <select name="meja" class="form-control" required="">
                                                <option value="">-Pilih Meja-</option>
                                                <?php foreach($meja as $mj): ?>
                                                    <option value="<?php echo $mj['meja_no']; ?>"><?php echo $mj['meja_no']; ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-success btn-sm">Order</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>