<?= $this->extend('template/User/main') ?>
<?= $this->section('content') ?> 

<div class="container p-3" style="min-height: 80vh;">
    <p class="mt-5 header">History</p>
    <div class="container bg-white p-3">
        <div class="row">
            <div class="col table-responsive">
                <table class="table align-middle text-center">
                    <thead class="table-info">
                      <tr>
                        <th>No</th>
                        <th>Gambar</th>
                        <th>Produk</th>
                        <th>jumlah</th>
                        <th>Harga</th>
                        <th>Waktu</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>1</td>
                        <td><a href=""><img src="produk/produk1.jpg" alt="no image" width="70px" ></a></td>
                        <td>Jam tangan</td>
                        <td>2</td>
                        <td>Rp. 250.000</td>
                        <td>14-04-2000, 12:00:00</td>
                      </tr>
                    </tbody>
                  </table>
            </div>
        </div>
        <a href="akun.html" class="btn btn-md btn-danger mt-3">Kembali</a>
    </div>
</div>

<?= $this->endSection() ?>