<?php

use App\Controllers\Siswa;
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
                            <form action="/siswa/update/<?= $dataSiswa['nisn']; ?>" method="POST" class="md-10">
                                <?= csrf_field(); ?>
                                <div class="form-group">
                                    <label for="nama">Nama</label>
                                    <input type="text" class="form-control <?= ($valid->hasError('nama')) ? 'is-invalid' : ''; ?>" id="nama" placeholder="Nama" name="nama" autofocus autocomplete="off" value="<?= (old('nama')) ? old('nama') : $dataSiswa['nama'] ?>">
                                    <div id="validationServer03Feedback" class="invalid-feedback">
                                        <?= $valid->getError('nama'); ?>
                                    </div>
                                </div>
                                <div class="form-row form-group">
                                    <div class="col">
                                        <label for="nisn">NISN</label>
                                        <input type="text" class="form-control <?= ($valid->hasError('nisn')) ? 'is-invalid' : ''; ?>" placeholder="NISN" name="nisn" value="<?= (old('nisn')) ? old('nisn') : $dataSiswa['nisn'] ?>">
                                        <div id="validationServer03Feedback" class="invalid-feedback">
                                            <?= $valid->getError('nisn'); ?>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <label for="nis">NIS</label>
                                        <input type="text" class="form-control <?= ($valid->hasError('nis')) ? 'is-invalid' : ''; ?>" placeholder="NIS" name="nis" value="<?= (old('nis')) ? old('nis') : $dataSiswa['nis'] ?>">
                                        <div id="validationServer03Feedback" class="invalid-feedback">
                                            <?= $valid->getError('nis'); ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row form-group">
                                    <div class="col">
                                        <label for="tempatlahir">Tempat lahir</label>
                                        <input type="text" class="form-control" placeholder="Tempat lahir" name="tem_lahir" value="<?= (old('tem_lahir')) ? old('tem_lahir') : $dataSiswa['tem_lahir'] ?>">
                                    </div>
                                    <div class="col">
                                        <label for="tanggallahir">Tanggal lahir</label>
                                        <input type="date" class="form-control" placeholder="Tanggal lahir" name="tan_lahir" value="<?= (old('tan_lahir')) ? old('tan_lahir') : $dataSiswa['tan_lahir'] ?>">
                                    </div>
                                </div>
                                <div class="form-row form-group">
                                    <div class="col">
                                        <label for="kelas">Kelas</label>
                                        <select id="kelas" class="form-control" name="kelas">
                                            <option value="X">X</option>
                                            <option value="XI">XI</option>
                                            <option value="XII">XII</option>
                                        </select>
                                    </div>
                                    <div class="col">
                                        <label for="jurusan">Jurusan</label>
                                        <select id="jurusan" class="form-control" name="jurusan">
                                            <option value="IPA">IPA</option>
                                            <option value="IPS">IPS</option>
                                            <option value="BAHASA">BAHASA</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="jeniskelamin">Jenis Kelamin</label>
                                    <select id="jeniskelamin" class="form-control" name="j_kelamin">
                                        <option value="Laki - laki">Laki - laki</option>
                                        <option value="Perempuan">Perempuan</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="alamat">Alamat</label>
                                    <textarea class="form-control" id="alamat" rows="3" name="alamat"><?= (old('alamat')) ? old('alamat') : $dataSiswa['alamat'] ?></textarea>
                                </div>
                                <button type="submit" class="btn btn-success" name="submit">Ubah</button>
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