<?= $this->extend('template/User/main') ?>
<?= $this->section('content') ?> 

<style>
.row .card{
  transition: 0.5s ease
}

.row .card:hover{
  cursor: pointer;
  
}

.choose{
  border: 1px solid black;
}

th{
  font-weight: 500;
}
</style>


<div class="container-fluid single-produk bg-white">
    <div class="container p-5">
        <div class="row justify-content-between">
            <div class="col-md-5">
                <h6 class="fw-bold mb-2">Billing Address</h6>
                <form action="/Midtrans/index" method="POST" id="form">
                    <div class="mb-3">
                      <label for="nama" class="form-label">Nama</label>
                      <input type="text" class="form-control shadow-none" name="nama" id="nama" aria-describedby="nama" required>
                    </div>
                    <div class="mb-3">
                      <label for="email" class="form-label">Email</label>
                      <input type="email" class="form-control shadow-none" name="email" id="email" aria-describedby="nama" required>
                    </div>
                    <div class="mb-3">
                        <label for="nohp" class="form-label">No.Hp</label>
                        <input type="text" class="form-control shadow-none" name="nohp" id="nohp" aria-describedby="nama" required>
                    </div>
                    <div class="mb-3" id="content_provinsi">
                      <label class="form-label">Provinsi</label>
                      <select class="form-control select2bs4" name="provinsi" id="provinsi" style="width: 100%;" required>
                        <option selected="selected" disabled>-- Pilih --</option>
                        <?php foreach($provinsi as $key): ?>
                        <option value=<?= $key['province_id']; ?>><?= $key['province']; ?></option>
                        <?php endforeach; ?>
                      </select>
                    </div>
                    <div id="hidden">
                      <div class="mb-3">
                        <label class="form-label">Kota/Kabupaten</label>
                        <select class="form-control select2bs4" name="kota" style="width: 100%;" required>
                        </select>
                      </div>
                      <div class="mb-3">
                        <label for="alamat-lengkap" class="form-label">Alamat Lengkap</label>
                        <textarea class="form-control" id="alamat-lengkap" name="alamat_lengkap" rows="3" required></textarea>
                      </div>
                      <div class="mb-3">
                        <label class="form-label">Ekspedisi</label>
                        <select class="form-select" aria-label="Default select example" name="kurir" required>
                        </select>
                      </div>
                    </div>
                    <div class="row" id="pilihan_kurir">
                    </div>
                    <input type="hidden" name="postal_code">
                    <input type="hidden" name="city">
                    <input type="hidden" name="subtotal_pengiriman">
            </div>
            <div class="col-md-5 mt-3 mb-5">
                <h5 class="fw-bold mb-3">Order list</h5>
                <div class="table-responsive-md">
                  <table class="table table-hover table-sm border-5">
                      <thead>
                        <tr>
                          <th scope="col">No</th>
                          <th scope="col">Produk</th>
                          <th scope="col" >jumlah</th>
                          <th scope="col">Total Harga</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php $no=1;  foreach($data_pesanan as $key) :?>
                          <input type="hidden" name="id[]" value="<?= $key['id']; ?>">
                          <input type="hidden" name="jumlah[]" value="<?= $key['jumlah']; ?>">
                        <tr>
                          <td><?= $no; ?></td>
                          <td><?= $key['nama']; ?></td>
                          <td class=" text-center"><?= $key['jumlah']; ?></td>
                          <td id="view-harga"><?= $key['total']; ?></td>
                        </tr>
                        <?php
                        $no++;
                        endforeach; ?>
                      </tbody>
                    </table>
                </div>
                <div class="mt-5">
                  <div class="table-responsive">
                    <table class="table">
                      <tr>
                        <th>Subtotal Produk:</th>
                        <td id="view-harga"><?= $total_harga; ?></td>
                      </tr>
                      <tr id="pengiriman">
                        <th>Subtotal Pengiriman:</th>
                        <td id="view-harga">0</td>
                      </tr>
                      <tr id="total-pembayaran">
                        <th>Total:</th>
                        <td id="view-harga">0</td>
                      </tr>
                    </table>
                  </div>
                    <a href="/" class="btn btn-lg btn-danger ms-sm-0 ms-2 shadow-none" style="font-size: 14px;">Kembali</a>
                    <button type="submit" id="pay-button" class="btn btn-beli btn-lg btn-primary ms-lg-5 ms-md-3 ms-2 shadow-none" style="font-size: 14px;">Beli Sekarang</button>
                    </form>
                </div>
                <div class="alert alert-info rounded-0 my-5" role="alert">
                  Catatan: jika harga pada peilihan metode pembayaran tidak sesuai seperti yang tertera maka close metodenya dan ulangi lagi.
                </div>
            </div>
        </div>
    </div>
