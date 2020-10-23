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
   <div class="container-fluid">
      <div class="row">
         <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
               <div class="inner">
                  <h3>150</h3>
                  <p>Siswa Baru</p>
               </div>
               <div class="icon">
                  <i class="fas fa-user-plus"></i>
               </div>
            </div>
         </div>
         <!-- ./col -->
         <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
               <div class="inner">
                  <h3>256</h3>
                  <p>Siswa Lulus</p>
               </div>
               <div class="icon">
                  <i class="fas fa-sign-out-alt"></i>
               </div>
            </div>
         </div>
         <!-- ./col -->
         <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
               <div class="inner">
                  <h3>56</h3>
                  <p>Siswa Pindahan</p>
               </div>
               <div class="icon">
                  <i class="fas fa-exchange-alt"></i>
               </div>
            </div>
         </div>
         <!-- ./col -->
         <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
               <div class="inner">
                  <h3>13</h3>
                  <p>Siswa DO</p>
               </div>
               <div class="icon">
                  <i class="fas fa-ban"></i>
               </div>
            </div>
         </div>
         <!-- ./col -->
      </div>

      <!-- all -->
      <div class="row">
         <div class="col-md-6">
            <div class="card card-info">
               <div class="card-header">
                  <span>Data jumlah siswa selama 10 tahun</span>
                  <div class="card-tools">
                     <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                     </button>
                  </div>
               </div>
               <div class="card-body">
                  <div class="chart">
                     <canvas id="10-years-student" style="max-width: 100%; display: block; width: 401px;" width="400" height="250" class="chartjs-render-monitor"></canvas>
                  </div>
               </div>
               <!-- /.card-body -->
            </div>
         </div>
         <!-- gender -->
         <div class="col-md-6">
            <div class="card card-primary">
               <div class="card-header">
                  <span>Data siswa 10 tahun terakhir berdasarkan jenis kelamin</span>
                  <div class="card-tools">
                     <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                     </button>
                  </div>
               </div>
               <div class="card-body">
                  <div class="chart">
                     <canvas id="10-years-student-gender" style="max-width: 100%; display: block; width: 401px;" height="250" class="chartjs-render-monitor"></canvas>
                  </div>
               </div>
               <!-- /.card-body -->
            </div>
         </div>
      </div>

      <div class="row">
         <!-- major -->
         <div class="col-md-5">
            <div class="card card-success">
               <div class="card-header">
                  <span>Data siswa berdasarkan jurusan</span>
                  <div class="card-tools">
                     <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                     </button>
                  </div>
               </div>
               <div class="card-body">
                  <div class="chart">
                     <canvas id="major" style="max-width: 100%; display: block; width: 401px;" width="401" height="250" class="chartjs-render-monitor"></canvas>
                  </div>
               </div>
               <!-- /.card-body -->
            </div>
         </div>

         <!-- ekskul -->
         <div class="col-md-7">
            <div class="card card-info">
               <div class="card-header">
                  <span>Ekstrakurikuler</span>
                  <div class="card-tools">
                     <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                     </button>
                  </div>
               </div>
               <div class="card-body">
                  <div class="chart">
                     <canvas id="ekskul" style="max-width: 100%; display: block; width: 401px;" width="401" height="250" class="chartjs-render-monitor"></canvas>
                  </div>
               </div>
               <!-- /.card-body -->
            </div>
         </div>
      </div>

      <!-- Default box -->
      <div class="card">
         <div class="card-body">
            <div class="container-fluid">
               Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quidem reiciendis eius quas fuga non modi, veniam molestiae, aut mollitia nam sapiente officiis ipsum, magni voluptatibus illum odit vero omnis? Sapiente?
            </div>
         </div>
         <!-- /.card-body -->
      </div>
      <!-- /.card -->
   </div>
</section>
<!-- /.content -->
<script src="/assets/js/chart.js"></script>


<?= $this->endsection(); ?>