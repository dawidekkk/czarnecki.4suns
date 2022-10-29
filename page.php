<?php include("./templates/functions.php") ?>
<?php include("./config/db_conn.php") ?>
<?php session_start(); ?>
<?php changeMeta(); ?>

<body>
  <div id="root">
    <div class="pattern"></div>
    <header class="header">
      <?php include("./templates/menu.php") ?>
    </header>
    <div class="page-wrapper">
      <?php showPageH1(); ?>
      <main class="blog-wrapper">
        <?php showPageContent(); ?>
      </main>
      <div class="widgets-wrapper">
        <?php include("./templates/sidebar.php") ?>
        <?php include("./templates/newsletter.php") ?>
        <?php include("./templates/widget.php") ?>
      </div>
    </div>
    <?php include("./templates/footer.php") ?>
</body>