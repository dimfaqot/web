<?= $this->extend('templates/login'); ?>

<?= $this->section('content'); ?>
<?php
helper('form');
helper('functions');

?>
<!-- Begin Page Content -->
<div class="container-fluid">
    <?= form_open_multipart(base_url() . '/single/artikel') ?>

    <div class="mb-4">
        <label class="form-label">Judul</label>
        <input type="text" name="judul" class="form-control form-control-sm" placeholder="Judul" value="">
    </div>

    <div class="form-group mb-4">
        <label>Kategori</label> <a class="btn btn-sm btn-primary" href="<?= base_url(); ?>/dashboard/kategori" role="button"><i class="fa fa-plus"></i> Tambah Kategori</a>
        <select name="kategori" class="form-control form-control-sm mt-1">
            <?php foreach (kategori() as $i) : ?>
                <?php if ($i['kategori'] == "Iswa") : ?>
                    <option selected value="<?= $i['kategori']; ?>"><?= $i['kategori']; ?></option>
                <?php else : ?>
                    <option value="<?= $i['kategori']; ?>"><?= $i['kategori']; ?></option>
                <?php endif; ?>
            <?php endforeach; ?>
        </select>
    </div>
    <div class="form-group form-group-sm mb-2">
        <div class="custom-file" style="width:300px;">
            <input name="poster" type="file" class="custom-file-input">
            <label class="custom-file-label">Pilih Gambar</label>
        </div>
    </div>
    <div class="form-group mb-4">
        <textarea name="article" id="article"></textarea>
    </div>
    <div class="form-group mb-4">
        <label>Highlight</label>
        <textarea class="form-control" name="highlight" rows="3"></textarea>
    </div>
    <div class="d-flex justify-content-center">
        <button style="width:100px;" type="submit" class="btn btn-primary btn-sm"><i class="fa fa-folder"></i> Save</button>
    </div>
    </form>
</div>





</body>

</html>


<?= $this->endSection(); ?>