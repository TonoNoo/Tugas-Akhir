<?php 
header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=$title.xls");
header("Pragma: no-cache");
header("Expires: 0");
?>
<table border="1" width="100%">
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
  </tbody>
</table>