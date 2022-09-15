<?= $this->extend('templates/login'); ?>

<?= $this->section('content'); ?>
<?php
helper('form');
helper('functions');

?>
<!-- Begin Page Content -->
<div class="container-fluid">
    <form class="mb-3" action="<?= base_url(); ?>/single/delete" method="post">
        <input type="hidden" name="id" value="<?= $data['id']; ?>">
        <button style="width:100px;" type="submit" class="btn btn-danger btn-sm mt-3"><i class="fa fa-trash"></i> Delete</button>
    </form>
    <?= form_open_multipart(base_url() . '/single/edit') ?>
    <div class="mb-2">
        <label class="form-label">Url</label>
        <input type="text" name="slug" class="form-control form-control-sm" placeholder="Url" value="<?= $data['slug']; ?>" readonly>
    </div>
    <div class="mb-2">
        <label class="form-label">Judul</label>
        <input type="text" name="judul" class="form-control form-control-sm" placeholder="Judul" value="<?= $data['judul']; ?>">
    </div>
    <div class="form-group mb-2">
        <label>Highlight</label>
        <textarea class="form-control" name="highlight" rows="3"><?= $data['highlight']; ?></textarea>
    </div>
    <div class="form-group mb-2">
        <label>Kategori</label>
        <select name="kategori" class="form-control form-control-sm">
            <?php foreach (kategori() as $i) : ?>
                <?php if ($data['kategori'] == $i['kategori']) : ?>
                    <option selected value="<?= $i['kategori']; ?>"><?= $i['kategori']; ?></option>
                <?php else : ?>
                    <option value="<?= $i['kategori']; ?>"><?= $i['kategori']; ?></option>
                <?php endif; ?>
            <?php endforeach; ?>

        </select>
    </div>
    <div class="d-flex flex-row mb-3">
        <div style="background-image:url('<?= base_url(); ?>/images/web/<?= $data['poster']; ?>');width:240px;height:160px; background-position:center; background-size:cover;background-repeat:no-repeat">
        </div>
        <div style="width:20px"></div>
        <div class="custom-file" style="width:300px;">
            <input name="poster" type="file" class="custom-file-input">
            <label class="custom-file-label">Ganti gambar</label>
        </div>
    </div>
    <input type="hidden" name="id" value="<?= $data['id']; ?>">
    <textarea name="article" id="article"><?= $data['article']; ?></textarea>
    <div class="d-flex justify-content-center">
        <button style="width:100px;" type="submit" class="btn btn-primary btn-sm mt-3">Save</button>
    </div>
    </form>


</div>





</body>

</html>


<?= $this->endSection(); ?>