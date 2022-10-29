
<?php

function confirm($result) {
  global $connection;
  if (!$result) {
    die("QUERY FAILED" . mysqli_error($connection));
  }
}

// CATEGORIES
function insertCategories() {
  global $connection;
  if (isset($_POST['submitCat'])) {

    $cat_title = $_POST['cat_title'];

    if ($cat_title == "" || empty($cat_title)) {
      echo 'This field should not be empty';
    } else {
      $sql = "INSERT INTO categories(cat_title) VALUE('{$cat_title}')";
      $create_category_query = mysqli_query($connection, $sql);

      echo "<p class='cat-added'>Kategoria: {$cat_title} dodana pomyślnie. ;)</p>";

      if (!$create_category_query) {
        die("QUERY FAILED!" . mysqli_error($connection));
      }
    }
  }
}

function allCategories() {
  global $connection;
  // FIND ALL CATEGORIES QUERY
  $sql = "SELECT * FROM categories";
  $select_categories = mysqli_query($connection, $sql);

  while ($row = mysqli_fetch_assoc($select_categories)) {
    $cat_id = $row['cat_id'];
    $cat_title = $row['cat_title'];
    echo "
      <div class='table-body'>
        <div class='table-tr'>
          <span class='table-td'>{$cat_id}</span>
          <span class='table-td'>{$cat_title}</span>
          <span class='table-td'><a href='categories.php?edit={$cat_id}'>Edytuj</a></span>
          <span class='table-td'><a href='categories.php?delete={$cat_id}'>Usuń</a></span>
        </div>
      </div>
      ";
  }
}

// SHOW
function showAddBtn($uri, $name) {
  if ($_SERVER['REQUEST_URI'] === "{$uri}") {
    echo '';
  } else {
    echo "<a href='$uri' class='show-add'>$name</a>";
  }
}

function showPostInfo() {
  global $connection;
  $sql = "SELECT * FROM posts";
  $select_posts = mysqli_query($connection, $sql);

  while ($row = mysqli_fetch_assoc($select_posts)) {
    $post_id = $row['post_id'];
    $post_cat_id = $row['post_category_id'];
    $post_title = $row['post_title'];
    $post_author = $row['post_author'];
    $post_date = $row['post_date'];
    $post_image = $row['post_image'];
    $post_tags = $row['post_tags'];

      echo "<div class='table-body'>";
        echo "<div class='table-tr'>";
          echo "<span class='table-td'>{$post_id}</span>";
          $query = "SELECT * FROM categories WHERE cat_id = {$post_cat_id}";
          $select_categories_id = mysqli_query($connection, $query);
          while($row = mysqli_fetch_assoc($select_categories_id)) {
            $cat_title = $row['cat_title'];
          }
          echo "<span class='table-td'>{$cat_title}</span>";
          echo "<span class='table-td'>{$post_author}</span>";
          echo "<span class='table-td'>{$post_title}</span>";
          echo "<span class='table-td'><img src='../style/images/{$post_image}' class='db-img' /></span>";
          echo "<span class='table-td'>{$post_tags}</span>";
          echo "<span class='table-td'>{$post_date}</span>";
          echo "<span class='table-td'><a href='posts.php?source=editpost&p_id={$post_id}'>Edit</a></span>";
          echo "<span class='table-td'><a href='posts.php?delete={$post_id}'>Delete</a></span>";
        echo "</div>";
      echo "</div>";
  }
}

