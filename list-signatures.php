<?php
     include "database/conn.php";

     // Signatures
     $querySignatures = $db->prepare('select * from table_draw');
     $querySignatures->execute([]);
     $signatures = $querySignatures->fetchAll(PDO::FETCH_ASSOC);

     if (isset($_GET['signature_id'])){
         $id = $_GET['signature_id'];

          $querySignature = $db->prepare('select * from table_draw where id = ?');
          $querySignature->execute([$id]);
          $signature = $querySignature->fetch(PDO::FETCH_ASSOC);
     }
?>
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
        <div class="col-md-2 ">

            <h3 class="card-title mt-2 text-center">Kayıtlı İmzalar</h3>
           <hr>
            <div class="list-group">
                 <?php foreach ($signatures as $sign): ?>
                <a href="list-signatures.php?signature_id=<?= $sign['id']?>" class="list-group-item list-group-item-action"><?= $sign['save_date']?></a>
                <?php endforeach; ?>
            </div>
        </div>

        <div class="col-md-5 text-center" style="border-style: groove;">

            <h3 class="card-title mt-2 text-center">İmza 1</h3>
            <img id="servisImzaGrafik"  class="img-fluid img-thumbnail"/>

        </div>

        <div class="col-md-5 text-center" style="border-style: groove;">

            <h3 class="card-title mt-2 text-center">İmza 2</h3>

            <img id="magazaImzaGrafik"  class="img-fluid img-thumbnail" />
        </div>
        <div id="saveAfter" name="saveAfter">

        </div>
        <hr/>


        <a href="index.php" id="btnSorgula"
           class="btn btn-success btn-block waves-effect waves-light mt-3 mb-5">
                                <span class="btn-label"><i
                                            class="mdi mdi-check-all"></i></span>İmza Ekle
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

         <?php   if (isset($_GET['signature_id'])){ ?>
        let imzaVeriServis = '<?= $signature['signature_1'] ?>'; //$('#servisImzaVeri').val();
        $('#servisImzaGrafik').attr('src', 'data:' + imzaVeriServis);
        // MAĞAZA
        let imzaVeriMagaza = '<?= $signature['signature_2'] ?>'; //$('#servisImzaVeri').val();
        $('#magazaImzaGrafik').attr('src', 'data:' + imzaVeriMagaza);
         <?php  } ?>

    });


</script>
</body>
</html>