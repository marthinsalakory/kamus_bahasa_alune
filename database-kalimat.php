<?php include 'header.php' ?>
<?php include 'navbar.php' ?>
<main id="main">

    <section id="about" class="about">
        <div class="container">
            <div class="row mt-5 text-center">
                <h3 class="fw-bold">DATABASE KATA</h3>
            </div>

            <div class="row">
                <div class="col-12 table-responsive">
                    <table class="table table-striped">
                        <thead class="table-primary">
                            <tr>
                                <th><input class="form-control text-center" placeholder="Cari kata Indonesia" type="text" id="cari_indonesia"></th>
                                <th><input class="form-control text-center" placeholder="Cari kata Alune" type="text" id="cari_alune"></th>
                            </tr>
                            <tr>
                                <th class="text-center">Indonesia</th>
                                <th class="text-center">Alune</th>
                            </tr>
                        </thead>
                        <tbody id="data">
                            <?php foreach (db_query("SELECT * FROM kalimat ORDER BY indonesia ASC") as $k) : ?>
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
    $("#cari_indonesia").on('keyup', function() {
        $.ajax({
            url: 'action.php',
            data: {
                cari: $('#cari_indonesia').val(),
                jenis: 'kalimat',
                bahasa: 'indonesia',
                database: true
            },
            method: 'post',
            success: function(e) {
                $('#data').html(e);
            }
        });
    });
    $("#cari_alune").on('keyup', function() {
        $.ajax({
            url: 'action.php',
            data: {
                cari: $('#cari_alune').val(),
                jenis: 'kalimat',
                bahasa: 'alune',
                database: true
            },
            method: 'post',
            success: function(e) {
                $('#data').html(e);
            }
        });
    });
</script>
<?php include 'footer.php' ?>