function showPageInfo() {
  global $connection;
  $sql = "SELECT * FROM pages";
  $select_pages = mysqli_query($connection, $sql);

  while ($row = mysqli_fetch_assoc($select_pages)) {
    $page_id = $row['page_id'];
    $page_title = $row['page_title'];
    $page_desc = $row['page_desc'];
    $page_name = $row['page_name'];
    $page_h1 = $row['page_h1'];
    $page_h2 = $row['page_h2'];

    echo "
      <div class='table-body'>
        <div class='table-tr'>
          <span class='table-td'>{$page_id}</span>
          <span class='table-td'>{$page_title}</span>
          <span class='table-td'>{$page_desc}...</span>
          <span class='table-td'>{$page_name}</span>
          <span class='table-td'>{$page_h1}...</span>
          <span class='table-td'>{$page_h2}...</span>
          <span class='table-td'><a href='pages.php?source=editpage&p_id={$page_id}'>Edit</a></span>
          <span class='table-td'><a href='pages.php?delete={$page_id}'>Delete</a></span>
        </div>
      </div>
      ";
  }
}


// CREATE
// function createPost() {
//   global $connection;

//   $errors = ['title' => '', 'author' => '', 'tags' => '', 'content' => ''];

//   if(isset($_POST['createPost'])) {
//     if(empty($_POST['postTitle'])) {
//       $errors['title'] = 'Title jest wymagane!';
//     } 

//     // else {
//     //   if(!preg_match('/[a-zA-Z\s]+$/', $post_title)) {
//     //     $errors['title'] = 'Title musi być odpowiednie!';
//     //   }
//     // }

//     if(empty($_POST['postAuthor'])) {
//       $errors['author'] = 'Autor jest wymagany!';
//     }

//     if(empty($_POST['postTags'])) {
//       $errors['tags'] = 'Autor jest wymagany!';
//     }

//     if(empty($_POST['postContent'])) {
//       $errors['content'] = 'Kontent jest wymagany!';
//     }

//     if (array_filter($errors)) {
//       if($errors['title']) {
//         echo $errors['title'];
//       }
//       if($errors['author']) {
//         echo $errors['author'];
//       }
//       if($errors['tags']) {
//         echo $errors['tags'];
//       }
//       if($errors['content']) {
//         echo $errors['content'];
//       }

//     } else {
//       $post_cat_id = $_POST['postCategory'];
//       $post_title = $_POST['postTitle'];
//       $post_author = $_POST['postAuthor'];
//       $post_image = $_FILES['postImage']['name'];
//       $post_image_temp = $_FILES['postImage']['tmp_name'];
//       $post_tags = $_POST['postTags'];
//       $post_content = $_POST['postContent'];
//       // $post_date = date('d-m-y');
//       $post_comment_count = 4;

//       move_uploaded_file($post_image_temp, "../style/images/$post_image");

//       $sql = "INSERT INTO posts(post_category_id, post_title, post_author, post_date, post_image, post_content, post_tags, post_comment_count) VALUES('{$post_cat_id}','{$post_title}','{$post_author}',now(),'{$post_image}','{$post_content}','{$post_tags}','{$post_comment_count}')";

//       $create_post_query = mysqli_query($connection, $sql);

//       confirm($create_post_query);

//       header("Location: posts.php");
//     }
//   }
// }

