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
            <strong class="mr-auto">Tabel data guru</strong>
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
      <a href="/guru/create" class="btn btn-primary btn-sm mt-1 ml-2">
        <i class="fa fa-plus mr-2"></i>
        <p class="d-inline">Tambah data</p>
      </a>
      <div class="col-sm-12">
        <div class="row card-body mt-3 p-0">
          <table class="table">
            <thead style="text-align: center;">
              <th scope="col">No.</th>
              <th scope="col">Nama</th>
              <th scope="col">Jabatan</th>
              <th scope="col">Mapel</th>
              <th scope="col">Pendidikan</th>
              <th scope="col">Jenis Kelamin</th>
              <th scope="col">Aksi</th>
            </thead>
            <tbody>
              <?php $num = 1; ?>
              <?php foreach ($teachers as $teacher) : ?>
                <tr>
                  <th scope="col" style="text-align: center;"><?= $num; ?></th>
                  <td scope="col"><?= $teacher['nama']; ?></td>
                  <td scope="col" style="text-align: center;">
                    <?php
                    if ($teacher['jabatan'] == 'kepsek')
                      echo "Kepala Sekolah";
                    elseif ($teacher['jabatan'] == 'waka_pend')
                      echo "Waka Pendidikan";
                    elseif ($teacher['jabatan'] == 'waka_sis')
                      echo "Waka Kesiswaan";
                    elseif ($teacher['jabatan'] == 'waka_hum')
                      echo "Waka Humas";
                    elseif ($teacher['jabatan'] == 'guru')
                      echo "Guru";
                    else
                      echo "TU";
                    ?>
                  </td>
                  <td scope="col" style="text-align: center;">
                    <?= $teacher['mapel']; ?>
                  </td>
                  <td scope="col" style="text-align: center;">
                    <?php
                    if ($teacher['pendidikan'] == 'perguruan_tinggi') {
                      echo 'Perguruan Tinggi';
                    } elseif ($teacher['pendidikan'] == 'sma_sederajat') {
                      echo 'SMA Sederajat';
                    } else {
                      echo 'Pondok Pesantren';
                    }
                    ?>
                  </td>
                  <td scope="col" style="text-align: center;">
                    <?= $teacher['j_kelamin'] == "laki - laki" ? 'L' : 'P' ?>
                  </td>
                  <td scope="col" style="text-align: center;">
                    <a href="/guru/detail/<?= $teacher['id']; ?>" class="btn btn-success btn-sm">Detail</a>
                    <form action="/guru/<?= $teacher['id']; ?>" method="POST" class="d-inline">
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