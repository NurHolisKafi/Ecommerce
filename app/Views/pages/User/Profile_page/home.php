<?= $this->extend('template/User/main') ?>
<?= $this->section('content') ?> 

<div class="container bg-white p-5" style="height: 100vh;">
    <?php if($session->getFlashdata('success')): ?>
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <?= $session->getFlashdata('success'); ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>
    <div class="d-flex align-items-center">
        <img src="/assets/img2/profile/<?= $user['gambar']; ?>" class="img-thumbnail rounded-circle" alt="" width="100px">
        <div class="ms-3">
            <p class="my-1" style="font-size: x-large; font-weight: bold;">Nur Holis Kafi</p>
            <p>081912775</p>
        </div>
    </div>
    <div class="mt-5" id="menu">
      <div class="list-menu">
        <a href="/editprofile" class="text-decoration-none d-flex align-items-center">
            <img src="/assets/img2/images/resume.png" alt="" width="30px">
            <p class="text-black">My Profile</p>    
        </a>               
    </div>
    <div class="garis-nama"></div>
        <div class="list-menu">
            <a href="/myorder" class="text-decoration-none d-flex align-items-center">
                <img src="/assets/img2/images/order.png" alt="" width="30px">
                <p class="text-black">Pesanan anda</p>    
            </a>               
        </div>
        <div class="garis-nama"></div>  
    </div>
</div>

<?= $this->endSection() ?>