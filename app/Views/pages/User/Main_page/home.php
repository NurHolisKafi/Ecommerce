<?= $this->extend('template/User/main') ?>
<?= $this->section('content') ?>  
  
<div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"
        aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"
        aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"
        aria-label="Slide 3"></button>
    </div>
    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
      <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"
          aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
          aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
          aria-label="Slide 3"></button>
      </div>
      <div class="carousel-inner">
        <div class="carousel-item active" style="background: black;">
          <div class="overlay-image" style="background-image: url(/assets/img2/Arbeuty/9.jpg);"></div>
        </div>
        <div class="carousel-item" style="background: black;">
          <div class="overlay-image" style="background-image: url(/assets/img2/Arbeuty/13.jpg);"></div>
        </div>
        <div class="carousel-item" style="background: black;">
          <div class="overlay-image" style="background-image: url(/assets/img2/Arbeuty/12.jpg);"></div>
        </div>
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
        data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
        data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>
</div>

  <!-- Services -->
  <section class="pt-5 pb-5">
    <div class="container">
      <div class="row">
        <div class="col-md-4">
          <div class="media  bg-white p-3 mb-2" style="border-radius: 50px;">
            <div class="text-info text-center" style="font-size: 80px;">
              <i class="fa fa-truck"></i>
            </div>
            <div class="media-body">
              <h5>Fast Shipping</h5>
              <p class="text-muted">
                All you have to do is to bring your passion. We take care of the rest.
              </p>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="media bg-white p-3 mb-2" style="border-radius: 50px;">
            <div class="text-purple text-center" style="font-size: 80px;">
              <i class="fa fa-credit-card-alt"></i>
            </div>
            <div class="media-body">
              <h5>Online Payment</h5>
              <p class="text-muted">
                All you have to do is to bring your passion. We take care of the rest.
              </p>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="media bg-white p-3 mb-2" style="border-radius: 50px;">
            <div class="text-warning text-center" style="font-size: 80px;">
              <i class="fa fa-refresh"></i>
            </div>
            <div class="media-body">
              <h5>Free Return</h5>
              <p class="text-muted">
                All you have to do is to bring your passion. We take care of the rest.
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- End Services -->

  <section class="mt-5" id="featured-product">
    <div class="container">
      <div class="row">
        <div class="col text-center">
          <h2 class="section-title featured-title">FEATURED PRODUCT</h2>
        </div>
      </div>
      <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
        <div class="col mb-5">
          <div class="card" id="card-produk">
            <img src="/assets/img2/Arbeuty/1.jpg" class="card-img-top" alt="..." height="210x">
            <div class="card-body text-center">
              <h6 class="card-title">Headset</h6>
              <div class="icon-bintang" style="color: orange;">
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star-half-stroke"></i>
              </div>
              <p class="card-text mt-2">Rp. 367.000</p>
              <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                <div class="text-center"><a class="btn btn-outline-primary mt-auto d-grid" href="#">Beli</a></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="mt-5" style="background-color: tan;" id="limited">
    <div class="container">
      <div class="row justify-content-between align-items-center">
        <div class="col-md-6">
          <img src="/assets/img2/Arbeuty/7.1.png" alt="" class="w-100">
        </div>
        <div class="col-md-5 text-md-start text-center">
          <p style="font-weight: 500;">Exclusive available in ARBeauty Store</p>
          <h1>MSSLIM</h1>
          <small>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ratione eius repellat qui amet nesciunt, quae
            expedita cumque nostrum sed, nihil cum. Dolorem deserunt praesentium rem dicta? A unde tempore officia
            natus. Laudantium, dolores repellendus. Eum, porro, quidem ipsum ex rem assumenda impedit officiis
            consequuntur cum nemo accusamus asperiores et delectus.</small>
        </div>
      </div>
    </div>
  </section>

    <!-- Produk -->
  <div class="container" style="margin-top: 100px;">
    <div class="row title mb-3">
      <div class="col-8">
        <h4 class="section-title">all product</h4>
        <div class="garis-biru"></div>
      </div>
      <div class="col-3">
        <div class="form-group d-flex align-items-center">
          <h6 class="me-3 mt-2">Kategori</h6>
          <select class="form-control select2" style="width: 100%;">
            <option selected="selected">Alabama</option>
            <option>Alaska</option>
            <option>California</option>
            <option>Delaware</option>
            <option>Tennessee</option>
            <option>Texas</option>
            <option>Washington</option>
          </select>
        </div>
      </div>
    </div>
    <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
      <div class="col mb-5">
        <div class="card" id="card-produk">
          <img src="/assets/img2/Arbeuty/1.jpg" class="card-img-top" alt="..." height="210x">
          <div class="card-body text-center">
            <h6 class="card-title">Headset</h6>
            <div class="icon-bintang" style="color: orange;">
              <i class="fa-solid fa-star"></i>
              <i class="fa-solid fa-star"></i>
              <i class="fa-solid fa-star"></i>
              <i class="fa-solid fa-star"></i>
              <i class="fa-solid fa-star-half-stroke"></i>
            </div>
            <p class="card-text mt-2">Rp. 367.000</p>
            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
              <div class="text-center"><a class="btn btn-outline-primary mt-auto d-grid" href="#">Beli</a></div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
<?= $this->endSection() ?>