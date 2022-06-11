<?= $this->extend('template/Admin/main') ?>
<?= $this->section('content') ?>


<div class="modal fade" id="Edit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Edit</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="container-fluid">
            <?= form_open('/AdminController/UpdateOrder','id="form_edit"'); ?>
                <input type="hidden" name="id_order">
                <div class="mb-3">
                    <label for="form-label">No Resi</label>
                    <input type="text" class="form-control mt-1 shadow-none" name="noresi" required>
                </div>
                <div class="mb-3">
                    <label for="form-label">Status</label>
                    <select name="status" class="form-select mt-1 shadow-none" id="status" required>
                        <option value="#" selected='selected' disabled>-- Pilih --</option>
                        <?php foreach($status as $key) :?>
                        <option value="<?= $key['id_status']?>"><?= $key['nama']?></option>
                        <?php endforeach; ?>
                    </select>
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
                        <th>ID Pesanan</th>
                        <th>Status</th>
                        <th>Resi</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>No</th>
                        <th>ID Pesanan</th>
                        <th>Status</th>
                        <th>Resi</th>
                        <th>Aksi</th>
                    </tr>
                </tfoot>
                <tbody>
                    <?php $no=1;  foreach($data as $key) :?>
                    <tr>
                        <td><?= $no; ?></td>
                        <td><?= $key['id_order']; ?></td>
                        <td><?= $key['status']; ?></td>
                        <td><?= $key['resi']; ?></td>
                        <td>
                            <button type="button" class="btn btn-sm btn-secondary shadow-none me-1" data-bs-toggle="modal" data-bs-target="#Edit" data-bs-id="<?= $key['id_order']; ?>" data-bs-resi="<?= $key['resi']; ?>"><i class="fa-solid fa-pen-to-square me-1"></i>Edit</button>
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

<script>
    const Editmodal = document.getElementById('Edit')
   

    Editmodal.addEventListener('show.bs.modal', event => {
        // Button that triggered the modal
        const button = event.relatedTarget
        // Extract info from data-bs-* attributes
        const id = button.getAttribute('data-bs-id')
        const resi = button.getAttribute('data-bs-resi')
        console.log(id);
        $('input[name=noresi]').val(resi)
        $('input[name=id_order]').val(id)
        
    })
</script>
<?= $this->endSection() ?>