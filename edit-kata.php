<?php include 'header.php' ?>
<?php include 'navbar.php' ?>
<?php
if (isset($_GET['id'])) {
    if (db_count('kata', ['id' => $_GET['id']])) {
        $kata = db_find('kata', ['id' => $_GET['id']]);
    } else {
        redirect_back();
    }
} else {
    redirect_back();
}
?>
<main id="main">

    <section id="about" class="about mt-5">
        <div class="container">
            <div class="card">
                <div class="card-body">
                    <div class="row text-center">
                        <h3 class="fw-bold">TAMBAH KATA</h3>
                    </div>
                    <form action="action.php" method="POST">
                        <input type="hidden" name="id" value="<?= $_GET['id']; ?>">
                        <div class="row">
                            <div class="col-12">
                                <label for="indonesia">Kata Indonesia</label>
                                <input required type="text" name="indonesia" id="indonesia" class="form-control" value="<?= $kata->indonesia; ?>">
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-12">
                                <label for="alune">Kata Alune</label>
                                <input required type="text" name="alune" id="alune" class="form-control" value="<?= $kata->alune; ?>">
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-12 text-end">
                                <button name="edit_kata" class="btn btn-primary">Simpan</button>
                                <button class="btn btn-danger" type="reset">Reset</button>
                                <a href="database-kata.php" class="btn btn-warning">Kembali</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </section>

</main>
<?php include 'footer.php' ?>