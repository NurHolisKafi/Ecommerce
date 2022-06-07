<?= $this->extend('template/Admin/main') ?>
<?= $this->section('content') ?>

<div class="container p-3">
    <h1 class="mb-5">Produk</h1>

    <!-- Notifikasi -->
    <?php if($validate->hasError('nama')): ?>
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <?= $validate->getError('nama'); ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>
    <?php if($session->getFlashdata('success')): ?>
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <?= $session->getFlashdata('success'); ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>
    <?php if($session->getFlashdata('delete')): ?>
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <?= $session->getFlashdata('delete'); ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>

    <!-- Card -->
    <div class="card">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Detail Produk
        </div>
        <div class="card-body p-4">
            <p style="font-size: 20px; font-weight: 500">Detail Produk</p>
            <div style="line-height: 0.5;">
                <p >Jumlah Produk: <?= $jumlah; ?></p>
            </div>
            <button ctype="button" class="btn btn-sm btn-primary shadow-none" data-bs-toggle="modal" data-bs-target="#Tambah"><i class="fa-solid fa-plus me-2"></i>Tambah</button>
        </div>
    </div>

    <div class="card mt-5">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Produk
        </div>
        <div class="card-body">
            <table id="datatablesSimple" >
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Category</th>
                        <th>Harga</th>
                        <th>Stok</th>
                        <th width="200px">Deskripsi</th>
                        <th>Gambar</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Category</th>
                        <th>Harga</th>
                        <th>Stok</th>
                        <th>Deskripsi</th>
                        <th>Gambar</th>
                        <th>Aksi</th>
                    </tr>
                </tfoot>
                <tbody>
                    <?php $no=1;  foreach($data_produk as $key) :?>
                    <tr>
                        <td><?= $no; ?></td>
                        <td><?= $key['nama']; ?></td>
                        <td><?= $key['category']; ?></td>
                        <td id ="view-harga"><?= $key['harga']; ?></td>
                        <td><?= $key['stok']; ?></td>
                        <td><?= $key['deskripsi']; ?></td>
                        <td>
                            <a href="/a/produk/gambar?id=<?= $key['id_produk']; ?>&&nama=<?= $key['nama']; ?>" class="btn btn-sm btn-success shadow-none"><i class="fa-solid fa-eye fa-sm me-1"></i>View</a>
                        </td>
                        <td>
                            <button type="button" class="btn btn-sm btn-secondary shadow-none me-1" data-bs-toggle="modal" data-bs-target="#Tambah" data-bs-id="<?= $key['id_produk']; ?>"><i class="fa-solid fa-pen-to-square me-1"></i>Edit</button>
                            <button type="button" class="btn btn-sm btn-danger shadow-none" data-bs-toggle="modal" data-bs-target="#delete" data-bs-id="<?= $key['id_produk']; ?>"><i class="fa-solid fa-trash-can me-2"></i>Hapus</button>
                        </td>
                    </tr>
                    <?php
                     $no++;
                     endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
    

    <!-- Modal Tambah/Edit -->
    <div class="modal fade" id="Tambah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Produk</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                <?= form_open('/ProdukController/Insert','id="form_produk"'); ?>
                    
                    <input type="hidden" name="id_produk">
                    <div class="mb-3">
                        <label for="form-label">Nama</label>
                        <input type="text" class="form-control mt-1 shadow-none <?php ?>" name="nama" required>
                    </div>
                    <div class="mb-3">
                        <label for="form-label">Harga</label>
                        <input type="text" class="form-control mt-1 shadow-none" name="harga" placeholder="tanpa titik, ex: 1000" required>
                    </div>
                    <div class="mb-3">
                        <label for="form-label">Stok</label>
                        <input type="text" class="form-control mt-1 shadow-none" name="stok" required>
                    </div>
                    <div class="mb-3">
                        <label for="form-label">Berat</label>
                        <input type="text" class="form-control mt-1 shadow-none" name="berat" placeholder="ukuran gram, ex: 1000" required>
                    </div>
                    <div class="mb-3">
                        <label for="form-label">Category</label>
                        <select name="category" class="form-select mt-1 shadow-none" id="category" required>
                            <option value="#">-- Pilih --</option>
                            <?php foreach($data_category as $key) :?>
                            <option value="<?= $key['id_category']?>"><?= $key['nama']?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="form-label">Deskripsi</label>
                        <textarea rows="3" class="form-control mt-1 shadow-none" name="deskripsi" id="deskripsi" required></textarea>
                    </div>
                    <?= csrf_field()?>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
                </form>
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
                Yakin ingin menghapus?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary shadow-none" data-bs-dismiss="modal">Cancel</button>
                <a href="" class="btn btn-primary shadow-none" id="btn_hapus">Hapus</a>
            </div>
            </div>
        </div>
    </div>
</div>

<script>

    var input = document.querySelectorAll("#Tambah .modal-body input");
    var form = document.getElementById('form_produk');
    var category = document.getElementById('category');
    var deskripsi = document.getElementById('deskripsi');
    var Edit = document.querySelector("#Tambah");
    console.log(input);
    //Edit Produk
    Edit.addEventListener('show.bs.modal', function (event) {
        var button = event.relatedTarget
        var id = button.getAttribute('data-bs-id');
        if (id != null) {
            $.ajax({
                type: "GET",
                url: "/ProdukController/Data/" + id,
                success: function (data) {
                    const json = JSON.parse(JSON.stringify(data));
                    form.action = '/ProdukController/Edit'
                    //add value input
                    for (let i = 0; i < input.length; i++) {
                        input[i].setAttribute("value", json.input[i]);
                    }
                    //add category
                    for (let item of category) {
                        if (item.value == json.category) {
                            item.selected = true;
                        }
                    }
                    //add deskripsi
                    deskripsi.innerHTML = json.deskripsi;
                }
            })
        } else {
            //remove value input
            for (let i = 0; i < input.length; i++) {
                input[i].removeAttribute("value");
            }
            //remove category
            for (let item of category) {
                item.selected = false;
            }
            //remove deskripsi
            deskripsi.innerHTML = '';
        }
    })


    //modal delete
    var hapus = document.getElementById('delete')
    hapus.addEventListener('show.bs.modal', function (event) {
        var button = event.relatedTarget
        var id = button.getAttribute('data-bs-id');
        link = document.querySelector('.modal-footer #btn_hapus');
        link.href = '/ProdukController/Delete/' + id;

    })

    
    

</script>

<?= $this->endSection() ?>