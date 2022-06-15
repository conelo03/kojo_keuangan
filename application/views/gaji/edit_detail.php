<?php $this->load->view('template/header');?>
<?php $this->load->view('template/sidebar');?>
<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1><?= $title?></h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="#">Kelola Gaji</a></div>
        <div class="breadcrumb-item">Edit Gaji</div>
      </div>
    </div>

    <div class="section-body">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <form action="<?= base_url('edit-detail-gaji/'.$id_gaji.'/'.$dg['id_detail_gaji']); ?>" method="post" enctype="multipart/form-data">
              <div class="card-header">
                <h4>Form Edit Gaji</h4>
              </div>
              <div class="card-body">
                <div class="form-group">
                  <label>Pegawai</label>
                  <select name="id_pegawai" class="form-control" id="select-pegawai" data-live-search="true">
                    <option disabled="" selected="">-- Pilih Pegawai --</option>
                    <?php 
                      foreach ($pegawai as $key) { ?>
                        <option value="<?= $key['id_pegawai'] ?>" <?= set_value('id_pegawai', $dg['id_pegawai']) == $key['id_pegawai'] ? 'selected' : ''; ?>><?= $key['nama'] ?> - <?= $key['jabatan'] ?></option>
                    <?php  }
                    ?>
                  </select>
                </div>
                <div class="form-group">
                  <label>Gaji Pokok</label>
                  <input type="number" name="gaji_pokok" class="form-control" id="gaji_pokok" value="<?= set_value('gaji_pokok', $dg['gaji_pokok']); ?>" required="">
                  <?= form_error('gaji_pokok', '<span class="text-danger small">', '</span>'); ?>
                </div>
                <div class="form-group">
                  <label>Bonus</label>
                  <input type="number" name="bonus" class="form-control" value="<?= set_value('bonus', $dg['bonus']); ?>" required="">
                  <?= form_error('bonus', '<span class="text-danger small">', '</span>'); ?>
                </div>
                <div class="form-group">
                  <label>Kasbon</label>
                  <input type="number" name="kasbon" class="form-control" value="<?= set_value('kasbon', $dg['kasbon']); ?>" required="">
                  <?= form_error('kasbon', '<span class="text-danger small">', '</span>'); ?>
                </div>
                <div class="form-group">
                  <label>Keterangan</label>
                  <input type="text" name="keterangan" class="form-control" value="<?= set_value('keterangan', $dg['keterangan']); ?>" required="">
                  <?= form_error('keterangan', '<span class="text-danger small">', '</span>'); ?>
                </div>
              </div>

              <div class="card-footer text-right">
                <a href="<?= base_url('detail-gaji/'.$id_gaji);?>" class="btn btn-light"><i class="fa fa-arrow-left"></i> Kembali</a>
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