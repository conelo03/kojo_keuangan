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
                <a href="<?= base_url('tambah-gaji');?>" class="btn btn-info"><i class="fa fa-plus"></i> Tambah Data</a>
              </div>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-striped" id="datatables-user">
                  <thead>
                    <tr>
                      <th class="text-center">#</th>
                      <th style="width: 80px;">Tanggal</th>
                      <th>Jumlah</th>
                      <th>Keterangan</th>
                      <th>Status</th>
                      <th class="text-center" style="width: 350px;">Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $no = 1; 
                    foreach($gaji as $u):?>
                    <tr>
                      <td class="text-center"><?= $no++;?></td>
                      <td><?= $u['tanggal'];?></td>
                      <td>Rp <?= number_format($u['jumlah'], '2',',','.' );?></td>
                      <td><?= $u['keterangan'];?></td>
                      <td>
                        <?php
                          if($u['status'] == 0){
                            echo 'Belum Diposting';
                          }elseif($u['status'] == 1){
                            echo 'Sudah Diposting';
                          }
                        ?>
                        </td>
                      <td class="text-center">
                        <?php if($u['status'] == 0): ?>
                          <button class="btn btn-success" data-confirm="Anda yakin ingin posting data gaji?|Data yang sudah diposting tidak akan bisa diedit kembali." data-confirm-yes="document.location.href='<?= base_url('posting-gaji/'.$u['id_gaji']); ?>';"><i class="fa fa-paper-plane"></i> Posting</button>
                          <a href="<?= base_url('detail-gaji/'.$u['id_gaji']);?>" class="btn btn-light"><i class="fa fa-list"></i> Detail</a>
                          <a href="<?= base_url('edit-gaji/'.$u['id_gaji']);?>" class="btn btn-info"><i class="fa fa-edit"></i> Edit</a>
                          <button class="btn btn-danger" data-confirm="Anda yakin ingin menghapus data ini?|Data yang sudah dihapus tidak akan kembali." data-confirm-yes="document.location.href='<?= base_url('hapus-gaji/'.$u['id_gaji']); ?>';"><i class="fa fa-trash"></i> Delete</button>
                        <?php elseif($u['status'] == 1): ?>
                          <a href="<?= base_url('detail-gaji/'.$u['id_gaji']);?>" class="btn btn-light"><i class="fa fa-list"></i> Detail</a>
                          <button class="btn btn-danger" data-confirm="Anda yakin ingin menghapus data ini?|Data yang sudah dihapus tidak akan kembali." data-confirm-yes="document.location.href='<?= base_url('hapus-gaji/'.$u['id_gaji']); ?>';"><i class="fa fa-trash"></i> Delete</button>
                        <?php endif; ?>
                        
                        
                      </td>
                    </tr>
                    <?php endforeach;?>
                  </tbody>
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