<!DOCTYPE html>
<html lang="pl">

<?php include("./header.php") ?>
<?php include("./dashboard.php") ?>
<?php showAddBtn("/admin/posts.php?source=addpost", "Dodaj post") ?>
<?php checkSource(); ?>
<?php include("./footer.php") ?>

</html>