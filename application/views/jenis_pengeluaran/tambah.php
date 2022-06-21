<?php $this->load->view('template/header');?>
<?php $this->load->view('template/sidebar');?>
<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1><?= $title?></h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="#">Kelola Jenis Pengeluaran</a></div>
        <div class="breadcrumb-item">Tambah Jenis Pengeluaran</div>
      </div>
    </div>

    <div class="section-body">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <form action="<?= base_url('tambah-jenis-pengeluaran'); ?>" method="post" enctype="multipart/form-data">
              <div class="card-header">
                <h4>Form Tambah Jenis Pengeluaran</h4>
              </div>
              <div class="card-body">
                <div class="row">
                  <div class="col-md-12 form-group">
                    <label>Jenis Pengeluaran</label>
                    <input type="text" name="jenis_pengeluaran" class="form-control" value="<?= set_value('jenis_pengeluaran'); ?>" required="">
                    <?= form_error('jenis_pengeluaran', '<span class="text-danger small">', '</span>'); ?>
                  </div>
                </div>
              </div>

              <div class="card-footer text-right">
                <a href="<?= base_url('jenis-pengeluaran');?>" class="btn btn-light"><i class="fa fa-arrow-left"></i> Kembali</a>
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