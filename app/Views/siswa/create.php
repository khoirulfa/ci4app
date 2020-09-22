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
                            <form action="/siswa/savedata" method="POST" class="md-10" enctype="multipart/form-data">
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
                                        <label for="nisn">NISN</label>
                                        <input type="text" class="form-control <?= ($valid->hasError('nisn')) ? 'is-invalid' : ''; ?>" placeholder="NISN" name="nisn" value="<?= old('nisn'); ?>">
                                        <div id="validationServer03Feedback" class="invalid-feedback">
                                            <?= $valid->getError('nisn'); ?>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <label for="nis">NIS</label>
                                        <input type="text" class="form-control <?= ($valid->hasError('nis')) ? 'is-invalid' : ''; ?>" placeholder="NIS" name="nis" value="<?= old('nis'); ?>">
                                        <div id="validationServer03Feedback" class="invalid-feedback">
                                            <?= $valid->getError('nis'); ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row form-group">
                                    <div class="col">
                                        <label for="tempatlahir">Tempat lahir</label>
                                        <input type="text" class="form-control" placeholder="Tempat lahir" name="tem_lahir" value="<?= old('tem_lahir'); ?>">
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
                                    <textarea class="form-control" id="alamat" rows="3" name="alamat"><?= old('alamat'); ?></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="pic">Tambah foto siswa</label>
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