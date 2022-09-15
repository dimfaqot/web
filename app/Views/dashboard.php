<?= $this->extend('templates/login'); ?>

<?= $this->section('content'); ?>
<?php
$page = (int)$page;
$count = count($data);
$numbers = [1, 2, 3];
if ($page > 3) {
    if ($page % 3 == 0) {
        $num1 = $page - 2;
        $num2 = $page - 1;
        $num3 = $page;
        $numbers = [$num1, $num2, $num3];
    }
    if ($page % 3 == 1) {
        $num1 = $page;
        $num2 = $page + 1;
        $num3 = $page + 2;
        $numbers = [$num1, $num2, $num3];
    }
    if ($page % 3 == 2) {
        $num1 = $page - 1;
        $num2 = $page;
        $num3 = $page + 1;
        $numbers = [$num1, $num2, $num3];
    }
}

?>
<!-- Begin Page Content -->
<div class="container-fluid">
    <h6><?php if ($page <= $total) : ?><?= $dari; ?>-<?= $sampai; ?><?php endif; ?> Total Berita <?= $total; ?></h6>
    <?php foreach ($data as $i) : ?>
        <div class="list-group mb-2">
            <a href="<?= base_url(); ?>/single/<?= $i['slug']; ?>" class="list-group-item list-group-item-action" aria-current="true">
                <div class="d-flex w-100 justify-content-between">
                    <h6 class="mb-1"><?= $i['judul']; ?></h6>
                    <small><?= $i['updated_at']; ?></small>
                </div>
                <p class="mb-1"><?= $i['highlight']; ?></p>
                <small><?= $i['nama']; ?></small>
            </a>
        </div>
    <?php endforeach; ?>

    <nav aria-label="Artikel">
        <ul class="pagination">
            <li class="page-item <?= ($page == 1 ? 'disabled' : ''); ?>">
                <a class="page-link" href="<?= base_url(); ?>/dashboard?page=<?= $page - 1; ?>">Previous</a>
            </li>
            <?php foreach ($numbers as $i) : ?>
                <?php if ($page == $i) : ?>
                    <li class="page-item active"><a class="page-link" href="<?= base_url(); ?>/dashboard?page=<?= $i; ?>"><?= $i; ?></a></li>
                <?php else : ?>
                    <li class="page-item"><a class="page-link" href="<?= base_url(); ?>/dashboard?page=<?= $i; ?>"><?= $i; ?></a></li>
                <?php endif; ?>
            <?php endforeach; ?>
            <li class="page-item <?= ($page >= $count ? 'disabled' : ''); ?>"><a class="page-link" href="<?= base_url(); ?>/dashboard?page=<?= $page + 1; ?>">Next</a></li>
        </ul>
    </nav>

</div>
<!-- /.container-fluid -->






<?= $this->endSection(); ?>