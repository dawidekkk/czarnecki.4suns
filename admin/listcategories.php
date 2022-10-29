<?php
// EDIT AND INCLUDE QUERY
if (isset($_GET['edit'])) {
  $cat_id = $_GET['edit'];

  include("./editcategories.php");
}

?>

<div class="view-all">
  <div class="db-table">
    <div class="table-head">
      <div class="table-tr">
        <span class="table-th">Id</span>
        <span class="table-th">Tytuł kategorii</span>
        <span class="table-th">Edytuj</span>
        <span class="table-th">Usuń</span>
      </div>
    </div>
    <?php allCategories(); ?>
    <?php deleteCategory(); ?>
  </div>
</div>