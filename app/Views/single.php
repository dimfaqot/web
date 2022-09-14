<?= $this->extend('templates/login'); ?>

<?= $this->section('content'); ?>
<?php
helper('form')

?>
<!-- Begin Page Content -->
<div class="container-fluid">
    <?= form_open_multipart(base_url() . '/single/edit') ?>
    <div class="mb-3">
        <label class="form-label">Url</label>
        <input type="text" name="slug" class="form-control form-control-sm" placeholder="Url" value="<?= $data['slug']; ?>" disabled>
    </div>
    <div class="mb-3">
        <label class="form-label">Judul</label>
        <input type="text" name="judul" class="form-control form-control-sm" placeholder="Judul" value="<?= $data['judul']; ?>">
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