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
      <div class="container-fluid mt-2">
        <div class="row">
          <!-- button tambah data -->
          <div class="col-6">
            <button type="button" class="btn btn-primary btn-sm mr-1" data-toggle="modal" data-target="#create-data">
              <i class="fa fa-plus mr-2"></i>
              <p class="d-inline">Tambah data</p>
            </button>
            <!-- refresh table -->
            <button type="button" class="btn btn-success btn-sm">
              <i class="fa fa-sync mr-2"></i>
              <a href="/guru" class="d-inline" style="color: #fff; text-decoration: none;">Refresh table</a>
            </button>
          </div>
          <!-- !end button tambah data -->

          <!-- search bar  -->
          <div class="col-6">
            <form class="form-inline ml-3 float-right" method="POST">
              <div class="input-group input-group-sm">
                <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search" name="keyword">
                <div class="input-group-append">
                  <button class="btn btn-navbar" type="submit" name="submit">
                    <i class="fas fa-search"></i>
                  </button>
                </div>
              </div>
            </form>
          </div>
          <!-- !end searchbar -->
        </div>
      </div>

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
              <?php $num = 1 + (6 * ($currentPage - 1)); ?>
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

          <!-- pagination -->
          <div class="container-fluid mt-2">
            <div class="row">
              <div class="col">
                <?= $pager->links('guru', 'guruPagination'); ?>
              </div>
            </div>
          </div>          
          <!-- !pagination end -->

        </div>
      </div>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->

  <!-- modal -->
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
                  <input type="date" class="form-control" placeholder="Tanggal lahir" id="tanggallahir" name="tan_lahir" autocomplete="off" value="<?= old('tan_lahir'); ?>">
                </div>
              </div>
            </div>
            <div class="form-group">
              <label for="tmt">Tanggal mulai tugas</label>
              <div class="input-group flex-nowrap">
                <input type="date" class="form-control" placeholder="Tanggal mulai tugas" id="tmt" name="tmt" autocomplete="off" value="<?= old('tmt'); ?>">
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

</section>
<!-- /.content -->


<?= $this->endSection(); ?>