<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>

<!-- Content Header (Page header) -->
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>
          <?= $header; ?>
        </h1>
      </div>
    </div>
  </div>
  <!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">

  <!-- Default box -->
  <div class="card">
    <div class="card-body">
      <div class="container">
        <div class="row">
          <div class="col-6">
            <div class="mt-1">
              <form action="/guru/savedata" method="POST" class="md-10" enctype="multipart/form-data">
                <?= csrf_field(); ?>
                <div class="form-group">
                  <label for="nama">Nama</label>
                  <input type="text" class="form-control <?= ($valid->hasError('nama')) ? 'is-invalid' : ''; ?>" id="nama" placeholder="Nama" name="nama" autofocus autocomplete="off" value="<?= old('nama'); ?>">
                  <div id="validationServer03Feedback" class="invalid-feedback">
                    <?= $valid->getError('nama'); ?>
                  </div>
                </div>
                <div class="form-row form-group">
                  <div class="col">
                    <label for="tempatlahir">Tempat lahir</label>
                    <input type="text" class="form-control" placeholder="Tempat lahir" id="tempatlahir" name="tem_lahir" autocomplete="off" value="<?= old('tem_lahir'); ?>">
                  </div>
                  <div class="col">
                    <label for="tanggallahir">Tanggal lahir</label>
                    <div class="input-group flex-nowrap">
                      <div class="input-group-prepend">
                        <span class="input-group-text" id="addon-wrapping">
                          <i class="fas fa-calendar"></i>
                        </span>
                      </div>
                      <input type="text" class="form-control datepicker" placeholder="Tanggal lahir" id="tanggallahir" name="tan_lahir" autocomplete="off" value="<?= old('tan_lahir'); ?>">
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label for="tmt">Tanggal mulai tugas</label>
                  <div class="input-group flex-nowrap">
                    <div class="input-group-prepend">
                      <span class="input-group-text" id="addon-wrapping">
                        <i class="fas fa-calendar"></i>
                      </span>
                    </div>
                    <input type="text" class="form-control datepicker" placeholder="Tanggal mulai tugas" id="tmt" name="tmt" autocomplete="off" value="<?= old('tmt'); ?>">
                  </div>
                </div>
                <div class="form-row form-group">
                  <div class="col">
                    <label for="jabatan">Jabatan</label>
                    <select id="jabatan" class="form-control" name="jabatan">
                      <option value="kepsek">Kepala Sekolah</option>
                      <optgroup label="Wakil Kepala">
                        <option value="waka_pend">Waka Pendidikan</option>
                        <option value="waka_sis">Waka Kesiswaan</option>
                        <option value="waka_hum">Waka Humas</option>
                      </optgroup>
                      <option value="guru">Guru</option>
                      <option value="tu">Tata Usaha</option>
                    </select>
                  </div>
                  <div class="col">
                    <label for="mapel">Mapel</label>
                    <select id="mapel" class="form-control" name="mapel">
                      <optgroup label="Mapel Umum">
                        <option value="Bahasa Indonesia">Bahasa Indonesia</option>
                        <option value="Bahasa Inggris">Bahasa Inggris</option>
                        <option value="Matematika Wajib">Matematika Wajib</option>
                        <option value="Ekonomi">Ekonomi</option>
                        <option value="Sejarah">Sejarah</option>
                        <option value="Geografi">Geografi</option>
                        <option value="Sosiologi">Sosiologi</option>
                        <option value="PKn">PKn</option>
                        <option value="Sastra Inggris">Sastra Inggris</option>
                        <option value="Fisika">Fisika</option>
                        <option value="Kimia">Kimia</option>
                        <option value="Biologi">Biologi</option>
                        <option value="Matematika Peminatan">Matematika Peminatan</option>
                        <option value="Seni Budaya">Seni Budaya</option>
                        <option value="PDK">PDK</option>
                        <option value="Antropologi">Antropologi</option>
                        <option value="Pendidikan Jasmani">Pendidikan Jasmani</option>
                      </optgroup>
                      <optgroup label="Mapel Lokal">
                        <option value="Faroid">Faroid</option>
                        <option value="Tafsir">Tafsir</option>
                        <option value="Risalatul Mahidl">Risalatul Mahidl</option>
                        <option value="Fathul Qorib">Fathul Qorib</option>
                        <option value="Tarbiyah">Tarbiyah</option>
                        <option value="Nahwu">Nahwu</option>
                        <option value="I'rob">I'rob</option>
                        <option value="SKUA">SKUA</option>
                        <option value="Ushul Fiqih">Ushul Fiqih</option>
                        <option value="Adab Islamiyah">Adab Islamiyah</option>
                        <option value="Mustholahul Hadis">Mustholahul Hadis</option>
                      </optgroup>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label for="jeniskelamin">Jenis Kelamin</label>
                  <select id="jeniskelamin" class="form-control" name="j_kelamin">
                    <option value="laki - laki">Laki - laki</option>
                    <option value="perempuan">Perempuan</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="pendidikan">Pendidikan</label>
                  <select id="pendidikan" class="form-control" name="pendidikan">
                    <option value="perguruan_tinggi">Perguruan Tinggi</option>
                    <option value="ponpes">Pondok Pesantren</option>
                    <option value="sma_sederajat">SMA Sederajat</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="lembaga">Lembaga</label>
                  <textarea class="form-control" id="lembaga" rows="2" name="lembaga"><?= old('lembaga'); ?></textarea>
                </div>
                <div class="form-group">
                  <label for="domisili">Domisili</label>
                  <textarea class="form-control" id="domisili" rows="2" name="domisili"><?= old('domisili'); ?></textarea>
                </div>
                <div class="form-group">
                  <label for="alamat">Alamat</label>
                  <textarea class="form-control" id="alamat" rows="3" name="alamat"><?= old('alamat'); ?></textarea>
                </div>
                <div class="form-group">
                  <label for="pic">Tambah foto guru</label>
                  <input type="file" class="form-control-file <?= ($valid->hasError('pic')) ? 'is-invalid' : ''; ?>" id="pic" name="pic" onchange="previewFoto()">
                  <div id="validationServer03Feedback" class="invalid-feedback">
                    <?= $valid->getError('pic'); ?>
                  </div>
                </div>
                <div class="form-group col d-inline-block ">
                  <img src="/img/default.png" class="img-thumbnail img-preview">
                </div>
                <button type="submit" class="btn btn-success" name="submit">Submit</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</section>
<!-- /.content -->

<?= $this->endSection(); ?>