<?php session_start(); ?>
<?php

global $connection;

$post_title = $post_author = $post_tags = $post_content = '';
$post_meta_title = $post_meta_desc = '';

$errors = ['title' => '', 'author' => '', 'tags' => '', 'content' => '', 'metaTitle'=>'','metaDesc'=>''];

if (isset($_POST['createPost'])) {
  if (empty($_POST['postTitle'])) {
    $errors['title'] = 'Title jest wymagane!';
  }

  if (empty($_POST['postMetaTitle'])) {
    $errors['metaTitle'] = 'Meta Title jest wymagane!';
  }

  if (empty($_POST['postMetaDesc'])) {
    $errors['metaDesc'] = 'Meta desc jest wymagane!';
  }

  if (empty($_POST['postAuthor'])) {
    $errors['author'] = 'Autor jest wymagany!';
  }

  if (empty($_POST['postTags'])) {
    $errors['tags'] = 'Autor jest wymagany!';
  }

  if (empty($_POST['postContent'])) {
    $errors['content'] = 'Kontent jest wymagany!';
  }

  if (array_filter($errors)) {
    // echo 'error in the form!';
  } else {
    $post_cat_id = $_POST['postCategory'];
    $post_title = $_POST['postTitle'];
    $post_meta_title = $_POST['postMetaTitle'];
    $post_meta_desc = $_POST['postMetaDesc'];
    $post_author = $_POST['postAuthor'];
    $post_image = $_FILES['postImage']['name'];
    $post_image_temp = $_FILES['postImage']['tmp_name'];
    $post_tags = $_POST['postTags'];
    $post_content = $_POST['postContent'];
    $post_comment_count = 0;

    move_uploaded_file($post_image_temp, "../style/images/$post_image");

    $sql = "INSERT INTO posts(post_category_id, post_title, post_meta_title, post_meta_desc, post_author, post_date, post_image, post_content, post_tags, post_comment_count) VALUES('{$post_cat_id}','{$post_title}','{$post_meta_title}','{$post_meta_desc}','{$post_author}',now(),'{$post_image}','{$post_content}','{$post_tags}','{$post_comment_count}')";

    $create_post_query = mysqli_query($connection, $sql);

    confirm($create_post_query);

    header("Location: posts.php");
  }
}
?>

<div><a href="./posts.php" class="back-btn">Wróć do wszystkich postów</a></div>
<form action="" method="post" enctype="multipart/form-data" class="add-form">
  <h2 class="<?php if(array_filter($errors)) { echo 'so-red'; } ?>"><?php if(array_filter($errors)) { echo 'W formularzu jest error!'; } ?></h2>
  <div class="add">
    <label for="postTitle" class="<?php if($errors['title']) { echo 'so-red'; } ?>">Tytuł artykułu blogowego:</label>
    <input type="text" class="add-input" name="postTitle" value="<?php htmlspecialchars($post_title); ?>" >
    <div class="<?php if($errors['title']) { echo 'so-red'; } ?>"><?php if($errors['title']) { echo 'Title jest wymagane!'; } ?></div>
  </div>
  <div class="add">
    <label for="postCategory">Wybierz kategorie:</label>
    <select name="postCategory" class="edit-post-wrapper-select">
      <?php selectFromCategories(); ?>
    </select>
  </div>
  <div class="add">
    <label for="postMetaTitle">Post Meta-Title</label>
    <input type="text" class="add-input" name="postMetaTitle">
  </div>
  <div class="add">
    <label for="postMetaDesc">Post Meta-Desc</label>
    <input type="text" class="add-input" name="postMetaDesc">
  </div>
  <div class="add">
    <label for="postAuthor" class="<?php if($errors['author']) { echo 'so-red'; } ?>">Autor:</label>
    <input type="text" class="add-input" name="postAuthor" value="<?php htmlspecialchars($post_author); ?>">
    <div class="<?php if($errors['author']) { echo 'so-red'; } ?>"><?php if($errors['author']) { echo 'Autor jest wymagany!'; } ?></div>
  </div>
  <div class="add">
    <label for="postImage">Zdjęcie:</label>
    <input type="file" name="postImage" class="post-image">
  </div>
  <div class="add">
    <label for="postTags" class="<?php if($errors['tags']) { echo 'so-red'; } ?>">Tagi:</label>
    <input type="text" class="add-input" name="postTags" value="<?php htmlspecialchars($post_tags); ?>" placeholder="JavaScript, Java, C++, PHP">
    <div class="<?php if($errors['tags']) { echo 'so-red'; } ?>"><?php if($errors['tags']) { echo 'Tagi sa wymagane!'; } ?></div>
  </div>
  <div class="add">
    <label for="postContent" class="<?php if($errors['content']) { echo 'so-red'; } ?>">Treść</label>
    <textarea name="postContent" id="textarea" class="textarea" value="<?php htmlspecialchars($post_content); ?>"></textarea>
    <div class="<?php if($errors['content']) { echo 'so-red'; } ?>"><?php if($errors['content']) { echo 'Treść jest wymagana!'; } ?></div>
  </div>
  <div class="add">
    <input type="submit" name="createPost" value="Opublikuj" class="submit-form">
  </div>
</form>