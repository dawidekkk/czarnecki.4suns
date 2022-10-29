<!DOCTYPE html>
<html lang="pl">

<?php include("./header.php") ?>
<?php include("./dashboard.php") ?>
<?php showAddBtn("/admin/pages.php?source=addpage", "Dodaj stronę") ?>
<?php checkPageSource(); ?>
<?php include("./footer.php") ?>

</html>