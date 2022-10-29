<?php createPage(); ?>

<div><a href="./pages.php" class="back-btn">Wróć do wszystkich stron</a></div>
<form action="" method="post" enctype="multipart/form-data" class="add-form">
  <div class="add">
    <label for="pageMetaTitle">Meta-Title</label>
    <input type="text" class="add-input" name="pageMetaTitle">
  </div>
  <div class="add">
    <label for="pageDesc">Meta-Desc</label>
    <input type="text" class="add-input" name="pageDesc">
  </div>
  <div class="add add-select">
    <label for="pageRobots">Meta-Robots</label>
    <select name="pageRobots" class="add-select-wrapper">
      <option value="index, follow">index, follow</option>
      <option value="noindex, follow">noindex, follow</option>
      <option value="index, nofollow">index, nofollow</option>
      <option value="noindex, nofollow">noindex, nofollow</option>
    </select>
  </div>
  <div class="add">
    <label for="pageShortTitle">Skrócona nazwa w menu głównym</label>
    <input type="text" class="add-input" name="pageShortTitle">
  </div>
  <div class="add">
    <label for="pageH1">Nagłówek H1</label>
    <input type="text" class="add-input" name="pageH1">
  </div>
  <div class="add">
    <label for="pageH2">Nagłówek H2</label>
    <input type="text" class="add-input" name="pageH2">
  </div>
  <div class="add add-page-wrapper">
    <label for="pageContent">Dodaj treść</label>
    <textarea name="pageContent"></textarea>
  </div>
  <div class="add">
    <input type="submit" name="createPage" value="Stwórz stronę" class="submit-form">
  </div>
</form>