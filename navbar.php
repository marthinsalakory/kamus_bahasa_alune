<!-- ======= Header ======= -->
<header id="header" class="d-flex align-items-center">
    <div class="container d-flex align-items-center justify-content-between">

        <div class="logo">
            <a href="index.php"><img src="assets/img/buku.png" alt="" class="img-fluid">
                <span class="fw-bold h4 text-dark">KBAI</span>
            </a>
        </div>

        <nav id="navbar" class="navbar">
            <ul>
                <li class="dropdown"><a href="#"><span>Terjemahkan Otomatis</span> <i class="bi bi-chevron-right"></i></a>
                    <ul>
                        <li><a class="nav-link scrollto <?= $nav_on == 'otomatis-indonesia' ? 'active' : ''; ?>" href="otomatis-indonesia.php">INDONESIA - ALUNE</a></li>
                        <li><a class="nav-link scrollto <?= $nav_on == 'otomatis-alune' ? 'active' : ''; ?>" href="otomatis-alune.php">ALUNE - INDONESIA</a></li>
                    </ul>
                </li>
                <li class="dropdown"><a href="#"><span>Terjemahkan Manual</span> <i class="bi bi-chevron-right"></i></a>
                    <ul>
                        <li><a class="nav-link scrollto <?= $nav_on == 'manual-indonesia' ? 'active' : ''; ?>" href="manual-indonesia.php">INDONESIA - ALUNE</a></li>
                        <li><a class="nav-link scrollto <?= $nav_on == 'manual-alune' ? 'active' : ''; ?>" href="manual-alune.php">ALUNE - INDONESIA</a></li>
                    </ul>
                </li>
                <?php if (isLogin()) : ?>
                    <li class="dropdown"><a href="#"><span>DATABASE</span> <i class="bi bi-chevron-right"></i></a>
                        <ul>
                            <li><a class="nav-link scrollto <?= $nav_on == 'database-kata' ? 'active' : ''; ?>" href="database-kata.php">LIHAT DATA</a></li>
                            <li><a class="nav-link scrollto <?= $nav_on == 'database-kalimat' ? 'active' : ''; ?>" href="tambah-kata.php">TAMBAH</a></li>
                        </ul>
                    </li>
                <?php endif; ?>
            </ul>
            <?php if (isLogin()) : ?>
                <button onclick="window.location.href='logout.php'" class="btn btn-danger btn-sm mx-4 fw-bold">LOGOUT</button>
            <?php else : ?>
                <button class="btn btn-primary btn-sm mx-3 fw-bold" data-bs-toggle="modal" data-bs-target="#modal-login">Masuk</button>
            <?php endif; ?>
            <i class="bi bi-list mobile-nav-toggle"></i>
        </nav><!-- .navbar -->

    </div>
</header>
<!-- End Header -->


<?php if (!isLogin()) : ?>
    <!-- Modal -->
    <div class="modal fade" id="modal-login" tabindex="-1" aria-labelledby="modal-loginLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h1 class="modal-title fs-5 text-light" id="modal-loginLabel">Masuk</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="action.php" method="POST">
                        <div class="row">
                            <div class="col-12">
                                <input class="form-control" type="text" name="username" id="username" placeholder="Username">
                                <input class="form-control mt-2" type="password" name="password" id="password" placeholder="Password">
                            </div>
                            <div class="col-12 text-end mt-2">
                                <button name="login" class="btn btn-primary">Masuk</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>
<?= flashBerhasil(); ?>
<?= flashGagal(); ?>