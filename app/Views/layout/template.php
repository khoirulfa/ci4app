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
    <!-- Bootstrap 4.5 -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <!-- jquery-ui -->
    <link rel="stylesheet" href="/assets/plugins/jquery-ui/jquery-ui.min.css">
    <!-- datatable -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.css">
    <!-- Google Font: Roboto -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <style>
        * {
            font-family: 'Roboto', sans-serif;
        }
    </style>
</head>

<body class="hold-transition sidebar-mini sidebar-collapse">
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

        
        <!-- ChartJS -->
        <script src="/assets/plugins/chart.js/Chart.min.js"></script>
        <!-- jQuery -->
        <script src="/assets/plugins/jquery/jquery.min.js"></script>
        <!-- datatable -->
        <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.js"></script>


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




    <!-- jQuery ui -->
    <script src="/assets/plugins/jquery-ui/jquery-ui.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <!-- AdminLTE App -->
    <script src="/assets/js/adminlte.min.js"></script>
    <!-- popper -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <!-- my script -->
    <script src="/assets/js/script.js"></script>
</body>

</html>