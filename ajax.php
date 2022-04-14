<?php

     include "database/conn.php";
     if (isset($_POST['servisImza'])) {
          $servisImza = $_POST['servisImza'];
          $yetkiliImza = $_POST['yetkiliImza'];

          $insertQuery = $db->prepare('insert into table_draw set signature_1 = ? , signature_2 = ?');
          $insertQuery->execute([$servisImza, $yetkiliImza]);

          $insert = $insertQuery->fetch(PDO::FETCH_ASSOC);
          echo date("d-m-Y h:i:sa");
     }