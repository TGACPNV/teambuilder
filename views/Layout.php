<?php
require_once $headerPath;
//require "View\Components\Footer.php";
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <?php if(isset($pageTitle)): ?>
    <title>TeamBuilder - <?=$pageTitle ?></title>
    <?php endif; ?>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- CSS only -->

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link rel="stylesheet" href="views/styles/CSS/global.css">

    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.js" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/3f7b822457.js" crossorigin="anonymous"></script>
</head>
<body>
<!-- HEADER -->
    <?= $header; ?>
<!--  /HEADER -->

<!-- Page Content -->

<main>
    <?= $contenu; ?>
</main>
<!-- /.container -->
<!-- FOOTER
 /FOOTER -->

</body>
</html>
