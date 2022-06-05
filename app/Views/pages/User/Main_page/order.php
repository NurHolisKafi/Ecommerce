<?= $this->extend('template/User/main') ?>
<?= $this->section('content') ?> 

<style>
.row .card{
  transition: 0.5s ease
}

.row .card:hover{
  cursor: pointer;
  border: 1px solid black;
}

.choose{
  transform: scale(1.03);
}
</style>

<div class="container-fluid single-produk bg-white">
    <div class="container p-5">
        <div class="row justify-content-between">
            <div class="col-md-5">
                <h6 class="fw-bold mb-2">Billing Address</h6>
                <form>
                    <div class="mb-3">
                      <label for="nama" class="form-label">Nama</label>
                      <input type="text" class="form-control shadow-none" id="nama" aria-describedby="nama" required>
                    </div>
                    <div class="mb-3">
                      <label for="nama" class="form-label">Email</label>
                      <input type="email" class="form-control shadow-none" id="nama" aria-describedby="nama" required>
                    </div>
                    <div class="mb-3">
                        <label for="nama" class="form-label">No.Hp</label>
                        <input type="text" class="form-control shadow-none" id="nama" aria-describedby="nama" required>
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
                        <label class="form-label">Ekspedisi</label>
                        <select class="form-select" aria-label="Default select example" name="kurir" required>
                        </select>
                      </div>
                    </div>
                    <div class="row" id="pilihan_kurir">
                    </div>
                      <a href="keranjang.html" class="btn btn-lg btn-danger ms-sm-0 ms-2" style="font-size: 14px;">Kembali</a>
                      <button class="btn btn-beli btn-lg btn-primary ms-lg-5 ms-md-3 ms-2" style="font-size: 14px;">Beli Sekarang</button>
                  </form>
            </div>
            <div class="col-md-5 mt-5">
                <h6 class="fw-bold mb-2">Order list</h6>
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
                      <tfoot>
                        <tr>
                          <th>Jumlah</th>
                          <td id="view-harga"><?= $total_harga; ?></td>
                        </tr>
                      </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>


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
  console.log($(this).val());
  $.ajax({
    url: 'http://localhost:8080/UserController/DataCity',
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
  kota = $(this).val();
  $.ajax({
    url: 'http://localhost:8080/UserController/DataKurir',
    type: 'POST',
    success: function(e){
      $('select[name=kurir]').html(e)
    }
  })
})

$('select[name=kurir]').on('change',function(){
  $.ajax({
    url: 'http://localhost:8080/UserController/DataCost',
    type: 'POST',
    data: {
      tujuan: kota,
      berat: '1000',
      kurir: $(this).val()
    },
    success: function(e){
      $('#pilihan_kurir').html(e)
      card = document.querySelectorAll('.card');
      card.forEach(item => {
        item.addEventListener('click',function(){
          value = item.children[0].children[1].innerHTML; 
          console.log(value);
          item.classList.toggle("choose");
        })
      })
    }
  })
})








</script>
<?= $this->endSection() ?>