</div>

<form action="/Midtrans/hasil" method="POST" id="form_respond">
  <?php $no=1;  foreach($data_pesanan as $key) :?>
    <input type="hidden" name="id[]" value="<?= $key['id']; ?>">
    <input type="hidden" name="jumlah[]" value="<?= $key['jumlah']; ?>">
  <?php endforeach; ?>
  <input type="hidden" name="data">
  <input type="hidden" name="data_pesanan">
</form>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div> 

<script>
let kota;
let card;
const pengiriman = document.querySelector('#pengiriman')
const pembayaran = document.querySelector('#total-pembayaran')
const total_produk = <?= $total_harga; ?>;

$('.fw-bold').on('click',function(){
  $('#exampleModal').modal('show');
})

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


$('#hidden').hide();

$('#provinsi').on('change',function(){
  $.ajax({
    url: '/UserController/DataCity',
    type: 'POST',
    data: {
      id: $(this).val()
    },
    success: function(e){
      $('#hidden').show();
      $('select[name=kota]').html(e)
    }
  })
})

$('select[name=kota]').on('change',function(){
  $('#pilihan_kurir').hide();
  kota = $(this).val();
  let postal_code = $('option:selected', this).attr('postal_code')
  let city = $('option:selected', this).attr('nama')
  $('input[name=postal_code]').val(postal_code);
  $('input[name=city]').val(city);
  $.ajax({
    url: '/UserController/DataKurir',
    type: 'POST',
    success: function(e){
      $('select[name=kurir]').html(e)
    }
  })
})

$('select[name=kurir]').on('change',function(){
  $('#pilihan_kurir').show();
  $.ajax({
    url: '/UserController/DataCost',
    type: 'POST',
    async: false,
    data: {
      tujuan: kota,
      berat: '<?= $berat;?>',
      kurir: $(this).val()
    },
    success: function(e){
      $('#pilihan_kurir').html(e)
      card = document.querySelectorAll('.card');
      card.forEach(item => {
        item.addEventListener('click',function(){
          card.forEach(z => {
            z.classList.remove("choose")
          })
          item.classList.add("choose");

          value = item.children[0].children[1].innerHTML;
          total_pembayaran = parseInt(value) + total_produk;
          $('input[name=subtotal_pengiriman]').val(value)
          pembayaran.children[1].innerHTML = view(total_pembayaran)
          pengiriman.children[1].innerHTML = view(value)
        })
      })
    }
  })
})

$('#form').on('submit',function(e) {
  e.preventDefault();
  data = Array()
  $.each($(this).serializeArray(), function (i, field) {
      data.push(field);
  });
  
  json = JSON.stringify(data);
  $('input[name=data_pesanan').val(json);
  $.ajax({
    method: $(this).attr('method'),
    url: $(this).attr('action'),
    data: $(this).serialize(),
    success: function(data) {
      document.getElementById('pay-button').onclick = function(){
        // SnapToken acquired from previous step
        snap.pay(data.snapToken, {
          // Optional
          onSuccess: function(result){
            jason = JSON.stringify(result);
            $('input[name=data]').val(jason)
            Swal.fire({
              icon: 'success',
              title: 'Pesanan Berhasil',
              showConfirmButton: false,
              timer: 3000
            })
            setTimeout(function() { $('#form_respond').submit(); }, 3000);            
          },
          // Optional
          onPending: function(result){
            jason = JSON.stringify(result)
            $('input[name=data]').val(jason)
            Swal.fire({
              icon: 'success',
              title: 'Pesanan Berhasil',
              showConfirmButton: false,
              timer: 3000
            })
            setTimeout(function() { $('#form_respond').submit(); }, 3000);
            
            
          },
          // Optional
          onError: function(result){
            Swal.fire({
              icon: 'error',
              title: 'Oops...',
              text: 'Something went wrong!',
            })
          }
        });
      };
    }
  })
})






</script>
<?= $this->endSection() ?>