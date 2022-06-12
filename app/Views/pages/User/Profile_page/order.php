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
          <p id="id_pesan"></p>
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
<!-- Modal Hapus -->
<div class="modal fade" id="delete" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
      <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Hapus Data</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
          Yakin ingin membatalkan pesanan?
      </div>
      <div class="modal-footer">
          <button type="button" class="btn btn-secondary shadow-none" data-bs-dismiss="modal">Cancel</button>
          <a href="" class="btn btn-primary shadow-none" id="btn_hapus">Yes</a>
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
                        <th>invoice</th>
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
                        <td>
                          <a href="/invoice?id=<?= $key['id_order']; ?>" rel="noopener" target="_blank" class="btn btn-sm btn-primary"><i class="fas fa-print me-1"></i>Print</a>
                        </td>
                        <td>
                          <?php if($key['id_status'] > 3): ?>
                            <button type="button" class="btn btn-sm btn-dark" disabled>Cancel</button>
                          <?php else : ?>
                            <button type="button" class="btn btn-sm btn-dark shadow-none" data-bs-toggle="modal" data-bs-target="#delete" data-bs-id="<?= $key['id_order']; ?>">Cancel</button>
                          <?php endif; ?>
                        </td>
                      </tr>
                      <?php $no++; endforeach;?>
                    </tbody>
                  </table>
            </div>
        </div>
        <a href="/myprofile" class="btn btn-md btn-danger mt-3">Kembali</a>
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
        $('#id_pesan').html('ID PESANAN : '+id)
        $('#table_body').html(e)
      }
    })
  })


  //modal delete
  var hapus = document.getElementById('delete')
  hapus.addEventListener('show.bs.modal', function (event) {
    var button = event.relatedTarget
    var id = button.getAttribute('data-bs-id');
    link = document.querySelector('.modal-footer #btn_hapus');
    link.href = '/UserController/Delete_order/' + id;

  })
</script>

<?= $this->endSection() ?>