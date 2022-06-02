<?php $this->load->view('template/header');?>
<?php $this->load->view('template/sidebar');?>
<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1><?= $title?></h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="#">Kelola Pemasukan</a></div>
        <div class="breadcrumb-item">Tambah Pemasukan</div>
      </div>
    </div>

    <div class="section-body">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <form action="<?= base_url('tambah-pemasukan'); ?>" method="post" enctype="multipart/form-data">
              <div class="card-header">
                <h4>Form Tambah Pemasukan</h4>
              </div>
              <div class="card-body">
                <div class="row">
                  <div class="col-md-6 form-group">
                    <label>Tanggal</label>
                    <input type="date" name="tanggal" class="form-control" value="<?= set_value('tanggal'); ?>" required="">
                    <?= form_error('tanggal', '<span class="text-danger small">', '</span>'); ?>
                  </div>
                  <div class="col-md-6 form-group">
                    <label>Jenis Pemasukan</label>
                    <select name="id_jenis_pemasukan" class="form-control" required>
                      <option selected disabled>-- Pilih Jenis --</option>
                      <?php 
                        foreach ($jenis_pemasukan as $key) { ?>
                          <option value="<?= $key['id_jenis_pemasukan'] ?>" <?= set_value('id_jenis_pemasukan') == $key['id_jenis_pemasukan'] ? 'selected' : '' ?>><?= $key['jenis_pemasukan'] ?></option>
                      <?php  }
                      ?>
                    </select>
                    <?= form_error('id_jenis_pemasukan', '<span class="text-danger small">', '</span>'); ?>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6 form-group">
                    <label>Keterangan</label>
                    <input type="text" name="keterangan" class="form-control" value="<?= set_value('keterangan'); ?>" required="">
                    <?= form_error('keterangan', '<span class="text-danger small">', '</span>'); ?>
                  </div>
                  <div class="col-md-6 form-group">
                    <label>Referensi</label>
                    <input type="text" name="referensi" class="form-control" value="<?= set_value('referensi'); ?>" required="">
                    <?= form_error('referensi', '<span class="text-danger small">', '</span>'); ?>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12 form-group">
                    <label>Jumlah</label>
                    <input type="number" name="jumlah" class="form-control" value="<?= set_value('jumlah'); ?>" required="">
                    <?= form_error('jumlah', '<span class="text-danger small">', '</span>'); ?>
                  </div>
                </div>
              </div>

              <div class="card-footer text-right">
                <a href="<?= base_url('pemasukan');?>" class="btn btn-light"><i class="fa fa-arrow-left"></i> Kembali</a>
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