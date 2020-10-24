<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>

<div class="card">

    <div class="card-body">
        <div class="card-title mb-2">
            <div class="d-flex justify-content-start">
                <div class="image-container">
                    <img src="/img/<?= $siswa['pic']; ?>" id="imgProfile" style="width: 150px; height: 150px" class="img-thumbnail" />
                    <div class="middle mt-4">
                        <input type="file" style="display: none;" id="profilePicture" name="file" />
                    </div>
                </div>
                <div class="ml-auto">
                    <input type="button" class="btn btn-primary btn-lg d-none" id="btnDiscard" value="Discard Changes" />
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="tab-content ml-4" id="myTabContent">
                    <div class="tab-pane fade show active" id="basicInfo" role="tabpanel" aria-labelledby="basicInfo-tab">
                        <div class="float-right">
                            <button type="button" class="btn btn-warning btn-sm mr-1" data-toggle="modal" data-target="#create-data">
                                <p class="d-inline">Ubah</p>
                            </button>
                            <a href="/siswa" class="btn btn-primary btn-sm">Kembali ke daftar siswa</a>
                        </div>
                        <h2><?= $title; ?></h2>
                        <div class="row mt-3">
                            <div class="col-sm-3 col-md col-5">
                                <label style="font-weight:bold;">Nama Lengkap</label>
                            </div>
                            <div class="col-md-8 col-6">
                                <?= $siswa['nama']; ?>
                            </div>
                        </div>
                        <hr />

                        <div class="row">
                            <div class="col-sm-3 col-md col-5">
                                <label style="font-weight:bold;">NISN</label>
                            </div>
                            <div class="col-md-8 col-6">
                                <?= $siswa['nisn']; ?>
                            </div>
                        </div>
                        <hr />

                        <div class="row">
                            <div class="col-sm-3 col-md col-5">
                                <label style="font-weight:bold;">NIS</label>
                            </div>
                            <div class="col-md-8 col-6">
                                <?= $siswa['nis']; ?>
                            </div>
                        </div>
                        <hr />

                        <div class="row">
                            <div class="col-sm-3 col-md col-5">
                                <label style="font-weight:bold;">Tempat, tanggal lahir</label>
                            </div>
                            <div class="col-md-8 col-6">
                                <?= "{$siswa['tem_lahir']}, {$siswa['tan_lahir']}"; ?>
                            </div>
                        </div>
                        <hr />

                        <div class="row">
                            <div class="col-sm-3 col-md col-5">
                                <label style="font-weight:bold;">Kelas / Jurusan</label>
                            </div>
                            <div class="col-md-8 col-6">
                                <?= "{$siswa['kelas']} / {$siswa['jurusan']}"; ?>
                            </div>
                        </div>
                        <hr />

                        <div class="row">
                            <div class="col-sm-3 col-md col-5">
                                <label style="font-weight:bold;">Jenis Kelamin</label>
                            </div>
                            <div class="col-md-8 col-6">
                                <?= $siswa['j_kelamin']; ?>
                            </div>
                        </div>

                        <hr />
                        <div class="row">
                            <div class="col-sm-3 col-md col-5">
                                <label style="font-weight:bold;">Alamat</label>
                            </div>
                            <div class="col-md-8 col-6">
                                <?= $siswa['alamat']; ?>
                            </div>
                        </div>
                        <hr />

                    </div>
                </div>
            </div>
        </div>


    </div>
    <!-- Modal -->
    <div class="modal fade" id="create-data" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ubah data siswa</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="/siswa/update/<?= $siswa['id']; ?>" method="POST" class="md-10" enctype="multipart/form-data">
                        <?= csrf_field(); ?>
                        <input type="hidden" name="fotoLama" value="<?= $siswa['pic']; ?>">
                        <input type="hidden" name="id" value="<?= $siswa['id']; ?>">
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="text" class="form-control <?= ($valid->hasError('nama')) ? 'is-invalid' : ''; ?>" id="nama" placeholder="Nama" name="nama" autofocus autocomplete="off" value="<?= (old('nama')) ? old('nama') : $siswa['nama'] ?>">
                            <div id="validationServer03Feedback" class="invalid-feedback">
                                <?= $valid->getError('nama'); ?>
                            </div>
                        </div>
                        <div class="form-row form-group">
                            <div class="col">
                                <label for="nisn">NISN</label>
                                <input type="text" class="form-control <?= ($valid->hasError('nisn')) ? 'is-invalid' : ''; ?>" placeholder="NISN" name="nisn" value="<?= (old('nisn')) ? old('nisn') : $siswa['nisn'] ?>">
                                <div id="validationServer03Feedback" class="invalid-feedback">
                                    <?= $valid->getError('nisn'); ?>
                                </div>
                            </div>
                            <div class="col">
                                <label for="nis">NIS</label>
                                <input type="text" class="form-control <?= ($valid->hasError('nis')) ? 'is-invalid' : ''; ?>" placeholder="NIS" name="nis" value="<?= (old('nis')) ? old('nis') : $siswa['nis'] ?>">
                                <div id="validationServer03Feedback" class="invalid-feedback">
                                    <?= $valid->getError('nis'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-row form-group">
                            <div class="col">
                                <label for="tempatlahir">Tempat lahir</label>
                                <input type="text" class="form-control" placeholder="Tempat lahir" name="tem_lahir" value="<?= (old('tem_lahir')) ? old('tem_lahir') : $siswa['tem_lahir'] ?>">
                            </div>
                            <div class="col">
                                <label for="tanggallahir">Tanggal lahir</label>
                                <div class="input-group flex-nowrap">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="addon-wrapping">
                                            <i class="fas fa-calendar"></i>
                                        </span>
                                    </div>
                                    <input type="text" class="form-control datepicker" placeholder="Tanggal lahir" id="tanggallahir" name="tan_lahir" autocomplete="off" value="<?= (old('tan_lahir')) ? old('tan_lahir') : $siswa['tan_lahir'] ?>">
                                </div>
                            </div>
                        </div>
                        <div class="form-row form-group">
                            <div class="col">
                                <label for="kelas">Kelas</label>
                                <select id="kelas" class="form-control" name="kelas">
                                    <option value="X" <?= ($siswa['kelas'] == 'X') ? 'selected' : ''; ?>>X</option>
                                    <option value="XI" <?= ($siswa['kelas'] == 'XI') ? 'selected' : ''; ?>>XI</option>
                                    <option value="XII" <?= ($siswa['kelas'] == 'XII') ? 'selected' : ''; ?>>XII</option>
                                </select>
                            </div>
                            <div class="col">
                                <label for="jurusan">Jurusan</label>
                                <select id="jurusan" class="form-control" name="jurusan">
                                    <option value="IPA" <?= ($siswa['jurusan'] == 'IPA') ? 'selected' : ''; ?>>IPA</option>
                                    <option value="IPS" <?= ($siswa['jurusan'] == 'IPS') ? 'selected' : ''; ?>>IPS</option>
                                    <option value="BAHASA" <?= ($siswa['jurusan'] == 'BAHASA') ? 'selected' : ''; ?>>BAHASA</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="jeniskelamin">Jenis Kelamin</label>
                            <select id="jeniskelamin" class="form-control" name="j_kelamin">
                                <option value="Laki - laki" <?= ($siswa['j_kelamin'] == 'Laki - laki') ? 'selected' : ''; ?>>Laki - laki</option>
                                <option value="Perempuan" <?= ($siswa['j_kelamin'] == 'premepuan') ? 'selected' : ''; ?>>Perempuan</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <textarea class="form-control" id="alamat" rows="3" name="alamat"><?= (old('alamat')) ? old('alamat') : $siswa['alamat'] ?></textarea>
                        </div>
                        <div class="form-group">
                            <label for="pic">Tambah foto siswa</label>
                            <input type="file" class="form-control-file" id="pic" name="pic">
                        </div>
                        <div class="form-group col d-inline-block ">
                            <img src="/img/<?= $siswa['pic']; ?>" class="img-thumbnail img-preview">
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success" name="submit">Ubah</button>
                </div>
                </form>
            </div>
        </div>
    </div>

</div>

<?= $this->endSection(); ?>