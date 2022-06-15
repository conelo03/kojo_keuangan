<?php $this->load->view('template/header');?>
<?php $this->load->view('template/sidebar');?>
<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1><?= $title?></h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="#">Kelola Gaji</a></div>
      </div>
    </div>

    <div class="section-body">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h4>Data Gaji</h4>
              <div class="card-header-action">
                <?php if ($gp['status'] == 0) { ?>
                    <a href="<?= base_url('tambah-detail-gaji/'.$id_gaji);?>" class="btn btn-info"><i class="fa fa-plus"></i> Tambah Data</a>
                <?php } ?>
              </div>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-striped" id="datatables-user">
                  <thead>
                    <tr>
                      <th class="text-center">#</th>
                      <th>Nama Pegawai</th>
                      <th>Gaji Pokok</th>
                      <th>Bonus</th>
                      <th>Kasbon</th>
                      <th>Total</th>
                      <th class="text-center" style="width: 270px;">Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $no = 1; 
                    foreach($gaji as $u):?>
                    <tr>
                      <td class="text-center"><?= $no++;?></td>
                      <td><?= $u['nama'];?></td>
                      <td>Rp <?= number_format($u['gaji_pokok'], '2',',','.' );?></td>
                      <td>Rp <?= number_format($u['bonus'], '2',',','.' );?></td>
                      <td>Rp <?= number_format($u['kasbon'], '2',',','.' );?></td>
                      <td>Rp <?= number_format($u['total'], '2',',','.' );?></td>
                      <td class="text-center">
                        <a href="<?= base_url('cetak-slip-gaji/'.$u['id_detail_gaji']);?>" target="_blank" class="btn btn-light"><i class="fa fa-print"></i> Cetak Slip</a>
                        <?php if ($gp['status'] == 0) { ?>
                          <a href="<?= base_url('edit-detail-gaji/'.$id_gaji.'/'.$u['id_detail_gaji']);?>" class="btn btn-info"><i class="fa fa-edit"></i> Edit</a>
                          <button class="btn btn-danger" data-confirm="Anda yakin ingin menghapus data ini?|Data yang sudah dihapus tidak akan kembali." data-confirm-yes="document.location.href='<?= base_url('hapus-detail-gaji/'.$id_gaji.'/'.$u['id_detail_gaji']); ?>';"><i class="fa fa-trash"></i> Delete</button>
                        <?php } ?>
                      </td>
                    </tr>
                    <?php endforeach;?>
                  </tbody>
                </table>
              </div>
              <a href="<?= base_url('gaji');?>" class="btn btn-light"><i class="fa fa-arrow-left"></i> Kembali</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
<?php $this->load->view('template/footer');?>