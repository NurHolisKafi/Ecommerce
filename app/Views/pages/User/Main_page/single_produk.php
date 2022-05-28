<?= $this->extend('template/User/main') ?>
<?= $this->section('content') ?> 

<!-- Singleproduk -->
  <div class="container bg-white mt-5">
        <div class="row justify-content-center single-produk">
            <div class="col-lg-5 ">
                <figure class="figure">
                    <img src="/assets/img2/Arbeuty/9.jpg" class="figure-img img-fluid" alt="..." width="410px">
                    <figcaption class="figure-caption justify-content-evenly d-flex">
                        <a href=""><img src="/assets/img2/Arbeuty/9.jpg" class="figure-img img-fluid" alt="..." width="70px"></a>
                    </figcaption>
                  </figure>
            </div>
            <div class="col-lg-7">
                <h4>Kemeja Hitam</h4>
                <div class="garis-nama"></div>
                <p style="font-size: x-large;">Rp. 30.000</p>
                <div id="jumlah" class="mt-3">
                    <button type="button" class="btn btn-danger btn-sm shadow-none"><i class="fa-solid fa-minus"></i></button>
                    <span class="mx-2" style="font-size: larger;">2</span>
                    <button type="button" class="btn btn-warning btn-sm shadow-none"><i class="fa-solid fa-plus"></i></button>
                    <span class="mx-2">tersisa 25 buah</span>
                </div>
                <div class="btn-produk mt-5">
                    <a href="" class="btn btn-dark text-white btn-lg me-2 btn-custom"><i class="fa-solid fa-cart-shopping me-2"></i>Masukkan Keranjang</a>
                    <a href="" class="btn btn-primary text-white btn-lg me-2 btn-custom" >Beli Sekarang</a>
                </div>
                <div class="mt-4">
                  <div class="card deskripsi">
                    <div class="card-body">
                      <h6>Deskripsi</h6>
                      Lorem ipsum dolor sit, amet consectetur adipisicing elit. Labore, harum repellat quas a distinctio nihil ut! Sit amet dicta tempore quidem molestiae. Facilis itaque atque molestiae nihil debitis, omnis rerum numquam aliquam mollitia. Repudiandae temporibus voluptatibus ea. Natus, blanditiis quos voluptatibus reiciendis animi culpa, quae rerum aspernatur molestias amet minima rem esse repudiandae ex exercitationem provident. Officia optio, quidem adipisci facilis perspiciatis soluta! Itaque, ab? Laudantium cupiditate totam voluptates voluptate, laboriosam esse corrupti tenetur libero ut? Eaque illum repellat veniam consequatur minus rerum et repellendus sit, qui tenetur voluptatibus nemo esse eius. Praesentium omnis doloribus tenetur molestias placeat, iusto tempore.
                    </div>
                  </div>
                </div>
            </div>
        </div>
  </div>

<!-- Related items section-->
  <section class="py-5 bg-light mt-5">
    <div class="container px-4 px-lg-5 mt-5">
        <h2 class="fw-bolder mb-4">Related products</h2>
        <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
          <div class="col mb-5">
            <div class="card" id="card-produk">
              <img src="/assets/img2/Arbeuty/9.jpg" class="card-img-top" alt="..." height="210x">
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


<?= $this->endSection() ?>