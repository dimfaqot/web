<?= $this->extend('templates/login'); ?>

<?= $this->section('content'); ?>
<?php


?>
<!-- Begin Page Content -->
<div class="container-fluid">
    <h6>Total Berita <?= count($data); ?></h6>
    <div class="list-group mb-3">
        <?php foreach ($data as $i) : ?>
            <a href="<?= base_url(); ?>/single/<?= $i['slug']; ?>" class="list-group-item list-group-item-action" aria-current="true">
                <div class="d-flex w-100 justify-content-between">
                    <h6 class="mb-1"><?= $i['judul']; ?></h6>
                    <small><?= $i['updated_at']; ?></small>
                </div>
                <p class="mb-1"><?= $i['highlight']; ?></p>
                <small><?= $i['nama']; ?></small>
            </a>
        <?php endforeach; ?>
    </div>
    <nav aria-label="...">
        <ul class="pagination">
            <li class="page-item disabled">
                <a class="page-link">Previous</a>
            </li>
            <li class="page-item"><a class="page-link" href="#">1</a></li>
            <li class="page-item active" aria-current="page">
                <a class="page-link" href="#">2</a>
            </li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item">
                <a class="page-link" href="#">Next</a>
            </li>
        </ul>
    </nav>

</div>
<!-- /.container-fluid -->




</body>

</html>


<?= $this->endSection(); ?>