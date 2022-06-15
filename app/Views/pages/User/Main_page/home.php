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
                Pengiriman cepat tanpa menunggu lama
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
                Pembayaran dapat dilakukan dengan berbagai metode
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
                Barang yang tidak sesuai dapat dikembalikan 
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
        <?php foreach($featured_produk as $key): ?>
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
  </section>

  <section class="mt-5" style="background-color: tan;" id="limited">
    <div class="container">
      <div class="row justify-content-between align-items-center">
        <div class="col-md-6">
          <img src="/assets/img2/Arbeuty/7.1.png" alt="" class="w-100">
        </div>
        <div class="col-md-5 text-md-start text-center">
          <p style="font-weight: 500;">Exclusive available in ARBeauty Store</p>
          <h1>MSSLIM LIMITED EDITION</h1>
          <small>Limited Edition edisi valentine, stock sangat terbatas hanya selama persediaan masih ada siapa cepat dia dapat</small>
        </div>
      </div>
    </div>
  </section>

    <!-- Produk -->
  <div class="container" style="margin-top: 100px;">
    <div class="row title mb-3">
      <div class="col-8 mb-3">
        <h4 class="section-title">all product</h4>
        <div class="garis-biru"></div>
      </div>
      <div class="col-3">
        <div class="form-group d-flex align-items-center">
          <h6 class="me-3">Kategori</h6>
          <select class="form-select form-select-sm shadow-none" aria-label="Default select example" name="category" id="category">
          <option selected="selected" value="0">All Product</option>
          <?php foreach($category as $key): ?>
            <option value="<?=$key['id_category']?>"><?=$key['nama']?></option>
          <?php endforeach; ?>
          </select>
        </div>
      </div>
    </div>
    
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
    <div class="border d-flex justify-content-center">
      <div id="load-more" class="btn btn-outline-success shadow-none rounded-0 my-3">LOAD MORE</div>
    </div>
  </div>


<script>
 
  function load_more() {
    all_produk = document.querySelectorAll('#all_produk .col');
    all_produk.forEach((e,i) => {
      if (i > 15) {
        e.style.display = 'none';
      }
    }) 

    let boxes = [...document.querySelectorAll('#all_produk .col')];
    let loadMoreBtn = document.querySelector('#load-more');
    let currentItem = 16;

    if (currentItem >= boxes.length) {
      loadMoreBtn.style.display = 'none';
    }else {
      loadMoreBtn.onclick = () => {
        for (var i = currentItem; i < currentItem + 16; i++) {
            if (i < boxes.length) {
              boxes[i].style.display = 'inline-block';
            }
        }
        currentItem += 16;
        console.log(currentItem);

        if (currentItem >= boxes.length) {
            loadMoreBtn.style.display = 'none';
        }
      }
    }
  }

load_more();

function view(harga){
  let a = String(harga).split("").reverse();
  for (let b = 0; b < a.length; b++) {
      if ((b + 1) % 3 == 0 && b != a.length - 1) {
          a[b] = `.${a[b]}`;
      }
  }
  hasil = a.reverse().join("");
  
  return `Rp ${hasil}`
}

  $('#category').on('change',function() {
    $.ajax({
      url: '/UserController/Data_ProdukByCategory',
      type: 'POST',
      data:{
        id: $(this).val()
      },
      success: function(e){
        $('#all_produk').html(e)
        title = $("#category option:selected").text()
        $('h4').html(title.toUpperCase())
      }
    })
  })
</script>
<?= $this->endSection() ?>