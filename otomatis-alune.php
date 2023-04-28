<?php include 'header.php' ?>
<?php $nav_on = 'kata-indonesia' ?>
<?php include 'navbar.php' ?>
<main id="main">

    <section>
        <div class="container mt-5">
            <div class="row text-center">
                <h3 class="fw-bold">TERJEMAHAN OTOMATIS</h3>
                <h3 class="fw-bold">ALUNE - INDONESIA</h3>
            </div>

            <div class="row">
                <div class="row">
                    <div class="col-lg-6">
                        <textarea style="resize: none;" class="form-control disable-height" id="alune" rows="4" placeholder="Masukan Bahasa Alune"></textarea>
                    </div>
                    <div class="col-lg-6 mt-1 text-break">
                        <div class="border border-2 p-2" style="min-height: 105px;" id="indonesia">Hasil Terjemahan Indonesia</div>
                    </div>
                    <div class="col-6 text-end text-break">
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
    $("#alune").on('keyup', function() {

        // $('#alune').html(nl2br($(this).val()));
        $.ajax({
            url: 'action.php',
            data: {
                otomatis_alune: $('#alune').val(),
            },
            method: 'post',
            beforeSend: function() {
                startTime = new Date();
                $('#waktu_awal').text("Pencarian dimulai pada: " + startTime.toLocaleTimeString());
            },
            success: function(e) {
                $('#indonesia').html(e);
            },
            complete: function() {
                endTime = new Date();
                var elapsedTime = (endTime - startTime) / 1000;
                $('#waktu_akhir').text("Pencarian selesai pada: " + endTime.toLocaleTimeString());
                $('#waktu').text("Lama Pencarian : " + elapsedTime + " Detik");
            }
        });
    });

    $('.disable-height').on('keydown input', function() {
        //Auto-expanding textarea
        this.style.removeProperty('height');
        this.style.height = (this.scrollHeight + 2) + 'px';
    }).on('mousedown focus', '.disable-height', function() {
        //Do this on focus, to allow textarea to animate to height...
        this.style.removeProperty('height');
        this.style.height = (this.scrollHeight + 2) + 'px';
    });
</script>
<?php include 'footer.php' ?>