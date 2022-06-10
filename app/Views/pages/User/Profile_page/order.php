<?= $this->extend('template/User/main') ?>
<?= $this->section('content') ?> 

<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="detail_produk" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Detail Pesanan</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-10">
              <table class="table table-hover table-bordered">
              <thead>
                <tr>
                  <th scope="col">No</th>
                  <th scope="col">Produk</th>
                  <th scope="col">Jumlah</th>
                </tr>
              </thead>
              <tbody id="table_body">

              </tbody>
            </table>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<div class="container p-3" style="min-height: 80vh;">
    <p class="mt-5 header">Pesanan anda</p>
    <div class="container bg-white p-3">
        <div class="row">
            <div class="col table-responsive">
                <table class="table align-middle text-center table-hover table-bordered">
                    <thead class="table-info">
                      <tr>
                        <th>No</th>
                        <th>Pesanan</th>
                        <th>Total</th>
                        <th>Metode Pembayaran</th>
                        <th>Waktu</th>
                        <th>Status</th>
                        <th>No Resi</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $no = 1; foreach($order as $key):  ?>
                      <tr>
                        <td><?= $no; ?></td>
                        <td><button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-id="<?= $key['id_order']; ?>" data-bs-target="#detail_produk">view</button></td>
                        <td id="view-harga"><?= $key['total']; ?></td>
                        <td><?= $key['metode_pembayaran']; ?></td>
                        <td><?= $key['waktu']; ?></td>
                        <td><?= $key['status']; ?></td>
                        <td><?= $key['resi']; ?></td>
                        <td><a href="" class="btn btn-sm btn-dark">Cancel</a></td>
                      </tr>
                      <?php $no++; endforeach;  ?>
                    </tbody>
                  </table>
            </div>
        </div>
        <a href="akun.html" class="btn btn-md btn-danger mt-3">Kembali</a>
    </div>
</div>

<script>
  const modal = document.getElementById('detail_produk')
  modal.addEventListener('show.bs.modal', event => {
    // Button that triggered the modal
    const button = event.relatedTarget
    // Extract info from data-bs-* attributes
    const id = button.getAttribute('data-bs-id')
    console.log(id);
    $.ajax({
      url: 'http://localhost:8080/UserController/Data_detailOrder/'+id,
      type: 'POST',
      success: function(e){
        $('#table_body').html(e)
      }
    })
  })
</script>

<?= $this->endSection() ?>