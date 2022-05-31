<?php
  $jml_kain_s = $order['jumlah_ukuran_s'] * $produk['pnj_kain_s'];
  $jml_kain_m = $order['jumlah_ukuran_m'] * $produk['pnj_kain_m'];
  $jml_kain_l = $order['jumlah_ukuran_l'] * $produk['pnj_kain_l'];
  $jml_kain_xl = $order['jumlah_ukuran_xl'] * $produk['pnj_kain_xl'];
  $jml_kain_xxl = $order['jumlah_ukuran_xxl'] * $produk['pnj_kain_xxl'];
  $total_harga_kain = ($jml_kain_s * $produk['harga_kain']) + 
  ($jml_kain_m * $produk['harga_kain']) + 
  ($jml_kain_l * $produk['harga_kain']) + 
  ($jml_kain_xl * $produk['harga_kain']) + 
  ($jml_kain_xxl * $produk['harga_kain']);

  $jml_kancing_s = $order['jumlah_ukuran_s'] * $produk['jml_kancing_s'];
  $jml_kancing_m = $order['jumlah_ukuran_m'] * $produk['jml_kancing_m'];
  $jml_kancing_l = $order['jumlah_ukuran_l'] * $produk['jml_kancing_l'];
  $jml_kancing_xl = $order['jumlah_ukuran_xl'] * $produk['jml_kancing_xl'];
  $jml_kancing_xxl = $order['jumlah_ukuran_xxl'] * $produk['jml_kancing_xxl'];
  $total_harga_kancing = ($jml_kancing_s * $produk['harga_kancing']) + 
  ($jml_kancing_m * $produk['harga_kancing']) + 
  ($jml_kancing_l * $produk['harga_kancing']) + 
  ($jml_kancing_xl * $produk['harga_kancing']) + 
  ($jml_kancing_xxl * $produk['harga_kancing']);

  $jml_resleting_s = $order['jumlah_ukuran_s'] * $produk['pnj_resleting_s'];
  $jml_resleting_m = $order['jumlah_ukuran_m'] * $produk['pnj_resleting_m'];
  $jml_resleting_l = $order['jumlah_ukuran_l'] * $produk['pnj_resleting_l'];
  $jml_resleting_xl = $order['jumlah_ukuran_xl'] * $produk['pnj_resleting_xl'];
  $jml_resleting_xxl = $order['jumlah_ukuran_xxl'] * $produk['pnj_resleting_xxl'];
  $total_harga_resleting = ($jml_resleting_s * $produk['harga_resleting']) + 
  ($jml_resleting_m * $produk['harga_resleting']) + 
  ($jml_resleting_l * $produk['harga_resleting']) + 
  ($jml_resleting_xl * $produk['harga_resleting']) + 
  ($jml_resleting_xxl * $produk['harga_resleting']);

  $jml_prepet_s = $order['jumlah_ukuran_s'] * $produk['jml_prepet_s'];
  $jml_prepet_m = $order['jumlah_ukuran_m'] * $produk['jml_prepet_m'];
  $jml_prepet_l = $order['jumlah_ukuran_l'] * $produk['jml_prepet_l'];
  $jml_prepet_xl = $order['jumlah_ukuran_xl'] * $produk['jml_prepet_xl'];
  $jml_prepet_xxl = $order['jumlah_ukuran_xxl'] * $produk['jml_prepet_xxl'];
  $total_harga_prepet = ($jml_prepet_s * $produk['harga_prepet']) + 
  ($jml_prepet_m * $produk['harga_prepet']) + 
  ($jml_prepet_l * $produk['harga_prepet']) + 
  ($jml_prepet_xl * $produk['harga_prepet']) + 
  ($jml_prepet_xxl * $produk['harga_prepet']);

  $jml_rib_s = $order['jumlah_ukuran_s'] * $produk['pnj_rib_s'];
  $jml_rib_m = $order['jumlah_ukuran_m'] * $produk['pnj_rib_m'];
  $jml_rib_l = $order['jumlah_ukuran_l'] * $produk['pnj_rib_l'];
  $jml_rib_xl = $order['jumlah_ukuran_xl'] * $produk['pnj_rib_xl'];
  $jml_rib_xxl = $order['jumlah_ukuran_xxl'] * $produk['pnj_rib_xxl'];
  $total_harga_rib = ($jml_rib_s * $produk['harga_rib']) + 
  ($jml_rib_m * $produk['harga_rib']) + 
  ($jml_rib_l * $produk['harga_rib']) + 
  ($jml_rib_xl * $produk['harga_rib']) + 
  ($jml_rib_xxl * $produk['harga_rib']);

  $total_biaya = $total_harga_kain + $total_harga_kancing + $total_harga_resleting + $total_harga_prepet + $total_harga_rib;

