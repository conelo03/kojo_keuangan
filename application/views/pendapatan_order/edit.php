<?php $this->load->view('template/header');?>
<?php $this->load->view('template/sidebar');?>
<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1><?= $title?></h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="#">Kelola Pendapatan Order</a></div>
        <div class="breadcrumb-item">Edit Pendapatan Order</div>
      </div>
    </div>

    <div class="section-body">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <form action="<?= base_url('edit-pendapatan-order/'.$p['id_pendapatan_order']); ?>" method="post" enctype="multipart/form-data">
              <div class="card-header">
                <h4>Form Edit Pendapatan Order</h4>
              </div>
              <div class="card-body">
              <div class="row">
                  <div class="col-md-6 form-group">
                    <label>Tanggal</label>
                    <input type="date" name="tanggal" class="form-control" value="<?= set_value('tanggal', $p['tanggal']); ?>" required="">
                    <?= form_error('tanggal', '<span class="text-danger small">', '</span>'); ?>
                  </div>
                  <div class="col-md-6 form-group">
                    <label>Order</label>
                    <select name="id_order" class="form-control" id="select-order" data-live-search="true" required>
                      <option selected disabled>-- Pilih Order --</option>
                      <?php 
                        foreach ($order as $key) { ?>
                          <option value="<?= $key['id_order'] ?>" <?= set_value('id_order', $p['id_order']) == $key['id_order'] ? 'selected' : '' ?>><?= $key['nama_produk'] ?> - <?= $key['instansi'] ?></option>
                      <?php  }
                      ?>
                    </select>
                    <?= form_error('id_order', '<span class="text-danger small">', '</span>'); ?>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6 form-group">
                    <label>Keterangan</label>
                    <input type="text" name="keterangan" class="form-control" id="keterangan" value="<?= set_value('keterangan', $p['keterangan']); ?>" required="">
                    <?= form_error('keterangan', '<span class="text-danger small">', '</span>'); ?>
                  </div>
                  <div class="col-md-6 form-group">
                    <label>Jumlah</label>
                    <input type="number" name="jumlah" class="form-control" value="<?= set_value('jumlah', $p['jumlah']); ?>" required="">
                    <?= form_error('jumlah', '<span class="text-danger small">', '</span>'); ?>
                  </div>
                </div>
              </div>

              <div class="card-footer text-right">
                <a href="<?= base_url('pendapatan-order');?>" class="btn btn-light"><i class="fa fa-arrow-left"></i> Kembali</a>
                <button type="reset" class="btn btn-danger"><i class="fa fa-sync"></i> Reset</button>
                <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
<?php $this->load->view('template/footer');?>