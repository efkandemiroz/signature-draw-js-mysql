<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>JS - Signature - Database Save And Read</title>
</head>
<body>

<h1 class="text-center mb-5 mt-5">JS - İmza - MySQL-Ajax Kaydet ve İmza Sorgula / <a href="https://github.com/efkandemiroz"
                                                                                target="_blank"> Efkan Demiröz </a></h1>

<!-- Optional JavaScript; choose one of the two! -->

<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>

<div class="container">
    <div class="row ml-2 mr-2 bg-white">
        <div class="col-md-6 text-center" style="border-style: groove;">

            <h3 class="card-title mt-2 text-center">İmza 1</h3>
            <input type="hidden" id="servisImzaVeri" name="servisImzaVeri"/>
            <div id="servisImza">

            </div>
            <button type="button" id="butonServisTemizle"
                    class="btn btn-secondary mb-2">İmza Temizle
            </button>

        </div>

        <div class="col-md-6 text-center" style="border-style: groove;">

            <h3 class="card-title mt-2 text-center">İmza 2</h3>
            <input type="hidden" id="yetkiliImzaVeri" name="yetkiliImzaVeri"/>
            <div id="yetkiliImza" name="yetkiliImza">

            </div>
            <button type="button" id="butonMagazaTemizle"
                    class="btn btn-secondary mb-2">İmza Temizle
            </button>
        </div>
        <div id="saveAfter" name="saveAfter">

        </div>
        <hr/>
        <button type="submit" name="btnKaydet" id="btnKaydet"
                class="btn btn-danger btn-block waves-effect waves-light mt-3">
                                <span class="btn-label"><i
                                            class="mdi mdi-check-all"></i></span>KAYDET
        </button>

        <a href="list-signatures.php" id="btnSorgula"
           class="btn btn-warning btn-block waves-effect waves-light mt-3">
                                <span class="btn-label"><i
                                            class="mdi mdi-check-all"></i></span>KAYITLI İMZA LİSTESİ
        </a>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"
        integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script src="js/jSignature.js"></script>
<script src="js/jSignature.CompressorBase30.js"></script>
<script src="js/jSignature.CompressorSVG.js"></script>
<script src="js/jSignature.UndoButton.js"></script>

<script>
    $(document).ready(function () {

        $("#servisImza").jSignature({color: "#02009f", lineWidth: 4, height: 300, width: 500});
        $("#yetkiliImza").jSignature({color: "#000000", lineWidth: 4, height: 300, width: 500});

        $("#butonServisTemizle").click(function () {
            $("#servisImza").jSignature("reset");
        });
        $("#butonMagazaTemizle").click(function () {
            $("#yetkiliImza").jSignature("reset");
        });


        $("#btnKaydet").click(function () {

            $("#servisImzaVeri").val($('#servisImza').jSignature('getData', 'image'));
            $("#yetkiliImzaVeri").val($('#yetkiliImza').jSignature('getData', 'image'));

            $.post('ajax.php',
                {
                    'servisImza': $("#servisImzaVeri").val(),
                    'yetkiliImza': $("#yetkiliImzaVeri").val()
                }, function (response) {
                    $("#saveAfter").html('<div class="alert alert-success mt-5 text-center" role="alert">' +
                        '<h3> İmza Başarıyla Kaydedildi / '+ response+' <h3>' +
                        '</div>');
                    $("#servisImza").jSignature("reset");
                    $("#yetkiliImza").jSignature("reset");
                });
        });
    });


</script>
</body>
</html>