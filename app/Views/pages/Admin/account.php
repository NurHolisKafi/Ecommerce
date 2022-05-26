<?= $this->extend('template/Admin/main') ?>
<?= $this->section('content') ?>

<div class="container p-3">
    <h1>Akun</h1>
    <div class="card mt-5">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Akun
        </div>
        <div class="card-body">
            <table id="datatablesSimple" >
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Email</th>
                        <th>Nama</th>
                        <th>No.Telp</th>
                        <th width="350px">Alamat</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                    <th>No</th>
                        <th>Email</th>
                        <th>Nama</th>
                        <th>No.Telp</th>
                        <th>Alamat</th>
                        <th>Aksi</th>
                    </tr>
                </tfoot>
                <tbody>
                    <?php $no=1;  foreach($data as $key) :?>
                    <tr>
                        <td><?= $no; ?></td>
                        <td><?= $key['email']; ?></td>
                        <td><?= $key['nama']; ?></td>
                        <td><?= $key['notelp']; ?></td>
                        <td><?= $key['alamat']; ?></td>
                        <td>
                            <button type="button" class="btn btn-sm btn-danger shadow-none" data-bs-toggle="modal" data-bs-target="#delete" data-bs-id="<?= $key['id_user']; ?>"><i class="fa-solid fa-trash-can me-2"></i>Hapus</button>
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

<script>
    var hapus = document.getElementById('delete')
    hapus.addEventListener('show.bs.modal', function (event) {
        var button = event.relatedTarget
        var id = button.getAttribute('data-bs-id');
        console.log(id)
        link = document.querySelector('.modal-footer #btn_hapus');
        link.href = '/AdminController/DeleteUser/' + id;

})
</script>
<?= $this->endSection() ?>