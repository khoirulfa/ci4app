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
                    <div class="col">
                        <h1 class="display-4">Selamat datang di website saya</h1>
                        <p class="lead">
                            Hai, nama saya <?= $nama; ?>.
                        </p>
                        <hr class="my-4">
                        <p>It uses utility classes for typography and spacing to space content out within the larger container.</p>
                        <a class="btn btn-primary btn-md" href="#" role="button">Learn more</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
</section>
<!-- /.content -->


<?= $this->endsection(); ?>