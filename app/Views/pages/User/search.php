<?= $this->extend('template/User/main') ?>
<?= $this->section('content') ?>  
  
    <!-- Produk -->
<?php if($all_produk != null): ?>
  <div class="container" style="margin-top: 100px;">
    <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center" id="all_produk">
      <?php foreach($all_produk as $key): ?>
      <div class="col mb-5">
        <div class="card" id="card-produk">
          <img src="/assets/img/<?=$key['gambar'];?>" class="card-img-top" alt="..." height="210x">
          <div class="card-body text-center">
            <h6 class="card-title"><?=$key['nama'];?></h6>
            <div class="icon-bintang" style="color: orange;">
              <i class="fa-solid fa-star"></i>
              <i class="fa-solid fa-star"></i>
              <i class="fa-solid fa-star"></i>
              <i class="fa-solid fa-star"></i>
              <i class="fa-solid fa-star-half-stroke"></i>
            </div>
            <p class="card-text mt-2" id="view-harga"><?=$key['harga'];?></p>
            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
              <div class="text-center"><a class="btn btn-outline-primary mt-auto d-grid" href="/detail?id=<?=$key['id_produk'];?>">Beli</a></div>
            </div>
          </div>
        </div>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
<?php else : ?>
    <div class="container d-flex align-items-center justify-content-center" style="min-height: 90vh;">
        <img src="/assets/img2/images/no-results.png" alt="" width="100px">
        <h1 class="ms-3">No Result Found</h1>
    </div>
<?php endif; ?>


<?= $this->endSection() ?>