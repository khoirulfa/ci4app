<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>


<div class="card">
    <div class="card-body">
        <div class="card-title mb-4">
            <div class="d-flex justify-content-start">
                <div class="image-container">
                    <img src="http://placehold.it/150x150" id="imgProfile" style="width: 150px; height: 150px" class="img-thumbnail" />
                </div>
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
                        Facebook, Google, Twitter Account that are connected to this account
                    </div>
                </div>
            </div>
        </div>


    </div>

</div>
    

<?= $this->endSection(); ?>