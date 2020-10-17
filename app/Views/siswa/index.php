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
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item active">
                        <?= $breadcrumb; ?>
                    </li>
                </ol>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
    <!-- Default box -->
    <div class="card">
        <div id="toastsContainerTopRight" class="toasts-top-right fixed">
            <?php if (session()->getFlashdata('pesan')) : ?>
                <div class="toast bg-success fade show mt-2 mr-2" role="alert" aria-live="assertive" aria-atomic="true">
                    <div class="toast-header">
                        <strong class="mr-auto">Tabel data siswa</strong>
                        <button data-dismiss="toast" type="button" class="ml-2 mb-1 close" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="toast-body">
                        <?= session()->getFlashdata('pesan'); ?>
                    </div>
                </div>
            <?php endif; ?>
        </div>
        <div class="col-xs-10 offset-xs-1 mt-1">
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary btn-sm mt-1 ml-2" data-toggle="modal" data-target="#create-data">
                <i class="fa fa-plus mr-2"></i>
                <p class="d-inline">Tambah data</p>
            </button>
            <div class="col">
                <div class="row card-body mt-3 p-0">
                    <table class="table">
                        <thead style="text-align: center;">
                            <th scope="col">No.</th>
                            <th scope="col">NISN</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Kelas</th>
                            <th scope="col">Jurusan</th>
                            <th scope="col">Jenis Kelamin</th>
                            <th scope="col">Aksi</th>
                        </thead>
                        <tbody>
                            <?php $num = 1; ?>
                            <?php foreach ($siswa as $sis) : ?>
                                <tr>
                                    <th scope="col" style="text-align: center;"><?= $num; ?></th>
                                    <td scope="col" style="text-align: center;"><?= $sis['nisn']; ?></td>
                                    <td scope="col"><?= $sis['nama']; ?></td>
                                    <td scope="col" style="text-align: center;"><?= $sis['kelas'] ?></td>
                                    <td scope="col" style="text-align: center;"><?= $sis['jurusan']; ?></td>
                                    <td scope="col" style="text-align: center;">
                                        <?= $sis['j_kelamin'] == "Laki - laki" ? 'L' : 'P' ?>
                                    </td>
                                    <td scope="col" style="text-align: center;">
                                        <a href="/siswa/<?= $sis['id']; ?>" class="btn btn-success btn-sm">Detail</a>
                                        <form action="/siswa/<?= $sis['id']; ?>" method="POST" class="d-inline">
                                            <?= csrf_field(); ?>
                                            <input type="hidden" name="_method" value="DELETE">
                                            <button type="submit" class="btn btn-danger btn-sm mr-1" onclick="return confirm('Apakah yakin anda ingin menghapusnya?');">
                                                <i class="fa fa-trash-alt"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                <?php $num++; ?>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
    <!-- Modal -->
    <div class="modal fade" id="create-data" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah data siswa</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
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
                                    <input type="date" class="form-control" placeholder="Tanggal lahir" id="tanggallahir" name="tan_lahir" autocomplete="off" value="<?= old('tan_lahir'); ?>">
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
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success" name="submit">Submit</button>
                </div>
                </form>
            </div>
        </div>
    </div>
</section>
<!-- /.content -->


<?= $this->endSection(); ?>