function createPage() {
  global $connection;

  $page_title = $page_desc = $page_robots = '';
  $page_short_title = $page_h1 = $page_h2 = $page_content = '';

  $errors = ['title'=>'','desc'=>'','robots'=>'','shortTitle'=>'','h1'=>'','h2'=>'','content'=>''];

  if(isset($_POST['createPage'])) {
    if(empty($_POST['pageMetaTitle'])) {
      echo $errors['title'] = 'Title na stronie jest wymagane!';
    } else {
      $page_title = $_POST['pageMetaTitle'];
    }

    if(empty($_POST['pageDesc'])) {
      echo $errors['desc'] = 'Description na stronie jest wymagane!';
    } else {
      $page_desc = $_POST['pageDesc'];
    }

    if(empty($_POST['pageRobots'])) {
      echo $errors['robots'] = 'Robots na stronie sa wymagane!';
    } else {
      $page_robots = $_POST['pageRobots'];
    }

    if(empty($_POST['pageShortTitle'])) {
      echo $errors['shortTitle'] = 'Tytuł w menu jest wymagane!';
    } else {
      $page_short_title = $_POST['pageShortTitle'];
    }

    if(empty($_POST['pageH1'])) {
      echo $errors['h1'] = 'H1 jest wymagane!';
    } else {
      $page_h1 = $_POST['pageH1'];
    }

    if(empty($_POST['pageH2'])) {
      echo $errors['h2'] = 'H2 jest wymagane!';
    } else {
      $page_h2 = $_POST['pageH2'];
    }

    if(empty($_POST['pageContent'])) {
      echo $errors['content'] = 'Content jest wymagany!';
    } else {
      $page_content = $_POST['pageContent'];
    }

    if(array_filter($errors)) {
      echo 'error in the form!';
    } else {
      $page_title = mysqli_real_escape_string($connection, $page_title);
      $page_desc = mysqli_real_escape_string($connection, $page_desc);
      $page_short_title = mysqli_real_escape_string($connection, $page_short_title);
      $page_h1 = mysqli_real_escape_string($connection, $page_h1);
      $page_h2 = mysqli_real_escape_string($connection, $page_h2);
      $page_content = mysqli_real_escape_string($connection, $page_content);

      $sql = "INSERT INTO pages(page_title, page_desc, page_robots, page_name, page_h1, page_h2, page_content) VALUES('{$page_title}','{$page_desc}','{$page_robots}','{$page_short_title}','{$page_h1}','{$page_h2}','{$page_content}')";

      $create_page_query = mysqli_query($connection, $sql);

      confirm($create_page_query);
      header("Location: pages.php");
    }
  }
}

// CHECK SOURCE
function checkSource() {
  if (isset($_GET['source'])) {
    $source = $_GET['source'];
  } else {
    $source = '';
  }

  switch ($source) {

    case 'addpost';
      include("./addpost.php");
      break;
    case 'editpost';
      include("./editpost.php");
    default:
      include("./viewallposts.php");
      break;
  }
}

function checkPageSource() {
  if (isset($_GET['source'])) {
    $source = $_GET['source'];
  } else {
    $source = '';
  }

  switch ($source) {

    case 'addpage';
      include("./addpage.php");
      break;
    case 'editpage';
      include("./editpage.php");
    default:
      include("./viewallpages.php");
      break;
  }
}



// SELECT
function selectOption() {
  global $connection;
  $sql = "SELECT * FROM categories";
  $select_categories = mysqli_query($connection, $sql);

  confirm($select_categories);

  while ($row = mysqli_fetch_assoc($select_categories)) {
    $cat_id = $row['cat_id'];
    $cat_title = $row['cat_title'];

    echo "<option value='{$cat_id}'>{$cat_title}</option>";
  }
}

function selectFromCategories() {
  global $connection;
  $sql = "SELECT * FROM categories";
  $select_categories = mysqli_query($connection, $sql);
  confirm($select_categories);
  while ($row = mysqli_fetch_assoc($select_categories)) {
    $cat_id = $row['cat_id'];
    $cat_title = $row['cat_title'];
    echo "<option value='{$cat_id}'>{$cat_title}</option>";
  }
}


// DELETE
function deletePost() {
  global $connection;
  if (isset($_GET['delete'])) {
    $post_id = $_GET['delete'];
    $sql = "DELETE FROM posts WHERE post_id = $post_id";
    mysqli_query($connection, $sql);
    header('Location: ./posts.php');
  }
}

function deletePage() {
  global $connection;
  if (isset($_GET['delete'])) {
    $page_id = $_GET['delete'];
    $sql = "DELETE FROM pages WHERE page_id = $page_id";
    mysqli_query($connection, $sql);
    header("Location: pages.php");
  }
}

function deleteCategory() {
  global $connection;
  // DELETE QUERY
  if (isset($_GET['delete'])) {
    $get_cat_id = $_GET['delete'];
    $sql_delete = "DELETE FROM categories WHERE cat_id = {$get_cat_id}";
    mysqli_query($connection, $sql_delete);
    header("Location: categories.php"); // refresh the page after delete
  }
}




?>