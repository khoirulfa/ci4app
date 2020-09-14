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
        <div class="container mt-1">
            <a href="/siswa/create" class="btn btn-primary btn-sm mt-1">
                <i class="fa fa-plus mr-2"></i>
                <p class="d-inline">Tambah data</p>
            </a>
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
                                        <a href="/siswa/<?= $sis['nisn']; ?>" class="btn btn-success btn-sm">Detail</a>
                                        <form action="/siswa/<?= $sis['nisn']; ?>" method="POST" class="d-inline">
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
</section>
<!-- /.content -->


<?= $this->endSection(); ?>