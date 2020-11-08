<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>

<section class="content-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
                <h1>
                    <?= $header; ?>
                </h1>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
</section>

<div class="card">
    <div class="card-body">
        <div class="card-title mb-4">
            <div class="d-flex justify-content-start">
                <!-- profile pic -->
                <div class="image-container">
                    <img src="/assets/img/profile.jpg" id="imgProfile" style="width: 150px; height: 150px" class="img-thumbnail" />
                </div>
                <!-- user data -->
                <div class="userData ml-3 mr-4">
                    <h2 class="d-block mb-3" style="font-size: 1.5rem; font-weight: bold">Khoirul</h2>
                    <h6 class="d-block">Student at MA Islamiyah Senori</h6>
                    <h6 class="d-block">Junior Web Developer</h6>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <ul class="nav nav-tabs mb-4" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="basicInfo-tab" data-toggle="tab" href="#basicInfo" role="tab" aria-controls="basicInfo" aria-selected="true">Basic Info</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="connectedServices-tab" data-toggle="tab" href="#connectedServices" role="tab" aria-controls="connectedServices" aria-selected="false">Connected Services</a>
                    </li>
                </ul>
                <div class="tab-content ml-1" id="myTabContent">
                    <div class="tab-pane fade show active" id="basicInfo" role="tabpanel" aria-labelledby="basicInfo-tab">
                        <div class="row">
                            <div class="col-sm-3 col-md-3 col-5">
                                <label style="font-weight:bold;">Full Name</label>
                            </div>
                            <div class="col-md-8 col-6">
                                Ahmad Musafir Khoirul Fattah
                            </div>
                        </div>
                        <hr />

                        <div class="row">
                            <div class="col-sm-3 col-md-3 col">
                                <label style="font-weight:bold;">National Student ID</label>
                            </div>
                            <div class="col-md-8 col-6">
                                0035494776
                            </div>
                        </div>
                        <hr />

                        <div class="row">
                            <div class="col-sm-3 col-md-3 col-5">
                                <label style="font-weight:bold;">Local Student ID</label>
                            </div>
                            <div class="col-md-8 col-6">
                                131235230022180004
                            </div>
                        </div>
                        <hr />

                        <div class="row">
                            <div class="col-sm-3 col-md-3 col-5">
                                <label style="font-weight:bold;">Birth Date</label>
                            </div>
                            <div class="col-md-8 col-6">
                                January 10, 2003
                            </div>
                        </div>
                        <hr />


                        <div class="row">
                            <div class="col-sm-3 col-md-3 col-5">
                                <label style="font-weight:bold;">Place of Birth</label>
                            </div>
                            <div class="col-md-8 col-6">
                                Sidoarjo
                            </div>
                        </div>
                        <hr />

                        <div class="row">
                            <div class="col-sm-3 col-md-3 col-5">
                                <label style="font-weight:bold;">Sex</label>
                            </div>
                            <div class="col-md-8 col-6">
                                Man
                            </div>
                        </div>
                        <hr />

                        <div class="row">
                            <div class="col-sm-3 col-md-3 col-5">
                                <label style="font-weight:bold;">Phone</label>
                            </div>
                            <div class="col-md-8 col-6">
                                <?= $phone; ?>
                            </div>
                        </div>
                        <hr />

                    </div>
                    <div class="tab-pane fade" id="connectedServices" role="tabpanel" aria-labelledby="ConnectedServices-tab">
                        <ul class="list-group mt-1 mb-4">
                            <li class="list-group-item align-middle">
                                See my profile on <br>
                                <a href="<?= $facebook; ?>" target="blank">
                                    <i class="fab fa-fw fa-facebook fa-lg"></i> Facebook
                                </a>
                            </li>
                            <li class="list-group-item align-middle">
                                Contact me at <br>
                                <a href="<?= $whatsapp; ?>" target="blank">
                                    <i class="fab fa-fw fa-whatsapp fa-lg"></i> WhatsApp
                                </a>
                            </li>
                            <li class="list-group-item align-middle">
                                See my project and repository on <br>
                                <a href="<?= $github; ?>" target="blank">
                                    <i class="fab fa-fw fa-github fa-lg"></i> Github
                                </a>
                            </li>
                            <li class="list-group-item align-middle">
                                Follow me on <br>
                                <a href="<?= $instagram; ?>" target="blank">
                                    <i class="fab fa-fw fa-instagram fa-lg"></i> Instagram
                                </a>
                            </li>
                            <li class="list-group-item align-middle">
                                Call me <br>
                                <i class="fas fa-fw fa-phone"></i> <?= $phone; ?>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>


    </div>

</div>


<?= $this->endSection(); ?>