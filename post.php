<!DOCTYPE html>
<html lang="pl">
<?php include("./templates/functions.php") ?>
<?php include("./config/db_conn.php") ?>
<?php session_start(); ?>
<?php changeMetaPost(); ?>

<body>
  <div id="root">
    <div class="pattern"></div>
    <header class="header">
      <?php include("./templates/menu.php") ?>
    </header>
    <?php include("./postcontent.php") ?>
    <?php include("./templates/footer.php") ?>

</html>