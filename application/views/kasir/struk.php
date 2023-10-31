<!DOCTYPE html>
<html lang="en">
    <head>
    	<base href="<?php echo base_url(); ?>"/>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <style>
        	* {
    font-size: 12px;
    font-family: 'Verdana';
    /*font-family: 'Times New Roman';*/
}

td,
th,
tr,
table {
    border-top: 1px solid black;
    border-collapse: collapse;
}

td.description,
th.description {
    width: 139px;
    max-width: 139px;
    font-size: 10px;
}

td.quantity,
th.quantity {
    width: 40px;
    max-width: 40px;
    word-break: break-all;
    font-size: 10px;
}

td.price,
th.price {
    width: 65px;
    max-width: 65px;
    word-break: break-all;
    font-size: 10px;
}

.centered {
    text-align: center;
    align-content: center;
}

.ticket {
    margin-left: 240px;
    width: 219px;
    max-width: 219px;
    /*background-color: red;*/
}

img {
    max-width: inherit;
    width: inherit;
}

@media print {
    .hidden-print,
    .hidden-print * {
        display: none !important;
    }
}
        </style>
        <title><?php echo $title; ?></title>
    </head>
    <body style="align-content: center;">
        <div class="ticket">
        	<div class="centered">
                <h3>FOOD RESTO</h3>
        		<!-- <img style="width: 50px;margin-top: 10px;" src="assets/back/images/logo.png" alt="Logo"> -->
        	</div>
            <?php $listitem = $this->db->get_where('tb_detail_transaksi',['dt_id' => $trxid['transaksi_id']])->result_array(); ?>
            <p class="centered">ID : <?php echo $trxid['transaksi_kode']; ?>
                <br>Meja : <?php echo $trxid['transaksi_meja']; ?>
                <br>Tanggal : <?php echo date('d-m-Y', strtotime($trxid['transaksi_tgl'])); ?>
            </p>
            <table>
                <thead>
                    <tr>
                        <th class="description">Item</th>
                        <th class="quantity">Jml</th>
                        <th class="price">Harga</th>
                    </tr>
                </thead>
                <tbody>
                	<?php $subt = 0; ?>
                    <?php foreach($listitem as $ti): ?>
                    <?php $subt += $ti['dt_subtotal']; ?>
                    <?php $cekmenu = $this->db->get_where('tb_menu',['menu_id' => $ti['dt_item']])->row_array(); ?>
                    <tr>
                        <td class="description"><?php echo $cekmenu['menu_nama']; ?></td>
                        <td class="quantity"><?php echo $ti['dt_qty']; ?></td>
                        <td class="price"><?php echo number_format($ti['dt_subtotal'],0,',','.'); ?></td>
                    </tr>
                    <?php endforeach; ?>
	                <tr>
	                    <th class="description" colspan="2">Total</th>
	                    <th class="price"><?php echo number_format($trxid['transaksi_total'],0,',','.'); ?></th>
	                </tr>
                </tbody>
            </table>
            <p class="centered">Terima kasih!</p>
            <p style="font-size: 10px;" class="centered">Kritik & Saran: 1500959, SMS: 08123456789</p>
        </div>
        <button id="btnPrint" class="hidden-print">Print</button>
        <script>
        	const $btnPrint = document.querySelector("#btnPrint");
$btnPrint.addEventListener("click", () => {
    window.print();
});
        </script>
    </body>
</html>