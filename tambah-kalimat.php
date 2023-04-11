<?php include 'header.php' ?>
<?php include 'navbar.php' ?>
<main id="main">

    <section id="about" class="about mt-5">
        <div class="container">
            <div class="card">
                <div class="card-body">
                    <div class="row text-center">
                        <h3 class="fw-bold">TAMBAH KALIMAT</h3>
                    </div>
                    <form action="action.php" method="POST">
                        <div class="row">
                            <div class="col-12">
                                <label for="indonesia">kalimat Indonesia</label>
                                <input required type="text" name="indonesia" id="indonesia" class="form-control">
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-12">
                                <label for="alune">Kalimat Alune</label>
                                <input required type="text" name="alune" id="alune" class="form-control">
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-12 text-end">
                                <button name="tambah_kalimat" class="btn btn-primary">Submit</button>
                                <button class="btn btn-danger" type="reset">Reset</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </section>

</main>
<?php include 'footer.php' ?>