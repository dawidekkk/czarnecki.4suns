<?php session_start(); ?>
<!DOCTYPE html>
<html lang="pl">
<?php include("./templates/header.php") ?>
<div class="page-wrapper">
  <h1 class="h1">Blog</h1>
  <main class="blog-wrapper">
    <?php showAllPosts(); ?>
  </main>
  <div class="widgets-wrapper">
    <?php include("./templates/sidebar.php") ?>
    <?php include("./templates/newsletter.php") ?>
    <?php include("./templates/widget.php") ?>
  </div>
</div>
<?php include("./templates/footer.php") ?>

</html>