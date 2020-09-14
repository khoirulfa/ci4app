<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?= $title; ?></title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="/assets/plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="/assets/css/adminlte.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <style>
        * {
            font-family: Nunito;
        }
    </style>
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">

        <?php
        ###########################
        # ini untuk mengubah navbar    
        ###########################  
        echo  $this->include('layout/navbar');
        ?>

        <?php
        ###########################
        # ini untuk mengubah sidebar    
        ###########################  
        echo  $this->include('layout/sidebar');
        ?>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <?php
            ###########################################
            # ini untuk mengubah bagian isi dari konten    
            ###########################################  
            echo  $this->renderSection('content');
            ?>
        </div>
        <!-- /.content-wrapper -->

        <?php
        ###########################
        # ini untuk mengubah footer    
        ###########################  
        echo  $this->include('layout/footer');
        ?>

    </div>



    <!-- jQuery -->
    <script src="/assets/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="/assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="/assets/js/adminlte.min.js"></script>
    <!-- ChartJS -->
    <script src="/assets/plugins/chart.js/Chart.min.js"></script>
    <!-- popper -->
    <script src="/assets/js/popper.min.js"></script>
    <!-- my script -->
    <script src="/assets/js/script.js"></script>
</body>

</html>