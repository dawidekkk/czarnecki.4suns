<?php

global $connection;

if (isset($_GET['p_id'])) {
  $get_page_id = $_GET['p_id'];
}

$sql = "SELECT * FROM pages WHERE page_id = $get_page_id";
$select_page_by_id = mysqli_query($connection, $sql);

while ($row = mysqli_fetch_assoc($select_page_by_id)) {
  $page_id = $row['page_id'];
  $page_title = $row['page_title'];
  $page_desc = $row['page_desc'];
  $page_name = $row['page_name'];
  $page_h1 = $row['page_h1'];
  $page_h2 = $row['page_h2'];
  $page_content = $row['page_content'];
}

if (isset($_POST['editPage'])) {
  $page_title = $_POST['pageTitle'];
  $page_desc = $_POST['pageDesc'];
  $page_robots = $_POST['pageRobots'];
  $page_name = $_POST['pageName'];
  $page_h1 = $_POST['pageH1'];
  $page_h2 = $_POST['pageH2'];
  $page_content = $_POST['pageContent'];

  $sql = "UPDATE pages SET ";
  $sql .= "page_title = '{$page_title}',";
  $sql .= "page_desc = '{$page_desc}',";
  $sql .= "page_robots = '{$page_robots}',";
  $sql .= "page_name = '{$page_name}',";
  $sql .= "page_h1 = '{$page_h1}',";
  $sql .= "page_h2 = '{$page_h2}',";
  $sql .= "page_content = '{$page_content}' ";
  $sql .= "WHERE page_id = {$get_page_id}";

  // $sql = "UPDATE pages SET page_title = '{$page_title}', page_desc = '{$page_desc}', page_robots = '{$page_robots}', page_name = '{$page_name}', page_h1 = '{$page_h1}', page_h2 = '{$page_h2}', page_content = '{$page_content}' WHERE page_id = {$get_page_id}";

  $edit_page = mysqli_query($connection, $sql);

  // echo ($page_robots);

  confirm($edit_page);
}
?>

<form action="" method="post" enctype="multipart/form-data" class="edit-post">
  <div class="edit-post-wrapper">
    <label for="pageTitle">Meta-Title</label>
    <input type="text" value="<?php echo ($page_title); ?>" class="form-control" name="pageTitle">
  </div>
  <div class="edit-post-wrapper">
    <label for="pageDesc">Meta-Desc</label>
    <input type="text" value="<?php echo ($page_desc); ?>" class="form-control" name="pageDesc">
  </div>
  <div class="add-select">
    <label for="pageRobots">Meta-Robots</label>
    <select name="pageRobots" selected="<?php echo ($page_robots) ?>">
      <option value="index, follow">index, follow</option>
      <option value="noindex, follow">noindex, follow</option>
      <option value="index, nofollow">index, nofollow</option>
      <option value="noindex, nofollow">noindex, nofollow</option>
    </select>
  </div>
  <div class="edit-post-wrapper">
    <label for="pageName">Skrócona nazwa w nawigacji</label>
    <input type="text" value="<?php echo ($page_name); ?>" class="form-control" name="pageName">
  </div>
  <div class="edit-post-wrapper">
    <label for="pageH1">Nagłówek H1</label>
    <input type="text" value="<?php echo ($page_h1); ?>" class="form-control" name="pageH1">
  </div>
  <div class="edit-post-wrapper">
    <label for="pageH2">Nagłówek H2</label>
    <input type="text" value="<?php echo ($page_h2); ?>" class="form-control" name="pageH2">
  </div>
  <div class="edit-post-wrapper">
    <label for="pageContent">Treść</label>
    <textarea name="pageContent" id="tiny" cols="30" rows="10"><?php echo ($page_content); ?></textarea>
  </div>
  <div class="edit-post-wrapper">
    <input type="submit" name="editPage" value="Opublikuj" class="submit-post">
  </div>
</form>