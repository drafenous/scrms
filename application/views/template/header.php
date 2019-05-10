<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <title><?= $page_title ?> - Sample CRM</title>
    <!-- meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="theme-color" content="#000000">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <meta name="msapplication-navbutton-color" content="#000000">

    <!-- CSS -->
    <link rel="stylesheet" href="<?= base_url('node_modules\bootstrap\dist\css\bootstrap.min.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('node_modules\@fortawesome\fontawesome-free\css\all.min.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('node_modules\tempusdominus-bootstrap-4\build\css\tempusdominus-bootstrap-4.min.css'); ?>">

    <!-- Datatables -->
    <link rel="stylesheet" href="<?= base_url('node_modules\datatables.net-bs4\css\dataTables.bootstrap4.min.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('node_modules\datatables.net-autofill-bs4\css\autoFill.bootstrap4.min.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('node_modules\datatables.net-buttons-bs4\css\buttons.bootstrap4.min.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('node_modules\datatables.net-colreorder-bs4\css\colReorder.bootstrap4.min.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('node_modules\datatables.net-fixedcolumns-bs4\css\fixedColumns.bootstrap4.min.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('node_modules\datatables.net-fixedheader-bs4\css\fixedHeader.bootstrap4.min.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('node_modules\datatables.net-keytable-bs4\css\keyTable.bootstrap4.min.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('node_modules\datatables.net-responsive-bs4\css\responsive.bootstrap4.min.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('node_modules\datatables.net-rowgroup-bs4\css\rowGroup.bootstrap4.min.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('node_modules\datatables.net-rowreorder-bs4\css\rowReorder.bootstrap4.min.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('node_modules\datatables.net-scroller-bs4\css\scroller.bootstrap4.min.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('node_modules\datatables.net-select-bs4\css\select.bootstrap4.min.css'); ?>">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="<?= base_url('assets\src\css\custom.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets\src\css\styles.css'); ?>">

    <!-- Chart JS -->
    <link rel="stylesheet" href="<?= base_url('node_modules\chart.js\dist\Chart.min.css'); ?>">

    <!-- JS -->
    <script src="<?= base_url('node_modules\jquery\dist\jquery.min.js'); ?>"></script>
    <script src="<?= base_url('node_modules\popper.js\dist\umd\popper.min.js'); ?>"></script>
    <script src="<?= base_url('node_modules\bootstrap\dist\js\bootstrap.min.js'); ?>"></script>
    <script src="<?= base_url('node_modules\@fortawesome\fontawesome-free\js\all.min.js'); ?>"></script>
    <script src="<?= base_url('node_modules\moment\min\moment-with-locales.min.js'); ?>"></script>
    <script src="<?= base_url('node_modules\tempusdominus-bootstrap-4\build\js\tempusdominus-bootstrap-4.min.js'); ?>"></script>
    <script src="<?= base_url('assets\src\js\custom-header.js'); ?>"></script>
</head>

<body>
    <div id="header">
        SCRMS - Sample CRM System.
    </div>
    <div class="row">