<?= $this->extend('template/User/main') ?>
<?= $this->section('content') ?>  
  <div class="container bg-white text-center p-2" style="margin: 15px auto;">
    <h5>KERANJANG</h5>
  </div>
  <div class="container bg-white">
    <div class="p-3">
      <div class="garis-nama"></div>
      <div class="form-check">
        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
        <label class="form-check-label" for="flexCheckDefault">
          Pilih Semua
        </label>
      </div>
      <div class="garis-nama"></div>
    </div>
    <div class="row justify-content-center row-keranjang">
      <div class="col-8 col-lg-3 col-md-4 p-4">
        <div class="container p-3 border border-danger position-relative" style="border-radius: 10px;">
          <a href="" class="btn-close btn-close-white" aria-label="Close"></a>
          <div class="form-check my-2">
            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
            <label class="form-check-label" for="flexCheckDefault">
              Pilih
            </label>
          </div>
          <div class="card border border-danger">
            <img src="/assets/img2/ARbeuty/1.jpg" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">Headshet j5 versi 50</h5>
              <div class="garis-nama"></div>
              <p style="font-size: large;">Rp. 30.000</p>
              <div id="jumlah" class="mt-3">
                <button type="button" class="btn btn-danger btn-sm"><i class="fa-solid fa-minus"></i></button>
                <span class="mx-2" style="font-size: larger;">2</span>
                <button type="button" class="btn btn-warning btn-sm"><i class="fa-solid fa-plus"></i></button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="container bg-white p-3 mt-2">
    <div class="row">
      <div class="col-sm">
        <h4>Total Harga : Rp. 1000.000,00</h4>
      </div>
      <div class="col-sm-3 col-md-2">
        <a href="Checkout.html" class="btn btn-secondary ms-0 ms-lg-5 ms-md-2" style="font-size: 17px;">Checkout</a>
      </div>
    </div>
  </div>

<?= $this->endSection() ?>