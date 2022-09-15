<?= $this->extend('templates/berita'); ?>

<?= $this->section('contents'); ?>

<?php
// dd($sidebar);
?>
<div class="container">
    <div class="row">
        <div class="col-md-7">
            <div class="card">
                <img src="<?= base_url(); ?>/images/web/<?= $data['poster']; ?>" class="card-img-top img-fluid" alt="Poster">
                <div class="card-body">
                    <p class="card-text"><?= $data['article']; ?></p>
                </div>
            </div>

        </div>
        <div class="col-md-5">
            <?php foreach ($sidebar as $i) : ?>
                <a style="text-decoration:none; color:grey" href="<?= base_url(); ?>/berita/<?= $i['slug']; ?>">
                    <div class="card mb-1 p-2">
                        <div class="row">
                            <div class="col-md-4">
                                <img src="<?= base_url(); ?>/images/web/<?= $i['poster']; ?>" class="img-fluid rounded-start" alt="Sidebar">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h6 class="card-title"><?= $i['judul']; ?></h6>
                                    <p><?= $i['highlight']; ?></p>
                                    <div style="font-size:x-small;" class="text-muted"><?= $i['created_at']; ?></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            <?php endforeach; ?>
        </div>
    </div>


    <!-- banner top -->

    <h4>Trending</h4>
    <div class="row mb-3">
        <?php foreach ($trending as $i) : ?>
            <div class="col-md-3">
                <a style="text-decoration:none; color:grey" href="<?= base_url(); ?>/berita/<?= $i['slug']; ?>">
                    <div class="card h-100">
                        <img src="<?= base_url(); ?>/images/web/<?= $i['poster']; ?>" class="card-img-top" alt="Trending<?= $i['slug']; ?>">
                        <div class="card-body">
                            <h6 class="card-title"><?= $i['judul']; ?></h6>
                            <p><?= $i['highlight']; ?></p>
                        </div>
                        <div class="card-footer text-center">
                            <small class="text-muted"><?= $i['created_at']; ?></small>
                        </div>
                    </div>
                </a>
            </div>

        <?php endforeach; ?>
    </div>

    <div class="d-flex justify-content-center">
        <img class="img-fluid" src="<?= base_url(); ?>/images/web/banner.jpg" alt="">

    </div>
</div>

<?= $this->endSection(); ?>