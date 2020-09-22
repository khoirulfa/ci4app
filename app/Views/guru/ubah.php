<?php

use App\Controllers\Guru;
?>
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
                     <form action="/guru/update/<?= $dataGuru['id']; ?>" method="POST" class="md-10" enctype="multipart/form-data">
                        <?= csrf_field(); ?>
                        <input type="hidden" name="fotoLama" value="<?= $dataGuru['pic']; ?>">
                        <input type="hidden" name="id" value="<?= $dataGuru['id']; ?>">
                        <div class="form-group">
                           <label for="nama">Nama</label>
                           <input type="text" class="form-control <?= ($valid->hasError('nama')) ? 'is-invalid' : ''; ?>" id="nama" placeholder="Nama" name="nama" autofocus autocomplete="off" value="<?= (old('nama')) ? old('nama') : $dataGuru['nama'] ?>">
                           <div id="validationServer03Feedback" class="invalid-feedback">
                              <?= $valid->getError('nama'); ?>
                           </div>
                        </div>
                        <div class="form-row form-group">
                           <div class="col">
                              <label for="tempatlahir">Tempat lahir</label>
                              <input type="text" class="form-control" placeholder="Tempat lahir" id="tempatlahir" name="tem_lahir" autocomplete="off" value="<?= (old('tem_lahir')) ? old('tem_lahir') : $dataGuru['tem_lahir'] ?>">
                           </div>
                           <div class="col">
                              <label for="tanggallahir">Tanggal lahir</label>
                              <div class="input-group flex-nowrap">
                                 <div class="input-group-prepend">
                                    <span class="input-group-text" id="addon-wrapping">
                                       <i class="fas fa-calendar"></i>
                                    </span>
                                 </div>
                                 <input type="text" class="form-control datepicker" placeholder="Tanggal lahir" id="tanggallahir" name="tan_lahir" autocomplete="off" value="<?= (old('tan_lahir')) ? old('tan_lahir') : $dataGuru['tan_lahir'] ?>">
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
                              <input type="text" class="form-control datepicker" placeholder="Tanggal mulai tugas" id="tmt" name="tmt" autocomplete="off" value="<?= (old('tmt')) ? old('tmt') : $dataGuru['tmt'] ?>">
                           </div>
                        </div>
                        <div class="form-row form-group">
                           <div class="col">
                              <label for="jabatan">Jabatan</label>
                              <select id="jabatan" class="form-control" name="jabatan">
                                 <option value="kepsek" <?= ($dataGuru['jabatan'] == 'kepsek') ? 'selected' : ''; ?>>Kepala Sekolah</option>
                                 <optgroup label="Wakil Kepala">
                                    <option value="waka_pend" <?= ($dataGuru['jabatan'] == 'waka_pend') ? 'selected' : ''; ?>>Waka Pendidikan</option>
                                    <option value="waka_sis" <?= ($dataGuru['jabatan'] == 'waka_sis') ? 'selected' : ''; ?>>Waka Kesiswaan</option>
                                    <option value="waka_hum" <?= ($dataGuru['jabatan'] == 'waka_hum') ? 'selected' : ''; ?>>Waka Humas</option>
                                 </optgroup>
                                 <option value="guru" <?= ($dataGuru['jabatan'] == 'guru') ? 'selected' : ''; ?>>Guru</option>
                                 <option value="tu" <?= ($dataGuru['jabatan'] == 'tu') ? 'selected' : ''; ?>>Tata Usaha</option>
                              </select>
                           </div>
                           <div class="col">
                              <label for="mapel">Mapel</label>
                              <select id="mapel" class="form-control" name="mapel">
                                 <optgroup label="Mapel Umum">
                                    <option value="Bahasa Indonesia" <?= ($dataGuru['mapel'] == 'Bahasa Indonesia') ? 'selected' : ''; ?>>Bahasa Indonesia</option>
                                    <option value="Bahasa Inggris" <?= ($dataGuru['mapel'] == 'Bahasa Inggris') ? 'selected' : ''; ?>>Bahasa Inggris</option>
                                    <option value="Matematika Wajib" <?= ($dataGuru['mapel'] == 'Matematika Wajib') ? 'selected' : ''; ?>>Matematika Wajib</option>
                                    <option value="Ekonomi" <?= ($dataGuru['mapel'] == 'Ekonomi') ? 'selected' : ''; ?>>Ekonomi</option>
                                    <option value="Sejarah" <?= ($dataGuru['mapel'] == 'Sejarah') ? 'selected' : ''; ?>>Sejarah</option>
                                    <option value="Geografi" <?= ($dataGuru['mapel'] == 'Geografi') ? 'selected' : ''; ?>>Geografi</option>
                                    <option value="Sosiologi" <?= ($dataGuru['mapel'] == 'Sosiologi') ? 'selected' : ''; ?>>Sosiologi</option>
                                    <option value="PKn" <?= ($dataGuru['mapel'] == 'PKn') ? 'selected' : ''; ?>>PKn</option>
                                    <option value="Sastra Inggris" <?= ($dataGuru['mapel'] == 'Sastra Inggris') ? 'selected' : ''; ?>>Sastra Inggris</option>
                                    <option value="Fisika" <?= ($dataGuru['mapel'] == 'Fisika') ? 'selected' : ''; ?>>Fisika</option>
                                    <option value="Kimia" <?= ($dataGuru['mapel'] == 'Kimia') ? 'selected' : ''; ?>>Kimia</option>
                                    <option value="Biologi" <?= ($dataGuru['mapel'] == 'Biologi') ? 'selected' : ''; ?>>Biologi</option>
                                    <option value="Matematika Peminatan" <?= ($dataGuru['mapel'] == 'Matematika Peminatan') ? 'selected' : ''; ?>>Matematika Peminatan</option>
                                    <option value="Seni Budaya" <?= ($dataGuru['mapel'] == 'Seni Budaya') ? 'selected' : ''; ?>>Seni Budaya</option>
                                    <option value="PDK" <?= ($dataGuru['mapel'] == 'PDK') ? 'selected' : ''; ?>>PDK</option>
                                    <option value="Antropologi" <?= ($dataGuru['mapel'] == 'Antropologi') ? 'selected' : ''; ?>>Antropologi</option>
                                    <option value="Pendidikan Jasmani" <?= ($dataGuru['mapel'] == 'Pendidikan Jasmani') ? 'selected' : ''; ?>>Pendidikan Jasmani</option>
                                 </optgroup>
                                 <optgroup label="Mapel Lokal">
                                    <option value="Faroid" <?= ($dataGuru['mapel'] == 'Faroid') ? 'selected' : ''; ?>>Faroid</option>
                                    <option value="Tafsir" <?= ($dataGuru['mapel'] == 'Tafsir') ? 'selected' : ''; ?>>Tafsir</option>
                                    <option value="Risalatul Mahidl" <?= ($dataGuru['mapel'] == 'Risalatul Mahidl') ? 'selected' : ''; ?>>Risalatul Mahidl</option>
                                    <option value="Fathul Qorib" <?= ($dataGuru['mapel'] == 'Fathul Qorib') ? 'selected' : ''; ?>>Fathul Qorib</option>
                                    <option value="Tarbiyah" <?= ($dataGuru['mapel'] == 'Tarbiyah') ? 'selected' : ''; ?>>Tarbiyah</option>
                                    <option value="Nahwu" <?= ($dataGuru['mapel'] == 'Nahwu') ? 'selected' : ''; ?>>Nahwu</option>
                                    <option value="I'rob" <?= ($dataGuru['mapel'] == "I'rob") ? 'selected' : ''; ?>>I'rob</option>
                                    <option value="SKUA" <?= ($dataGuru['mapel'] == 'SKUA') ? 'selected' : ''; ?>>SKUA</option>
                                    <option value="Ushul Fiqih" <?= ($dataGuru['mapel'] == 'Ushul Fiqih') ? 'selected' : ''; ?>>Ushul Fiqih</option>
                                    <option value="Adab Islamiyah" <?= ($dataGuru['mapel'] == 'Adab Islamiyah') ? 'selected' : ''; ?>>Adab Islamiyah</option>
                                    <option value="Mustholahul Hadis" <?= ($dataGuru['mapel'] == 'Mustholahul Hadis') ? 'selected' : ''; ?>>Mustholahul Hadis</option>
                                 </optgroup>
                              </select>
                           </div>
                        </div>
                        <div class="form-group">
                           <label for="jeniskelamin">Jenis Kelamin</label>
                           <select id="jeniskelamin" class="form-control" name="j_kelamin">
                              <option value="laki - laki" <?= ($dataGuru['j_kelamin'] == 'laki - laki') ? 'selected' : ''; ?>>Laki - laki</option>
                              <option value="perempuan" <?= ($dataGuru['j_kelamin'] == 'perempuan') ? 'selected' : ''; ?>>Perempuan</option>
                           </select>
                        </div>
                        <div class="form-group">
                           <label for="pendidikan">Pendidikan</label>
                           <select id="pendidikan" class="form-control" name="pendidikan">
                              <option value="perguruan_tinggi" <?= ($dataGuru['pendidikan'] == 'perguruan_tinggi') ? 'selected' : ''; ?>>Perguruan Tinggi</option>
                              <option value="ponpes" <?= ($dataGuru['pendidikan'] == 'perempuan') ? 'ponpes' : ''; ?>>Pondok Pesantren</option>
                              <option value="sma_sederajat" <?= ($dataGuru['pendidikan'] == 'perempuan') ? 'sma_sederajat' : ''; ?>>SMA Sederajat</option>
                           </select>
                        </div>
                        <div class="form-group">
                           <label for="lembaga">Lembaga</label>
                           <textarea class="form-control" id="lembaga" rows="2" name="lembaga"><?= (old('lembaga')) ? old('lembaga') : $dataGuru['lembaga'] ?></textarea>
                        </div>
                        <div class="form-group">
                           <label for="domisili">Domisili</label>
                           <textarea class="form-control" id="domisili" rows="2" name="domisili"><?= (old('domisili')) ? old('domisili') : $dataGuru['domisili'] ?></textarea>
                        </div>
                        <div class="form-group">
                           <label for="alamat">Alamat</label>
                           <textarea class="form-control" id="alamat" rows="3" name="alamat"><?= (old('alamat')) ? old('alamat') : $dataGuru['alamat'] ?></textarea>
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
                        <button type="submit" class="btn btn-success" name="submit">Ubah data</button>
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