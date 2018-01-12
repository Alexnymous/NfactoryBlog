<?php
session_start();
include_once ("./functions/callPage.php");
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="./assets/css/screen.css" type="text/css" rel="stylesheet" />
    <title>Blog</title>
    <script type="text/javascript" src="./assets/javascript/functions.js"></script>
    <link rel="stylesheet" href="node_modules/trumbowyg/dist/ui/trumbowyg.min.css">
</head>
<body>
<div id="container">
<?php include_once("./include/header.php");?>
<main>
<?php
callPage();
?>
</main>
<?php include_once("./include/footer.php");?>
</div>
</body>
<script src="//ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="js/vendor/jquery-3.2.1.min.js"><\/script>')</script>
<script src="node_modules/trumbowyg/dist/trumbowyg.min.js"></script>
</html>