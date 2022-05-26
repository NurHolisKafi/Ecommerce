<?= $this->extend('template/Admin/main') ?>
<?= $this->section('content') ?>

    <div class="container p-3">
        <h1>Dashboard</h1>
        <div class="row mt-5">
            <div class="col-xl-3 col-md-6">
                <div class="card bg-primary shadow py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-white text-uppercase mb-1">
                                    Akun
                                </div>
                                <div class="h5 mb-0 font-weight-bold text-white">Total : 20 </div>
                            </div>
                            <div class="col-auto">
                                <i class="fa-solid fa-user fa-2xl"></i>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="#">View Details</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card bg-warning shadow py-2" >
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-white text-uppercase mb-1">
                                    Pesanan
                                </div>
                                <div class="h5 mb-0 font-weight-bold text-white">Total : 20 </div>
                            </div>
                            <div class="col-auto">
                                <i class="fa-solid fa-clipboard-list fa-2xl"></i>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="#">View Details</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card bg-success shadow py-2" >
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-white text-uppercase mb-1">
                                    produk
                                </div>
                                <div class="h5 mb-0 font-weight-bold text-white">Total : 20 </div>
                            </div>
                            <div class="col-auto">
                                <i class="fa-solid fa-box-open fa-2xl"></i>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="#">View Details</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card bg-danger shadow py-2" >
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-white text-uppercase mb-1">
                                    history
                                </div>
                                <div class="h5 mb-0 font-weight-bold text-white">Total : 20 </div>
                            </div>
                            <div class="col-auto">
                                <i class="fa-solid fa-clock-rotate-left fa-2xl"></i>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="#">View Details</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?= $this->endSection() ?>