?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Cetak Order</title>
    <style>
      .break {
        page-break-after: always; 
      }
    </style>
  </head>
  <body>
    <div class="container-fluid">
      <h3 class="text-center">BOM List</h3>
      <div class="row">
        <div class="col-md-2">Tanggal Order</div>
        <div class="col-md-10">: <?= $order['tgl_order'] ?></div>
        <div class="col-md-2">Nama Pelanggan</div>
        <div class="col-md-10">: <?= $order['nama_pelanggan'] ?> (<?= $order['no_telepon'] ?>)</div>
        <div class="col-md-2">Produk</div>
        <div class="col-md-10">: <?= $order['nama_produk'] ?></div>
        <div class="col-md-2">Nama Marketing</div>
        <div class="col-md-10">: <?= $order['nama'] ?></div>
        <div class="col-md-2">Catatan</div>
        <div class="col-md-10">: <?= $order['catatan'] ?></div>
        <div class="col-md-2">Total Biaya</div>
        <div class="col-md-10">: <b>Rp <?= number_format($total_biaya, '2', ',', '.')  ?></b></div>
      </div>
      <br>
      <h6>Jumlah Order :</h6>
      <table width="100%" border="1">
        <tr class="text-center">
          <th>Ukuran</th>
          <th>Jumlah</th>
        </tr>
        <tr class="text-center">
          <td>S</td>
          <td><?= $order['jumlah_ukuran_s'] ?></td>
        </tr>
        <tr class="text-center">
          <td>M</td>
          <td><?= $order['jumlah_ukuran_m'] ?></td>
        </tr>
        <tr class="text-center">
          <td>L</td>
          <td><?= $order['jumlah_ukuran_l'] ?></td>
        </tr>
        <tr class="text-center">
          <td>XL</td>
          <td><?= $order['jumlah_ukuran_xl'] ?></td>
        </tr>
        <tr class="text-center">
          <td>XXL</td>
          <td><?= $order['jumlah_ukuran_xxl'] ?></td>
        </tr>
      </table>

      <br>
      <h6>Kebutuhan Kain :</h6>
      <table width="100%" border="1">
        <tr class="text-center">
          <th width="30%">Ukuran</th>
          <th width="30%">Panjang Kain (m)</th>
          <th>Biaya</th>
        </tr>
        <tr class="text-center">
          <td>S</td>
          <td><?= $jml_kain_s ?></td>
          <td class="text-right">Rp <?= number_format($jml_kain_s * $produk['harga_kain'], '2', ',', '.')  ?></td>
        </tr>
        <tr class="text-center">
          <td>M</td>
          <td><?= $jml_kain_m ?></td>
          <td class="text-right">Rp <?= number_format($jml_kain_m * $produk['harga_kain'], '2', ',', '.')  ?></td>
        </tr>
        <tr class="text-center">
          <td>L</td>
          <td><?= $jml_kain_l ?></td>
          <td class="text-right">Rp <?= number_format($jml_kain_l * $produk['harga_kain'], '2', ',', '.')  ?></td>
        </tr>
        <tr class="text-center">
          <td>XL</td>
          <td><?= $jml_kain_xl ?></td>
          <td class="text-right">Rp <?= number_format($jml_kain_xl * $produk['harga_kain'], '2', ',', '.')  ?></td>
        </tr>
        <tr class="text-center">
          <td>XXL</td>
          <td><?= $jml_kain_xxl ?></td>
          <td class="text-right">Rp <?= number_format($jml_kain_xxl * $produk['harga_kain'], '2', ',', '.')  ?></td>
        </tr>
        <tr class="text-center">
          <th>Total</th>
          <th><?= $jml_kain_s + $jml_kain_m + $jml_kain_l + $jml_kain_xl + $jml_kain_xxl ?></th>
          <th class="text-right">Rp <?= number_format($total_harga_kain, '2', ',', '.')  ?></th>
        </tr>
      </table>

      <br>
      <h6>Kebutuhan Kancing :</h6>
      <table width="100%" border="1">
        <tr class="text-center">
          <th width="30%">Ukuran</th>
          <th width="30%">Jumlah Kancing</th>
          <th>Biaya</th>
        </tr>
        <tr class="text-center">
          <td>S</td>
          <td><?= $jml_kancing_s ?></td>
          <td class="text-right">Rp <?= number_format($jml_kancing_s * $produk['harga_kancing'], '2', ',', '.')  ?></td>
        </tr>
        <tr class="text-center">
          <td>M</td>
          <td><?= $jml_kancing_m ?></td>
          <td class="text-right">Rp <?= number_format($jml_kancing_m * $produk['harga_kancing'], '2', ',', '.')  ?></td>
        </tr>
        <tr class="text-center">
          <td>L</td>
          <td><?= $jml_kancing_l ?></td>
          <td class="text-right">Rp <?= number_format($jml_kancing_l * $produk['harga_kancing'], '2', ',', '.')  ?></td>
        </tr>
        <tr class="text-center">
          <td>XL</td>
          <td><?= $jml_kancing_xl ?></td>
          <td class="text-right">Rp <?= number_format($jml_kancing_xl * $produk['harga_kancing'], '2', ',', '.')  ?></td>
        </tr>
        <tr class="text-center">
          <td>XXL</td>
          <td><?= $jml_kancing_xxl ?></td>
          <td class="text-right">Rp <?= number_format($jml_kancing_xxl * $produk['harga_kancing'], '2', ',', '.')  ?></td>
        </tr>
        <tr class="text-center">
          <th>Total</th>
          <th><?= $jml_kancing_s + $jml_kancing_m + $jml_kancing_l + $jml_kancing_xl + $jml_kancing_xxl ?></th>
          <th class="text-right">Rp <?= number_format($total_harga_kancing, '2', ',', '.')  ?></th>
        </tr>
      </table>

      <br>
      <h6>Kebutuhan Resleting :</h6>
      <table width="100%" border="1">
        <tr class="text-center">
          <th width="30%">Ukuran</th>
          <th width="30%">Panjang Resleting (m)</th>
          <th>Biaya</th>
        </tr>
        <tr class="text-center">
          <td>S</td>
          <td><?= $jml_resleting_s ?></td>
          <td class="text-right">Rp <?= number_format($jml_resleting_s * $produk['harga_resleting'], '2', ',', '.')  ?></td>
        </tr>
        <tr class="text-center">
          <td>M</td>
          <td><?= $jml_resleting_m ?></td>
          <td class="text-right">Rp <?= number_format($jml_resleting_m * $produk['harga_resleting'], '2', ',', '.')  ?></td>
        </tr>
        <tr class="text-center">
          <td>L</td>
          <td><?= $jml_resleting_l ?></td>
          <td class="text-right">Rp <?= number_format($jml_resleting_l * $produk['harga_resleting'], '2', ',', '.')  ?></td>
        </tr>
        <tr class="text-center">
          <td>XL</td>
          <td><?= $jml_resleting_xl ?></td>
          <td class="text-right">Rp <?= number_format($jml_resleting_xl * $produk['harga_resleting'], '2', ',', '.')  ?></td>
        </tr>
        <tr class="text-center">
          <td>XXL</td>
          <td><?= $jml_resleting_xxl ?></td>
          <td class="text-right">Rp <?= number_format($jml_resleting_xxl * $produk['harga_resleting'], '2', ',', '.')  ?></td>
        </tr>
        <tr class="text-center">
          <th>Total</th>
          <th><?= $jml_resleting_s + $jml_resleting_m + $jml_resleting_l + $jml_resleting_xl + $jml_resleting_xxl ?></th>
          <th class="text-right">Rp <?= number_format($total_harga_resleting, '2', ',', '.')  ?></th>
        </tr>
      </table>

      <br>
      <h6>Kebutuhan Prepet :</h6>
      <table width="100%" border="1">
        <tr class="text-center">
          <th width="30%">Ukuran</th>
          <th width="30%">Jumlah Prepet</th>
          <th>Biaya</th>
        </tr>
        <tr class="text-center">
          <td>S</td>
          <td><?= $jml_prepet_s ?></td>
          <td class="text-right">Rp <?= number_format($jml_prepet_s * $produk['harga_prepet'], '2', ',', '.')  ?></td>
        </tr>
        <tr class="text-center">
          <td>M</td>
          <td><?= $jml_prepet_m ?></td>
          <td class="text-right">Rp <?= number_format($jml_prepet_m * $produk['harga_prepet'], '2', ',', '.')  ?></td>
        </tr>
        <tr class="text-center">
          <td>L</td>
          <td><?= $jml_prepet_l ?></td>
          <td class="text-right">Rp <?= number_format($jml_prepet_l * $produk['harga_prepet'], '2', ',', '.')  ?></td>
        </tr>
        <tr class="text-center">
          <td>XL</td>
          <td><?= $jml_prepet_xl ?></td>
          <td class="text-right">Rp <?= number_format($jml_prepet_xl * $produk['harga_prepet'], '2', ',', '.')  ?></td>
        </tr>
        <tr class="text-center">
          <td>XXL</td>
          <td><?= $jml_prepet_xxl ?></td>
          <td class="text-right">Rp <?= number_format($jml_prepet_xxl * $produk['harga_prepet'], '2', ',', '.')  ?></td>
        </tr>
        <tr class="text-center">
          <th>Total</th>
          <th><?= $jml_prepet_s + $jml_prepet_m + $jml_prepet_l + $jml_prepet_xl + $jml_prepet_xxl ?></th>
          <th class="text-right">Rp <?= number_format($total_harga_prepet, '2', ',', '.')  ?></th>
        </tr>
      </table>
      <div class="break">

      </div>
      <br>
      <h6>Kebutuhan RIB :</h6>
      <table width="100%" border="1">
        <tr class="text-center">
          <th width="30%">Ukuran</th>
          <th width="30%">Panjang RIB (m)</th>
          <th>Biaya</th>
        </tr>
        <tr class="text-center">
          <td>S</td>
          <td><?= $jml_rib_s ?></td>
          <td class="text-right">Rp <?= number_format($jml_rib_s * $produk['harga_rib'], '2', ',', '.')  ?></td>
        </tr>
        <tr class="text-center">
          <td>M</td>
          <td><?= $jml_rib_m ?></td>
          <td class="text-right">Rp <?= number_format($jml_rib_m * $produk['harga_rib'], '2', ',', '.')  ?></td>
        </tr>
        <tr class="text-center">
          <td>L</td>
          <td><?= $jml_rib_l ?></td>
          <td class="text-right">Rp <?= number_format($jml_rib_l * $produk['harga_rib'], '2', ',', '.')  ?></td>
        </tr>
        <tr class="text-center">
          <td>XL</td>
          <td><?= $jml_rib_xl ?></td>
          <td class="text-right">Rp <?= number_format($jml_rib_xl * $produk['harga_rib'], '2', ',', '.')  ?></td>
        </tr>
        <tr class="text-center">
          <td>XXL</td>
          <td><?= $jml_rib_xxl ?></td>
          <td class="text-right">Rp <?= number_format($jml_rib_xxl * $produk['harga_rib'], '2', ',', '.')  ?></td>
        </tr>
        <tr class="text-center">
          <th>Total</th>
          <th><?= $jml_rib_s + $jml_rib_m + $jml_rib_l + $jml_rib_xl + $jml_rib_xxl ?></th>
          <th class="text-right">Rp <?= number_format($total_harga_rib, '2', ',', '.')  ?></th>
        </tr>
      </table>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script>
      window.print();
    </script>
  </body>
</html>