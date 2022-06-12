<?= $this->extend('template/User/main') ?>
<?= $this->section('content') ?> 

<div class="container p-3" style="min-height: 80vh;">
    <p class="mt-4 header">Change Password</p>
    <div class="container bg-white py-5" style="border-radius: 10px;">
      <form action="/UserController/Update_pass" method="POST">   
        <div class="row justify-content-center">
            <div class="col-sm-11">
                <input type="hidden" name="id" value="<?= $session->get('data')['id_user']; ?>">     
                <div class="mb-4">
                    <label for="nama" class="form-label">Current Password</label>
                    <input type="text" class="form-control w-100" id="nama" name="currpass">
                </div>
                <div class="mb-4">
                    <label for="nama" class="form-label">New Password</label>
                    <input type="text" class="form-control w-100" id="nama" name="newpass">
                </div>
                <div class="d-flex flex-wrap mt-3">
                    <a href="/editprofile" class="btn btn-danger mb-2 me-2">Kembali</a>
                    <button type="submit" class="btn btn-primary mb-2 me-2">Ubah</button>
                </div>
                
            </div>
        </div>           
      </form>
    </div>
</div>

<?= $this->endSection() ?>