<?php $this->load->view('template/header');?>
<?php $this->load->view('template/sidebar');?>
<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1><?= $title?></h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="#">Kelola Cash Flow</a></div>
      </div>
    </div>

    <div class="section-body">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h4>Data Cash Flow</h4>
            </div>
            <div class="card-body">
              <form action="<?= base_url('cash-flow'); ?>" method="post">
                <div class="row">
                  <div class="col-md-6 form-group">
                    <label>Pilih Bulan</label>
                    <select name="month" class="form-control" required>
                      <option selected disabled>-- Pilih Bulan --</option>
                      <?php 
                        foreach ($month as $key) { ?>
                          <option value="<?= $key['tgl1'] ?>" <?= $month_c == $key['tgl1'] ? 'selected' : '' ?>><?= $key['tgl'] ?></option>
                      <?php  }
                      ?>
                    </select>
                  </div>
                  <div class="col-md-6 form-group">
                    <label>&nbsp;</label><br>
                    <button type="submit" class="btn btn-primary"><i class="fa fa-filter"></i> Filter</button>
                  </div>
                </div>
              </form>
              <div class="table-responsive">
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th class="text-center" style="width: 30px;">#</th>
                      <th class="text-center" style="width: 150px;">Tanggal</th>
                      <th>Keterangan</th>
                      <th class="text-center" style="width: 100px;">Ref</th>
                      <th class="text-center" style="width: 200px;">Pemasukan</th>
                      <th class="text-center" style="width: 200px;">Pengeluaran</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $no = 1; 
                    $pemasukan = 0;
                    $pengeluaran = 0;
                    foreach($cash as $u):
                      $pemasukan += $u['pemasukan'] != '' ? $u['pemasukan'] : 0;
                      $pengeluaran += $u['pengeluaran'] != '' ? $u['pengeluaran'] : 0;
                    ?>
                    <tr>
                      <td class="text-center"><?= $no++;?></td>
                      <td class="text-center"><?= $u['tgl'];?></td>
                      <td><?= $u['ket'];?></td>
                      <td class="text-center"><?= $u['ref'];?></td>
                      <td class="text-right"><?= $u['pemasukan'] != '' ? 'Rp '.number_format($u['pemasukan'], '2',',','.' ) : '';?></td>
                      <td class="text-right"><?= $u['pengeluaran'] != '' ? 'Rp '.number_format($u['pengeluaran'], '2',',','.' ) : '';?></td>
                    </tr>
                    <?php endforeach;?>
                  </tbody>
                  <thead>
                    <tr>
                      <th class="text-center" colspan="4">TOTAL</th>
                      <th class="text-center" style="width: 200px;"><?= 'Rp '.number_format($pemasukan, '2',',','.' );?></th>
                      <th class="text-center" style="width: 200px;"><?= 'Rp '.number_format($pengeluaran, '2',',','.' );?></th>
                    </tr>
                    <tr>
                      <th class="text-center" colspan="4">SELISIH</th>
                      <th class="text-center" colspan="2">
                        <?php
                        $selisih; 
                        if($pemasukan - $pengeluaran < 0) {
                          $selisih = '<span style="color: red;">(Rp '.number_format($pemasukan - $pengeluaran, '2',',','.' ).')</span';
                        } else {
                          $selisih = 'Rp '.number_format($pemasukan - $pengeluaran, '2',',','.' );
                        } ?>
                        <?= $selisih;?>
                      </th>
                    </tr>
                  </thead>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
<?php $this->load->view('template/footer');?>