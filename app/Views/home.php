<?= $this->extend('templates/berita'); ?>

<?= $this->section('contents'); ?>
<!-- headline -->

<div class="row mb-3 px-2 pb-2 g-2" style="background-color:rgb(245, 245, 245); border-radius: 10px;">
    <div class="col-md-7">
        <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                <?php foreach ($headline as $key => $i) : ?>
                    <div class="carousel-item <?= ($key == 0 ? 'active' : ''); ?>">
                        <a href="<?= base_url(); ?>/berita/<?= $i['slug']; ?>"><img src="images/web/<?= $i['poster']; ?>" class="d-block w-100" alt="Slide <?= ($key + 1); ?>"></a>
                        <div class="carousel-caption d-none d-md-block">
                            <h5><?= $i['judul']; ?></h5>
                            <p><?= $i['highlight']; ?></p>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>

    </div>
    <div class="col-md-5">
        <?php foreach ($new as $i) : ?>
            <a style="text-decoration:none; color:grey" href="<?= base_url(); ?>/berita/<?= $i['slug']; ?>">
                <div class="card mb-1 p-2">
                    <div class="row">
                        <div class="col-md-4">
                            <img src="images/web/<?= $i['poster']; ?>" class="img-fluid rounded-start" alt="Sidebar<?= $i['slug']; ?>">
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

<div class="d-flex justify-content-center">
    <img class="img-fluid" src="<?= base_url(); ?>/images/web/banner.jpg" alt="">

</div>

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

<h4>Latest News</h4>
<h6>Categories</h6>
<ul class="nav nav-tabs">
    <?php foreach (kategori() as $i) : ?>
        <li class="nav-item">
            <a class="nav-link <?= ($active == $i['kategori'] ? 'active' : ''); ?>" href="<?= base_url(); ?>/<?= $i['kategori']; ?>"><?= $i['kategori']; ?></a>
        </li>
    <?php endforeach; ?>
</ul>


<div class="row">
    <?php foreach ($kategori as $i) : ?>
        <div class="col-md-6">
            <a style="text-decoration:none; color:grey" href="<?= base_url(); ?>/berita/<?= $i['slug']; ?>">
                <div class="card mb-3 p-3">
                    <div class="row g-0">
                        <div class="col-md-4">
                            <img src="images/web/WhatsApp Image 2022-02-02 at 23.33.47.jpeg" class="img-fluid rounded-start" alt="...">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h6 class="card-title"><?= $i['judul']; ?></h6>
                                <p><?= $i['highlight']; ?></p>
                                <p class="card-text"><small class="text-muted"><?= $i['created_at']; ?></small></p>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>
    <?php endforeach; ?>
</div>
<?= $this->endSection(); ?>