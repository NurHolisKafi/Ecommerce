<?= $this->extend('template/User/main') ?>
<?= $this->section('content') ?> 

<div class="container p-3">
    <p class="mt-4 header">My Profile</p>
    <div class="container bg-white py-3">
        <?php if($session->getFlashdata('success')): ?>
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <?= $session->getFlashdata('success'); ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <?php endif; ?>
      <form action="/UserController/Update_profile" method="POST" enctype="multipart/form-data">
        <div class="d-flex flex-column align-items-center my-4">
          <img src="/assets/img2/profile/<?= $user['gambar']; ?>" alt="" width="200px" class="rounded-circle img-thumbnail">
          <input type="file" style="margin-left: 100px; margin-top: 20px;" name="gambar" class="<?= ($validate->getError('gambar') ? 'is-invalid' : '')?>" value="<?= $user['gambar']; ?>">
        </div>
        <div class="invalid-feedback">
            <?= $validate->getError('gambar'); ?>
        </div>
        <div class="row justify-content-center">
            <div class="col-sm-11">
                <input type="hidden" name="id" value="<?= $user['id_user']; ?>">     
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama Lengkap</label>
                    <input type="text" class="form-control w-100 shadow-none" name="nama" value="<?= $user['nama']; ?>">
                </div>
                <div class="mb-3">
                    <label for="notelp" class="form-label">No.Telp</label>
                    <input type="text" class="form-control w-100 shadow-none" name="notelp" value="<?= $user['notelp']; ?>">
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control w-100 shadow-none" name="email" value="<?= $session->get('data')['email']; ?>">
                </div><div class="mb-3">
                    <label for="alamat" class="form-label">Alamat</label>
                    <textarea name="alamat" class=" form-control shadow-none" name="alamat" cols="10" rows="3" ><?= $user['alamat']; ?></textarea>
                </div>
                <div class="d-flex flex-wrap">
                    <a href="/myprofile" class="btn btn-danger mb-2 me-2">Kembali</a>
                    <button type="submit" class="btn btn-primary mb-2 me-2">Save</button>
                    <a href="/editpass" class="btn btn-secondary mb-2" id="btn_editpass">Change Password</a>
                </div>
            </div>
        </div>           
      </form>
    </div>
</div>

<?= $this->endSection() ?>