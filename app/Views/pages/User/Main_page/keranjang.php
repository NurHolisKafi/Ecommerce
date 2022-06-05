<?= $this->extend('template/User/main') ?>
<?= $this->section('content') ?>  
  <div class="container bg-white text-center p-2" style="margin: 15px auto;">
    <h5>KERANJANG</h5>
  </div>
  <div class="container bg-white">
    <div class="p-3">
      <div class="garis-nama"></div>
      <div class="form-check">
        <input class="form-check-input shadow-none" type="checkbox" value="" id="checkbox-all">
        <label class="form-check-label" for="flexCheckDefault">
          Pilih Semua
        </label>
      </div>
      <div class="garis-nama"></div>
    </div>

    <form action="/UserController/checkout/" method="POST">
    <div class="row justify-content-center row-keranjang">  
      <?php foreach($data as $key): ?>
      <div class="col-8 col-lg-3 col-md-4 p-4">
        <div class="container p-3 border border-danger position-relative" style="border-radius: 10px;">
          <a href="" class="btn-close btn-close-white" aria-label="Close"></a>
            <div class="form-check my-2">
              <input class="form-check-input" type="checkbox" id="flexCheckDefault" name="id[]" value="<?=$key['id_produk'];?>">
              <label class="form-check-label" for="flexCheckDefault">
                Pilih
              </label>
            </div>
            <div class="card border border-danger">
              <img src="/assets/img/<?=$key['gambar'];?>" class="card-img-top" alt="..." height="180px">
              <div class="card-body">
                <h5 class="card-title"><?=$key['nama'];?></h5>
                <div class="garis-nama"></div>
                <p style="font-size: large;" id="view-harga"><?=$key['harga'];?></p>
                <div id="jumlah" class="mt-3">
                  <button type="button" class="btn btn-light border shadow-none btn-sm"><i class="fa-solid fa-minus"></i></button>
                  <span class="mx-2" style="font-size: larger;"><?=$key['jumlah'];?></span>
                  <button type="button" class="btn btn-light border shadow-none btn-sm"><i class="fa-solid fa-plus"></i></button>
                  <input type="hidden" name="jumlah[]" value="0">
                </div>
              </div>
            </div>
        </div>
      </div>
      <?php endforeach; ?>
    </div>
  </div>

  <div class="container bg-white p-3 my-2">
    <div class="row">
      <div class="col">
        <button class="btn btn-secondary" style="font-size: 17px;">Checkout</button>
      </div>
    </div>
    </form>
  </div>

  <script>
  var btn = document.querySelector('#checkbox-all');
  let input_checkbox = document.querySelectorAll('#flexCheckDefault');
  var angka = document.querySelector('#jumlah span');
  var plus = document.querySelector('#plus');
  let total_pesanan = document.querySelector('#total-pesanan');
  let input_totalHarga = document.querySelector('#total');
  let jumlahPesan = document.querySelectorAll('#jumlah');
  let TotalHarga;

  //untuk checkbox
  btn.onclick = function() {
    for (var checkbox of input_checkbox) {
      if(btn.checked == true){
        checkbox.checked = true
      }else{
        checkbox.checked = false
      }
    }
  }
  //untuk format view harga
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
  
  //melakukan update data
  function change(jumharga,a,span,hargapesan,input){
    total_peritem = jumharga * a
    span.innerHTML = a;
    hargapesan.innerHTML = view(total_peritem);
    input.value = a
  }

  //memberikan event pada tombol + -
  jumlahPesan.forEach((e,i) => {
    let hargapesan = e.previousElementSibling;
    let minus = e.children[0];
    let span = e.children[1];
    let plus = e.children[2];
    let input = e.children[3];
    input.value = span.innerHTML
    let jumlahperItem = hargapesan.innerHTML
    let jumharga = hargapesan.innerHTML * span.innerHTML
    hargapesan.innerHTML = jumharga
    console.log(jumlahperItem);

    minus.addEventListener('click',function(){
      a = span.innerHTML
      if( a > 1){
        a--;
        change(jumlahperItem,a,span,hargapesan,input);
      }
    })

    plus.addEventListener('click',function(){
      a = span.innerHTML
      a++;
      console.log(jumlahperItem * a);
      change(jumlahperItem,a,span,hargapesan,input);
    })
  })

  </script>

<?= $this->endSection() ?>