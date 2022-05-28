<?= $this->extend('template/User/main') ?>
<?= $this->section('content') ?> 

<div class="container p-3">
    <p class="mt-4 header">My Profile</p>
    <div class="container bg-white py-3">
      <form action="">
        <div class="d-flex flex-column align-items-center my-4">
          <img src="/assets/img2/images/user.png" alt="" width="200px" class="rounded-circle img-thumbnail">
          <input type="file" style="margin-left: 100px; margin-top: 20px;" class="">
        </div>
        <div class="row justify-content-center">
            <div class="col-sm-11">
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama Lengkap</label>
                    <input type="text" class="form-control w-100" id="nama" placeholder="Masukkan nama">
                </div>
                <div class="mb-3">
                    <label for="notelp" class="form-label">No.Telp</label>
                    <input type="password" class="form-control w-100" id="notelp" placeholder="Masukkan no.telp">
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control w-100" id="email" placeholder="Masukkan email">
                </div><div class="mb-3">
                    <label for="alamat" class="form-label">Alamat</label>
                    <input type="text" class="form-control w-100" id="nama" placeholder="">
                </div>
                <div class="d-flex flex-wrap">
                    <a href="akun.html" class="btn btn-danger mb-2 me-2">Kembali</a>
                    <button type="submit" class="btn btn-primary mb-2 me-2">Save</button>
                    <a href="ubah_pass.html" class="btn btn-secondary mb-2" id="btn_editpass">Change Password</a>
                </div>
            </div>
        </div>           
      </form>
    </div>
</div>

<?= $this->endSection() ?>