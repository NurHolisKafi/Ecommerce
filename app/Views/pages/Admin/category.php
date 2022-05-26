<?= $this->extend('template/Admin/main') ?>
<?= $this->section('content') ?>

    <div class="container p-3">
        <h1 class="mb-5">Category</h1>

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
        <div class="card mb-5">
            <div class="card-header fw-bold">
                New Category
            </div>
            <div class="card-body">
              <?= form_open('/CategoryController/Insert'); ?>
                  <div class="mb-3">
                    <label for="Inputnama" class="form-label">Nama</label>
                    <input type="text" class="form-control shadow-none" name="nama" id="Inputnama" required>
                  </div>
                  <button type="submit" class="btn btn-primary">Submit</button>
            </form>
            </div>
        </div>
        <div class="card">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Category
            </div>
            <div class="card-body">
                <table id="datatablesSimple">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>Aksi</th>
                        </tr>
                    </tfoot>
                    <tbody>
                    <?php $no=1;  foreach($data as $key) :?>
                        <tr>
                            <td><?= $no; ?></td>
                            <td><?= $key['nama']; ?></td>
                            <td>
                                <button type="button" class="btn btn-sm btn-secondary me-1" data-bs-toggle="modal" data-bs-target="#edit_category" data-bs-id="<?= $key['id_category']; ?>"><i class="fa-solid fa-pen-to-square me-1"></i>Edit</button>
                                <button type="button" class="btn btn-sm btn-danger shadow-none" data-bs-toggle="modal" data-bs-target="#delete" data-bs-id="<?= $key['id_category']; ?>"><i class="fa-solid fa-trash-can me-2"></i>Hapus</button>
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

    <div class="modal fade" id="edit_category" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Category</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                <?= form_open('/CategoryController/Edit','id="form_category"'); ?>
                    <input type="hidden" name="id_category">
                    <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Nama</label>
                    <input type="text" class="form-control shadow-none" id="exampleInputPassword1" name="nama">
                  </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" data-bs-dismiss="modal">Submit</button>
            </div>
                </form>
            </div>
        </div>
    </div>

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

<script>

    var input = document.querySelectorAll("#edit_category .modal-body input");
    var form = document.getElementById('form_category');
    var Edit = document.querySelector("#edit_category");
    //Edit Produk
    Edit.addEventListener('show.bs.modal', function (event) {
        var button = event.relatedTarget
        var id = button.getAttribute('data-bs-id');
        if (id != null) {
            $.ajax({
                type: "GET",
                url: "/CategoryController/Data/" + id,
                success: function (data) {
                    const json = JSON.parse(JSON.stringify(data));
                    console.log(json);
                    //add value input
                    for (let i = 0; i < input.length; i++) {
                        input[i].setAttribute("value", json.input[i]);
                    }
                }
            })
        }
    })

    var hapus = document.getElementById('delete')
    hapus.addEventListener('show.bs.modal', function (event) {
        var button = event.relatedTarget
        var id = button.getAttribute('data-bs-id');
        link = document.querySelector('.modal-footer #btn_hapus');
        link.href = '/CategoryController/Delete/' + id;

    })

</script>
<?= $this->endSection() ?>
