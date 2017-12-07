<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<html>

<head>
    <!-- Standard Meta -->
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <meta name="theme-color" content="#3993bf">

    <!-- Site Properties -->
    <link rel="apple-touch-icon" sizes="180x180" href="<?= base_url("assets/favicon/apple-touch-icon.png"); ?>">
    <link rel="icon" type="image/png" sizes="32x32" href="<?= base_url("assets/favicon/favicon-32x32.png"); ?>">
    <link rel="icon" type="image/png" sizes="16x16" href="<?= base_url("assets/favicon/favicon-16x16.png"); ?>">
    <link rel="mask-icon" href="<?= base_url("assets/favicon/safari-pinned-tab.svg"); ?>" color="#3993bf">
    <link rel="manifest" href="<?= base_url("assets/favicon/manifest.json"); ?>">
    <title><?= $title ?> | Lecture CodeRealm</title>
    <link rel="stylesheet" type="text/css" href="<?= base_url("assets/css/semantic.min.css"); ?>">
    <link rel="stylesheet" type="text/css" href="<?= base_url("assets/css/jquery.dataTables.min.css"); ?>">
    <link rel="stylesheet" type="text/css" href="<?= base_url("assets/css/lecture.css"); ?>">
</head>

<body>
    <div class="pusher">
        <?php include 'lecture/partials/header.php'; ?>

        <?= $body; ?>

    </div>

    <script src="<?= base_url("assets/js/jquery.min.js"); ?>"></script>
    <script src="<?= base_url("assets/js/semantic.min.js"); ?>"></script>
    <script src="<?= base_url("assets/js/jquery.dataTables.min.js"); ?>"></script>
    <script src="<?= base_url("assets/js/dataTables.semanticui.min.js"); ?>"></script>
    <script src="<?= base_url("assets/js/Chart.min.js"); ?>"></script>
    <script src="<?= base_url("assets/js/moment.js"); ?>"></script>
    <script src="<?= base_url("assets/js/lecture.js"); ?>"></script>
</body>

</html>