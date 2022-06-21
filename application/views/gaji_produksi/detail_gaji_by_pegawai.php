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
              <h4>Informasi Pegawai</h4>
            </div>
            <div class="card-body">
              <div class="row">
                <div class="col-md-3">
                  <img src="<?= custom_url('assets/img/profile/'.$pegawai['foto']) ?>" class="rounded" style="max-width: 200px">
                </div>
                <div class="col-md-8">
                  <div class="row">
                    <div class="col-md-4"><h6>Nama</h6></div>
                    <div class="col-md-8"><h6>: <?= $pegawai['nama'] ?></h6></div>
                  </div>
                  <div class="row">
                    <div class="col-md-4"><h6>NIP</h6></div>
                    <div class="col-md-8"><h6>: <?= $pegawai['nip'] ?></h6></div>
                  </div>
                  <div class="row">
                    <div class="col-md-4"><h6>Jabatan</h6></div>
                    <div class="col-md-8"><h6>: <?= $pegawai['jabatan'] ?></h6></div>
                  </div>
                  <div class="row">
                    <div class="col-md-4"><h6>Alamat</h6></div>
                    <div class="col-md-8"><h6>: <?= $pegawai['alamat'] ?></h6></div>
                  </div>
                  <div class="row">
                    <div class="col-md-4"><h6>Tempat, tanggal lahir</h6></div>
                    <div class="col-md-8"><h6>: <?= $pegawai['tempat_lahir'] ?>, <?= $pegawai['tanggal_lahir'] ?></h6></div>
                  </div>
                  <div class="row">
                    <div class="col-md-4"><h6>Jenis Kelamin</h6></div>
                    <div class="col-md-8"><h6>: <?= $pegawai['jenis_kelamin'] ?></h6></div>
                  </div>
                </div>
                
              </div>
            </div>
            <div class="card-footer text-right">
              <a href="<?= base_url('detail-gaji-produksi/'.$id_gaji_produksi);?>" class="btn btn-light"><i class="fa fa-arrow-left"></i> Kembali</a>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="section-body">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h4>Data Upah Cutting</h4>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table id="datatables-cutting" class="table table-striped">
                  <thead>
                  <tr>
                    <th class="text-center">#</th>
                    <th>Pola Potongan</th>
                    <th>Detail Ukuran</th>
                    <th>Jumlah</th>
                    <th>Upah</th>
                    <th>Total Upah</th>
                    <th>Kasbon</th>
                    <th>Total Bayar</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php 
                    $no = 1;
                    foreach ($cutting as $u): ?>
                      <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $u['pola_potongan'] ?></td>
                        <td><?= $u['detail_ukuran'] ?></td>
                        <td><?= $u['jumlah'] ?></td>
                        <td><?= number_format($u['harga'], 0, ',', '.') ?></td>
                        <td><?= number_format($u['jumlah']*$u['harga'], 0, ',', '.') ?></td>
                        <td><?= number_format($u['kasbon'], 0, ',', '.') ?></td>
                        <td><?= number_format(($u['jumlah']*$u['harga'])-$u['kasbon'], 0, ',', '.') ?></td>
                      </tr>
                    <?php endforeach; ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="section-body">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h4>Data Upah Jahit</h4>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table id="datatables-jahit" class="table table-striped">
                  <thead>
                  <tr>
                    <th class="text-center">#</th>
                    <th>Ukuran Pendek</th>
                    <th>Ukuran Panjang</th>
                    <th>Jumlah</th>
                    <th>Upah</th>
                    <th>Total Upah</th>
                    <th>Kasbon</th>
                    <th>Total Bayar</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php 
                    $no = 1;
                    foreach ($jahit as $u): ?>
                      <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $u['ukuran_pendek'] ?></td>
                        <td><?= $u['ukuran_panjang'] ?></td>
                        <td><?= $u['jumlah'] ?></td>
                        <td><?= number_format($u['harga'], 0, ',', '.') ?></td>
                        <td><?= number_format($u['jumlah']*$u['harga'], 0, ',', '.') ?></td>
                        <td><?= number_format($u['kasbon'], 0, ',', '.') ?></td>
                        <td><?= number_format(($u['jumlah']*$u['harga'])-$u['kasbon'], 0, ',', '.') ?></td>
                      </tr>
                    <?php endforeach; ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="section-body">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h4>Data Upah QC / Packing</h4>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table id="datatables-qc" class="table table-striped">
                  <thead>
                  <tr>
                    <th class="text-center">#</th>
                    <th>Ukuran Pendek</th>
                    <th>Ukuran Panjang</th>
                    <th>Jumlah</th>
                    <th>Upah</th>
                    <th>Total Upah</th>
                    <th>Kasbon</th>
                    <th>Total Bayar</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php 
                    $no = 1;
                    foreach ($qc as $u): ?>
                      <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $u['ukuran_pendek'] ?></td>
                        <td><?= $u['ukuran_panjang'] ?></td>
                        <td><?= $u['jumlah'] ?></td>
                        <td><?= number_format($u['harga'], 0, ',', '.') ?></td>
                        <td><?= number_format($u['jumlah']*$u['harga'], 0, ',', '.') ?></td>
                        <td><?= number_format($u['kasbon'], 0, ',', '.') ?></td>
                        <td><?= number_format(($u['jumlah']*$u['harga'])-$u['kasbon'], 0, ',', '.') ?></td>
                      </tr>
                    <?php endforeach; ?>
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