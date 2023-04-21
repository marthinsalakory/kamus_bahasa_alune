<?php include 'header.php' ?>
<?php $nav_on = 'kata-indonesia' ?>
<?php include 'navbar.php' ?>
<main id="main">

    <section id="about" class="about">
        <div class="container">
            <div class="row mt-5 text-center">
                <h3 class="fw-bold">TERJEMAHAN</h3>
                <h3 class="fw-bold">INDONESIA - ALUNE</h3>
            </div>

            <div class="row">
                <div class="row">
                    <div class="col-12">
                        <div class="input-group mb-3">
                            <input class="form-control" id="indonesia" placeholder="Masukan Bahasa Indonesia">
                            <button class="btn btn-primary" id="cari" type="button"><i class="fa fa-search"></i> Terjemahkan</button>
                        </div>
                    </div>
                    <div class="col-12 mt-1">
                        <div class="border border-2 p-2" id="alune" style="height: 200px;">Hasil Terjemahan</div>
                    </div>
                    <div class="col-12 text-center">
                        <p id="waktu"></p>
                    </div>
                </div>
            </div>

        </div>
    </section>

</main>
<script>
    var startTime, EndTime;
    $("#cari").on('click', function() {


        // $('#alune').html(nl2br($(this).val()));
        $.ajax({
            url: 'action.php',
            data: {
                otomatis_indonesia: $('#indonesia').val(),
            },
            method: 'post',
            beforeSend: function() {
                startTime = Date.now();
            },
            success: function(e) {
                $('#alune').html(e);
            },
            complete: function() {
                endTime = Date.now();
                var elapsedTime = (endTime - startTime) / 1000;
                $('#waktu').text("Lama Pencarian : " + elapsedTime + " Detik");
            }
        });
    });
</script>
<?php include 'footer.php' ?>