<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title><?= $title ?></title>
  </head>
  <body>
    <div class="container-fluid">
      <div class="text-center">
        <img src="<?= base_url('assets/img/kojo.jpg') ?>" width="200px"/>
        <h5>Jln. xxx</h5>
      </div>
      <hr style="border-top: 1px solid black; width: 80%">
      <br/>
      <table width="100%" border="0">
        <tr>
          <td width="20%">NIP</td>
          <td>: <b><?= $dg['nip'] ?></b></td>
        </tr>
        <tr>
          <td width="20%">Nama</td>
          <td>: <b><?= $dg['nama'] ?></b></td>
        </tr>
        <tr>
          <td width="20%">Jabatan</td>
          <td>: <b><?= $dg['jabatan'] ?></b></td>
        </tr>

      </table>
      <br/>
      <table width="100%" border="0">
        <tr>
          <td width="30%"><b>PENGHASILAN</b></td>
          <td width="2%"></td>
          <td width="15%"></td>
          <td width="6%"></td>
          <td width="30%"><b>POTONGAN</b></td>
          <td width="2%"></td>
          <td width="15%"></td>
        </tr>
        <tr>
          <td width="30%">Gaji Pokok</td>
          <td width="2%">=</td>
          <td width="15%" class="text-right"><?= number_format($dg['gaji_pokok'], '0', '.', ',') ?></td>
          <td width="6%"></td>
          <td width="30%">Kasbon</td>
          <td width="2%">=</td>
          <td width="15%" class="text-right"><?= number_format($dg['kasbon'], '0', '.', ',') ?></td>
        </tr>
        <tr>
          <td width="30%">Bonus</td>
          <td width="2%">=</td>
          <td width="15%" class="text-right"><?= number_format($dg['bonus'], '0', '.', ',') ?></td>
          <td width="6%"></td>
          <td width="30%"></td>
          <td width="2%"></td>
          <td width="15%" class="text-right"></td>
        </tr>
        <tr>
          <td width="30%"></td>
          <td width="2%"></td>
          <td width="15%" class="text-right"><hr style="border-top: 1px solid black"></td>
          <td width="6%"></td>
          <td width="30%"></td>
          <td width="2%"></td>
          <td width="15%" class="text-right"><hr style="border-top: 1px solid black"></td>
        </tr>
        <tr>
          <td width="30%" class="text-right"><b>Total (A)</b></td>
          <td width="2%"></td>
          <td width="15%" class="text-right"><b>Rp <?= number_format($dg['gaji_pokok']+$dg['bonus'], '0', '.', ',') ?></b></td>
          <td width="6%"></td>
          <td width="30%" class="text-right"><b>Total (B)</b></td>
          <td width="2%"></td>
          <td width="15%" class="text-right"><b>Rp <?= number_format($dg['kasbon'], '0', '.', ',') ?></b></td>
        </tr>
      </table>
      <br/>
      <table width="100%" border="0">
        <tr>
          <td width="49%" class="text-center"><hr style="border-top: 1px solid black"><b>PENERIMAAN BERSIH (A - B)</b></td>
          <td width="2%"><hr style="border-top: 1px solid black">=</td>
          <td width="49%" class="text-center"><hr style="border-top: 1px solid black"><b>Rp <?= number_format($dg['gaji_pokok']+$dg['bonus']-$dg['kasbon'], '0', '.', ',') ?></b></td>
        </tr>
        <tr>
          <td colspan="3" class="text-center">
          <hr style="border-top: 1px solid black">
            <i>Terbilang : # <?= terbilang($dg['gaji_pokok']+$dg['bonus']-$dg['kasbon']) ?> #</i>
            <hr style="border-top: 1px solid black">
          </td>
        </tr>
      </table>
      <br/>
      <table width="100%" border="0">
        <tr>
            <td class="text-center" width="65%" style="font-size: 10pt;">
            </td>
            <td class="text-center" style="font-size: 10pt;">
            Bandung, <?= date('d F Y') ?><br/>
            Manajer Keuangan<br/><br/><br/><br/><br/><br/>
            Nama Manajer Keuangan</td>
        </tr>
      </table>
    </div>
    <?php
    function penyebut($nilai) {
        $nilai = abs($nilai);
        $huruf = array("", "satu", "dua", "tiga", "empat", "lima", "enam", "tujuh", "delapan", "sembilan", "sepuluh", "sebelas");
        $temp = "";
        if ($nilai < 12) {
            $temp = " ". $huruf[$nilai];
        } else if ($nilai <20) {
            $temp = penyebut($nilai - 10). " belas";
        } else if ($nilai < 100) {
            $temp = penyebut($nilai/10)." puluh". penyebut($nilai % 10);
        } else if ($nilai < 200) {
            $temp = " seratus" . penyebut($nilai - 100);
        } else if ($nilai < 1000) {
            $temp = penyebut($nilai/100) . " ratus" . penyebut($nilai % 100);
        } else if ($nilai < 2000) {
            $temp = " seribu" . penyebut($nilai - 1000);
        } else if ($nilai < 1000000) {
            $temp = penyebut($nilai/1000) . " ribu" . penyebut($nilai % 1000);
        } else if ($nilai < 1000000000) {
            $temp = penyebut($nilai/1000000) . " juta" . penyebut($nilai % 1000000);
        } else if ($nilai < 1000000000000) {
            $temp = penyebut($nilai/1000000000) . " milyar" . penyebut(fmod($nilai,1000000000));
        } else if ($nilai < 1000000000000000) {
            $temp = penyebut($nilai/1000000000000) . " trilyun" . penyebut(fmod($nilai,1000000000000));
        }     
        return $temp;
    }
 
    function terbilang($nilai) {
        if($nilai<0) {
            $hasil = "minus ". trim(penyebut($nilai))." rupiah";
        } else {
            $hasil = trim(penyebut($nilai))." rupiah";
        }           
        return $hasil;
    }

    ?>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>