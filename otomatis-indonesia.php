<?php include 'header.php' ?>
<?php $nav_on = 'kata-indonesia' ?>
<?php include 'navbar.php' ?>
<main id="main">

    <section>
        <div class="container">
            <div class="row text-center">
                <h3 class="fw-bold">TERJEMAHAN OTOMATIS</h3>
                <h3 class="fw-bold">INDONESIA - ALUNE</h3>
            </div>

            <div class="row">
                <div class="row">
                    <div class="col-lg-6">
                        <textarea style="resize: none;" class="form-control disable-height" id="indonesia" rows="4" placeholder="Masukan Bahasa Indonesia"></textarea>
                    </div>
                    <div class="col-lg-6 mt-1">
                        <div class="border border-2 p-2" style="min-height: 105px;" id="alune">Hasil Terjemahan Alune</div>
                    </div>
                </div>
            </div>

        </div>
    </section>

</main>
<script>
    $("#indonesia").on('keyup', function() {

        // $('#alune').html(nl2br($(this).val()));
        $.ajax({
            url: 'action.php',
            data: {
                otomatis_indonesia: $('#indonesia').val(),
            },
            method: 'post',
            success: function(e) {
                $('#alune').html(e);
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