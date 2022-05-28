<?= $this->extend('template/User/main') ?>
<?= $this->section('content') ?> 

<div class="container-fluid single-produk bg-white">
    <div class="container p-5">
        <div class="row justify-content-between">
            <div class="col-md-5">
                <h6>Pemesan</h6>
                <form>
                    <div class="mb-3">
                      <label for="nama" class="form-label">Nama</label>
                      <input type="text" class="form-control" id="nama" aria-describedby="nama">
                    </div>
                    <div class="mb-3">
                        <label for="nama" class="form-label">No.Hp</label>
                        <input type="text" class="form-control" id="nama" aria-describedby="nama">
                    </div>
                    <div class="mb-3">
                        <label for="nama" class="form-label">Metode Pembayaran</label>
                        <input type="text" class="form-control" id="nama" aria-describedby="nama">
                    </div>
                    <div class="mb-3">
                      <label for="alamat" class="form-label">Alamat</label>
                      <input type="password" class="form-control" id="alamat">
                    </div>
                      <a href="keranjang.html" class="btn btn-lg btn-danger ms-sm-0 ms-2" style="font-size: 14px;">Kembali</a>
                      <a href="" class="btn btn-beli btn-lg btn-primary ms-lg-5 ms-md-3 ms-2" style="font-size: 14px;">Beli Sekarang</a>
                  </form>
            </div>
            <div class="col-md-5 mt-5">
                <h6>Daftar Pesanan</h6>
                <div class="table-responsive-md">
                  <table class="table table-hover table-sm border-5">
                      <thead>
                        <tr>
                          <th scope="col">No</th>
                          <th scope="col">Produk</th>
                          <th scope="col">jumlah</th>
                          <th scope="col">Total Harga</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>1</td>
                          <td>Mark</td>
                          <td>Otto</td>
                          <td>@mdo</td>
                        </tr>
                        <tr>
                          <td>2</td>
                          <td>Jacob</td>
                          <td>Thornton</td>
                          <td>@fat</td>
                        </tr>
                      </tbody>
                      <tfoot>
                        <tr>
                          <th>Jumlah</th>
                          <td>Rp. 100.000</td>
                        </tr>
                      </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>