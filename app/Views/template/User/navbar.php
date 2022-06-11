  <?php 
  $data = new App\Models\UserModel;

  if(isset($_SESSION['status'])){
    $jum_keranjang = $data->get_keranjang($_SESSION['data']['id_user'])['id_produk'];
  }else{
    $jum_keranjang = 0;
  }
   ?>
  
  
  <nav class="navbar navbar-expand-lg navbar-light bg-white sticky-top px-2 shadow shadow-sm" style="z-index: 2;">
    <div class="container p-sm-1">
      <a class="navbar-brand mx-lg-5" href="/">ArBeauty Store</a>

      <!-- searching -->
      <form class="input-group d-md-flex d-none me-md-auto search-navbar" method="POST" action="/search">
        <input class="form-control input-search" type="search" name="nama" placeholder="Search" aria-label="Search" aria-describedby="search">
        <button type="submit" class="btn"><i class="fa-solid fa-magnifying-glass"></i></button>
      </form>

      <!-- icon search -->
      <div class="d-md-none ms-auto" id="icon-search">
        <span><i class="fa-solid fa-magnifying-glass"></i></span>
      </div>

      <!-- tombol keranjang -->
      <div class="d-sm-flex d-none mx-sm-3 mx-md-2 me-lg-4 ms-lg-3">
        <a href="/keranjang"" class="btn btn-outline-dark shadow-none">
          <i class="fa-solid fa-cart-shopping"></i>
          Cart
          <span class="badge bg-dark text-white ms-1 rounded-pill"><?= $jum_keranjang; ?></span>
        </a>
      </div>

      <!-- icon keranjang -->
      <div class="d-sm-none ms-4 me-3" id="icon-keranjang">
        <a href="/keranjang" class="text-dark"><i class="fa-solid fa-bag-shopping"></i></a>
      </div>

      <?php if(isset($_SESSION['status'])) : ?>
      <!-- akun sudah login -->
      <div class="btn-group me-lg-auto dropdown">
        <button class=" btn btn-outline-dark dropdown-toggle" id="dropdownMenuButton1" type="button" data-bs-toggle="dropdown"
        aria-expanded="false">
        <i class="fa-solid fa-user"></i>
        <span class="ms-2"><?= $_SESSION['data']['nama']; ?></span>
        </button>
        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
          <li><a href="#" class="dropdown-item">My Profile</a></li>
          <li><a href="/AuthController/logout" class="dropdown-item">Logout</a></li>
        </ul>
      </div>

      <!-- icon akun -->
      <div class="btn-group d-sm-none me-2 d-none" id="icon-profile">
        <button class="btn bg-white dropdown-toggle border-0 shadow-none" type="button" data-bs-toggle="dropdown"
          aria-expanded="false">
          <i class="fa-solid fa-user"></i>
          <!-- <span class="ms-2">Nur Holis Kafi</span> -->
        </button>
        <ul class="dropdown-menu">
          <li><a href="" class="dropdown-item">Profile</a></li>
          <li><a href="" class="dropdown-item">Logout</a></li>
        </ul>
      </div>
      <?php else : ?>
        <!-- akun belum login -->
        <div class="me-lg-auto me-2 ms-md-3 me-sm-0">
          <a href="/register" class="text-decoration-none text-dark" style="font-family: 'Oswald', sans-serif;">Sig
            In</a>
          <span>or</span>
          <a href="/login" class="text-decoration-none text-dark" style="font-family: 'Oswald', sans-serif;">Log
            in</a>
        </div>
      <?php endif; ?>
    </div>
  </nav>

  <form class="input-group search-navbar position-fixed search-hidden hidden d-md-none mt-5" method="POST" action="/search">
    <input class="form-control" type="search" name="nama" placeholder="Search" aria-label="Search" style="" aria-describedby="search">
    <button type="submit" class="btn"><i class="fa-solid fa-magnifying-glass"></i></button>
  </form>


  <script>
  var icon = document.getElementById('icon-search');
  var form = document.querySelector('.search-hidden');
  var a = document.querySelector('.search-hidden .form-control');
  a.focus();
  icon.addEventListener('click',function() {
    form.classList.toggle("hidden");
    form.classList.toggle("show");
    // form.style.transition: opacity 0.5s;
  })
  </script>
