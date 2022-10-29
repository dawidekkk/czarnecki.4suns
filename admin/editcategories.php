<form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" class="edit-categories">
  <div class="edit-categories-wrapper">
    <label for="cat-title">Edytuj kategoriee: <?php if (isset($cat_title)) {
                                                echo $cat_title;
                                              } ?></label>
    <?php
    if (isset($_GET['edit'])) {
      $cat_id = $_GET['edit'];
      $sql = "SELECT * FROM categories WHERE cat_id = $cat_id";
      $select_categories_id = mysqli_query($connection, $sql);
      while ($row = mysqli_fetch_assoc($select_categories_id)) {
        $cat_id = $row['cat_id'];
        $cat_title = $row['cat_title'];

    ?>
        <input type="text" value="<?php if (isset($cat_title)) {
                                    echo $cat_title;
                                  } ?>" class="edit-categories-input" name="cat_title">
    <?php
      }
    }
    ?>

    <?php
    // UPDATE QUERY
    if (isset($_POST['submitEdit'])) {
      $edit_cat_title = $_POST['cat_title'];
      $sql_edit = "UPDATE categories SET cat_title = '$edit_cat_title' WHERE cat_id = {$cat_id}";
      $edit_query = mysqli_query($connection, $sql_edit);

      if (!$edit_query) {
        die('QUERY FAILED' . mysqli_error($connection));
      }
    }
    ?>
  </div>
  <div>
    <input type="submit" class="edit-categories-submit" name="submitEdit" value="Edytuj kategorie">
  </div>
</form>