<?php


     try {
          $db = new PDO("mysql:host=localhost;dbname=draw-db;charset=utf8", 'root', '');
     } catch (PDOException $e) {
          echo $e->getMessage();
     }

     define('base_url', 'http://localhost:8080/signature-draw');
     date_default_timezone_set('Europe/Istanbul');


     ob_start();
     session_start();
     error_reporting(0);
