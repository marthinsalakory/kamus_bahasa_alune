<?php include 'header.php' ?>
<?php $nav_on = 'kata-indonesia' ?>
<?php include 'navbar.php' ?>
<main id="main">

    <section id="about" class="about">
        <div class="container">
            <div class="row text-center">
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
                        <div class="border border-2 p-2 text-break" id="alune" style="height: 200px;">Hasil Terjemahan</div>
                    </div>
                    <div class="col-6 text-end">
                        <p id="waktu_awal" class="text-primary"></p>
                    </div>
                    <div class="col-6 text-start">
                        <p id="waktu_akhir" class="text-danger"></p>
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
                startTime = new Date();
                $('#waktu_awal').text("Pencarian dimulai pada: " + startTime.toLocaleTimeString());
            },
            success: function(e) {
                $('#alune').html(e);
            },
            complete: function() {
                endTime = new Date();
                var elapsedTime = (endTime - startTime) / 1000;
                $('#waktu_akhir').text("Pencarian selesai pada: " + endTime.toLocaleTimeString());
                $('#waktu').text("Lama Pencarian : " + elapsedTime + " Detik");
            }
        });
    });
</script>
<?php include 'footer.php' ?>
