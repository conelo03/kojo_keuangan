<?php $this->load->view('template/header');?>
<?php $this->load->view('template/sidebar');?>
<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1><?= $title?></h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="#">Kelola Gaji Produksi</a></div>
      </div>
    </div>

    <div class="section-body">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h4>Data Gaji Produksi</h4>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-striped" id="datatables-user">
                  <thead>
                    <tr>
                      <th class="text-center">#</th>
                      <th>Nama Pegawai</th>
                      <th>Gaji</th>
                      <th>Kasbon</th>
                      <th>Total</th>
                      <th class="text-center" style="width: 270px;">Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $no = 1; 
                    foreach($gaji_produksi as $u):?>
                    <tr>
                      <td class="text-center"><?= $no++;?></td>
                      <td><?= $u['nama'];?></td>
                      <td>Rp <?= number_format($u['jumlah'], '2',',','.' );?></td>
                      <td>Rp <?= number_format($u['kasbon'], '2',',','.' );?></td>
                      <td>Rp <?= number_format($u['total'], '2',',','.' );?></td>
                      <td class="text-center">
                        <a href="<?= base_url('detail-gaji-by-pegawai/'.$u['id_gaji_produksi'].'/'.$u['id_pegawai']);?>" class="btn btn-light"><i class="fa fa-list"></i> Detail</a>
                        <a href="<?= base_url('cetak-slip-gaji-produksi/'.$u['id_detail_gaji_produksi']);?>" class="btn btn-info"><i class="fa fa-print"></i> Cetak Slip</a>
                      </td>
                    </tr>
                    <?php endforeach;?>
                  </tbody>
                </table>
              </div>
              <a href="<?= base_url('gaji-produksi');?>" class="btn btn-light"><i class="fa fa-arrow-left"></i> Kembali</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
<?php $this->load->view('template/footer');?>