<?= $this->extend('templates/login'); ?>

<?= $this->section('content'); ?>
<?php
helper('form');
helper('functions');

?>
<!-- Begin Page Content -->
<div class="container-fluid">
    <?= form_open_multipart(base_url() . '/single/kategori') ?>
    <div class="mb-5">
        <label class="form-label">Kategori</label>
        <input type="text" name="kategori" class="form-control form-control-sm" placeholder="Kategori" value="">
    </div>

    <div class="d-flex justify-content-center">
        <button style="width:100px;" type="submit" class="btn btn-primary btn-sm"><i class="fa fa-folder"></i> Save</button>
    </div>
    </form>
</div>





</body>

</html>


<?= $this->endSection(); ?>