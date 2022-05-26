<?= $this->extend('template/Admin/main') ?>
<?= $this->section('content') ?>

<style>
    .container #gambar{
        width: 30%;
        margin-bottom: 20px;
    }

    #gambar img{
        width: 100%;
        height: 100%;
    }

    #gambar button{
        position: absolute;
    }
    .container img:hover{
        cursor: pointer;
    }
</style>
<div class="container py-3">
    <?php if($session->getFlashdata('success')): ?>
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <?= $session->getFlashdata('success'); ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>
    <div class="card mb-3">
        <div class="card-body">
            <p>Nama Produk : <?= $nama ?></p>
            <?= form_open('/ProdukController/Insert_img','enctype=multipart/form-data'); ?>
            <div class="mb-3">
                <input type="hidden" name="id_produk" value="<?= $id ?>">
                <label for="formFileSm" class="form-label card-title fw-bold">New Image</label>
                <input class="form-control form-control-sm <?= ($validate->getError('gambar') ? 'is-invalid' : '')?>" id="formFileSm" type="file" name="gambar">
                <div class="invalid-feedback">
                    <?= $validate->getError('gambar'); ?>
                </div>
            </div>
            <a href="/a/produk" class="btn btn-danger btn-sm"><i class="fa-solid fa-arrow-left me-2"></i>Back</a>
            <button type="submit" class="btn btn-primary btn-sm ms-2">Submit</button>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <div class="container border border-dark py-2 d-flex flex-wrap justify-content-evenly" id="img_wrap">
                <?php foreach($data as $key) :?>
                <div id="gambar">
                    <button type="button" class="btn-close shadow-none" aria-label="Close" data-bs-toggle="modal" data-bs-target="#delete" data-bs-id=<?= $key['id_gambar']?>></button>
                    <img src="/assets/img/<?= $key['nama']?>" class="mb-2">
                </div>
                <?php endforeach;?>
            </div>
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
    var button = document.querySelectorAll('.btn-close');
    button.forEach(function(close) {
        close.addEventListener('click', function() {
            var id = close.getAttribute('data-bs-id');
            var btn_hapus = document.getElementById('btn_hapus');
            btn_hapus.href = '/ProdukController/Delete_img/'+id
        })
    })
</script>
<?= $this->endSection() ?>
