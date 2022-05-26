<?= $this->extend('template/Admin/main') ?>
<?= $this->section('content') ?>

<div class="container p-3">
    <h1>Order</h1>
    <div class="card mt-5">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Order
        </div>
        <div class="card-body">
            <table id="datatablesSimple" >
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Produk</th>
                        <th>Jumlah</th>
                        <th>Harga</th>
                        <th>Account</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>No</th>
                        <th>Produk</th>
                        <th>Jumlah</th>
                        <th>Harga</th>
                        <th>Account</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </tfoot>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Bedak Bayi</td>
                        <td class="text-center">2</td>
                        <td>Rp. 115.000</td>
                        <td>mina@gmail.com</td>
                        <td>Belum Bayar</td>
                        <td>
                            <a href="" class="btn btn-sm btn-danger shadow-none"><i class="fa-solid fa-xmark me-2"></i>Cancel</a>
                        </td>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>Bedak Bayi</td>
                        <td class="text-center">2</td>
                        <td>Rp. 115.000</td>
                        <td>mina@gmail.com</td>
                        <td>Belum Bayar</td>
                        <td>
                            <a href="" class="btn btn-sm btn-danger"><i class="fa-solid fa-xmark me-2"></i>Cancel</a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?= $this->endSection() ?>