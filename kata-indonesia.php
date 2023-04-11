<?php include 'header.php' ?>
<?php $nav_on = 'kata-indonesia' ?>
<?php include 'navbar.php' ?>
<main id="main">

    <section id="about" class="about">
        <div class="container">
            <div class="row mt-5 text-center">
                <h3 class="fw-bold">TERJEMAHAN KATA</h3>
                <h3 class="fw-bold">INDONESIA - ALUNE</h3>
            </div>

            <div class="section-title mt-3">
                <div class="row justify-content-center">
                    <div class="col-12 col-lg-6">
                        <input class="form-control col-md-8" type="text" id="cari" placeholder="Cari">
                        <p>Masukan kata kunci disini</p>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12 table-responsive">
                    <table class="table table-striped">
                        <thead class="table-primary">
                            <tr>
                                <th class="text-center">Indonesia</th>
                                <th class="text-center">Alune</th>
                            </tr>
                        </thead>
                        <tbody id="data">
                            <?php foreach (db_query("SELECT * FROM kata ORDER BY indonesia ASC") as $k) : ?>
                                <tr>
                                    <td class="text-center"><?= $k['indonesia']; ?></td>
                                    <td class="text-center"><?= $k['alune']; ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </section>

</main>
<script>
    $("#cari").on('keyup', function() {
        $.ajax({
            url: 'action.php',
            data: {
                cari: $('#cari').val(),
                jenis: 'kata',
                bahasa: 'indonesia'
            },
            method: 'post',
            success: function(e) {
                $('#data').html(e);
            }
        });
    });
</script>
<?php include 'footer.php' ?>