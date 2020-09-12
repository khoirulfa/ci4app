<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>

<div class="card">

    <div class="card-body">
        <div class="card-title mb-4">
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
                            <a href="/siswa/ubah/<?= $siswa['nisn']; ?>" class="btn btn-warning btn-sm mr-1">Ubah</a>
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

</div>

<?= $this->endSection(); ?>