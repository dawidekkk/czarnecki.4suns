<?php

global $connection;

if (isset($_GET['p_id'])) {
  $get_post_id = $_GET['p_id'];
}

$sql = "SELECT * FROM posts WHERE post_id = $get_post_id";
$select_posts_by_id = mysqli_query($connection, $sql);

while ($row = mysqli_fetch_assoc($select_posts_by_id)) {
  $post_id = $row['post_id'];
  $post_category_id = $row['post_category_id'];
  $post_title = $row['post_title'];
  $post_meta_title = $row['post_meta_title'];
  $post_meta_desc = $row['post_meta_desc'];
  $post_author = $row['post_author'];
  $post_date = $row['post_date'];
  $post_image = $row['post_image'];
  $post_image_temp = $row['post_image'];
  $post_content = $row['post_content'];
  $post_tags = $row['post_tags'];
  $post_comment_count = $row['post_comment_count'];
  $post_status = $row['post_status'];
}

if (isset($_POST['editPost'])) {
  $post_title = $_POST['postTitle'];
  $post_cat = $_POST['postCategory'];
  $post_meta_title = $_POST['postMetaTitle'];
  $post_meta_desc = $_POST['postMetaDesc'];
  $post_author = $_POST['postAuthor'];
  $post_image = $_FILES['postImage']['name'];
  $post_image_temp = $_FILES['postImage']['tmp_name'];
  $post_tags = $_POST['postTags'];
  $post_content = $_POST['postContent'];

  move_uploaded_file($post_image_temp, "../style/images/$post_image");

  if (empty($post_image)) {
    $sql = "SELECT * FROM posts WHERE post_id = $get_post_id";
    $select_image = mysqli_query($connection, $sql);

    while ($row = mysqli_fetch_array($select_image)) {
      $post_image = $row['post_image'];
    }
  }

  $sql = "UPDATE posts SET ";
  $sql .= "post_title = '{$post_title}', ";
  $sql .= "post_category_id = '{$post_cat}', ";
  $sql .= "post_meta_title = '{$post_meta_title}', ";
  $sql .= "post_meta_desc = '{$post_meta_desc}', ";
  $sql .= "post_date = now(), ";
  $sql .= "post_author = '{$post_author}', ";
  $sql .= "post_tags = '{$post_tags}', ";
  $sql .= "post_content = '{$post_content}', ";
  $sql .= "post_image = '{$post_image}' ";
  $sql .= "WHERE post_id = {$get_post_id} ";

  $edit_post = mysqli_query($connection, $sql);

  confirm($edit_post);

  header("Location: posts.php");
}
?>

<form action="" method="post" enctype="multipart/form-data" class="edit-post">
  <div class="edit-post-wrapper">
    <label for="postTitle">Tytuł postu</label>
    <input type="text" value="<?php echo ($post_title); ?>" class="form-control" name="postTitle">
  </div>
  <div class="edit-post-wrapper">
    <label for="postCategory">Wybierz kategorie:</label>
    <select name="postCategory" class="edit-post-wrapper-select">
      <?php
      $sql = "SELECT * FROM categories";
      $select_categories = mysqli_query($connection, $sql);
      confirm($select_categories);
      while ($row = mysqli_fetch_assoc($select_categories)) {
        $cat_id = $row['cat_id'];
        $cat_title = $row['cat_title'];
        echo "<option value='{$cat_id}'>{$cat_title}</option>";
      }

      ?>
    </select>
  </div>
  <div>
    <!-- <div class="edit-post-wrapper">
      <label for="postCategoryId">Id kategorii</label>
      <input type="text" value="<?php echo ($post_category_id); ?>" class="form-control" name="postCategoryId">
    </div> -->
    <div class="edit-post-wrapper">
      <label for="postMetaTitle">Meta-Title</label>
      <input type="text" value="<?php echo ($post_meta_title); ?>" class="form-control" name="postMetaTitle">
    </div>
    <div class="edit-post-wrapper">
      <label for="postMetaDesc">Meta-Desc</label>
      <input type="text" value="<?php echo ($post_meta_desc); ?>" class="form-control" name="postMetaDesc">
    </div>
    <div class="edit-post-wrapper">
      <label for="postAuthor">Autor</label>
      <input type="text" value="<?php echo ($post_author); ?>" class="form-control" name="postAuthor">
    </div>
    <div class="edit-post-wrapper">
      <label for="postImage">Zdjęcie</label>
      <input type="file" name="postImage" width="100" src="../style/images/<?php echo ($post_image); ?>" alt="">
    </div>
    <div class="edit-post-wrapper">
      <label for="postTags">Tagi</label>
      <input type="text" value="<?php echo ($post_tags); ?>" class="form-control" name="postTags">
    </div>
    <div class="edit-post-wrapper">
      <label for="postContent">Kontent</label>
      <textarea name="postContent" class="form-control-area" id="" cols="30" rows="10"><?php echo ($post_content); ?></textarea>
    </div>
    <div class="edit-post-wrapper">
      <input type="submit" name="editPost" value="Opublikuj" class="submit-post">
    </div>
  </div>
</form>