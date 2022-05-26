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
                        <th width="60px">Jumlah</th>
                        <th>Harga</th>
                        <th>Total</th>
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
                        <th>Total</th>
                        <th>Account</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </tfoot>
                <tbody>
                    <?php $no=1;  foreach($data as $key) :?>
                    <tr>
                        <td><?= $no; ?></td>
                        <td><?= $key['produk']; ?></td>
                        <td class="text-center"><?= $key['jumlah']; ?></td>
                        <td><?= $key['harga']; ?></td>
                        <td><?= $key['total']; ?></td>
                        <td><?= $key['email']; ?></td>
                        <td><?= $key['status']; ?></td>
                        <td>
                            <a href="" class="btn btn-sm btn-danger shadow-none"><i class="fa-solid fa-xmark me-2"></i>Cancel</a>
                        </td>
                    </tr>
                    <?php
                     $no++;
                     endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?= $this->endSection() ?>