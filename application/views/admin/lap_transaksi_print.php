<!DOCTYPE html>
<html>
<head>
  <title><?php echo $title; ?></title>
<style>
table {
  border-collapse: collapse;
  width: 100%;
  margin-top: 5px;
}

th {
  background-color: #4CAF50;
  font-weight: bold;
}

th, td {
  text-align: left;
  padding: 8px;
  border: 1px solid grey;
}

img {
  display: block;
  margin-left: auto;
  margin-right: auto;
  border: 1px solid black;
}

.responsive {
  width: 100%;
  height: auto;
}

tr:nth-child(even) {background-color: #f2f2f2;}
</style>
</head>
<body onload="printCetak()">

<h2 style="text-align: center;"><?php echo $title; ?></h2>

<div style="overflow-x:auto;">
  <table>
    <tr>
      <th>No</th>
      <th>Kode</th>
      <th>Tanggal</th>
      <th>Meja</th>
      <th>Total</th>
      <th>Status</th>
    </tr>
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
<script>
    function printCetak() {
      window.print();
    }
</script>
</body>
</html>
