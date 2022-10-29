<?php

function postDetails() {
  global $connection;

  $get_id = $_GET['id'];
  $sql = "SELECT * FROM posts WHERE post_id = $get_id";
  $select_specify_post = mysqli_query($connection, $sql);
  while ($row = mysqli_fetch_assoc($select_specify_post)) {
    $post_category_id = $row['post_category_id'];
    $post_title = $row['post_title'];
    $post_author = $row['post_author'];
    $post_date = $row['post_date'];
    $post_image = $row['post_image'];
    $post_content = $row['post_content'];
    $post_tag = $row['post_tags'];
    $post_comment = $row['post_comment_count'];

    $query = "SELECT * FROM categories WHERE cat_id = $post_category_id";
    $categories_result = mysqli_query($connection, $query);
    while ($row_cat = mysqli_fetch_assoc($categories_result)) {
      $cat_title = $row_cat['cat_title'];
    }

    echo "
      <div class='blog-content'>
        <h2 class='blog-title'>$post_title</h2>
          <div class='blog-info'>
          <p><svg viewBox='0 0 512 512' width='16' height='16' fill='#9ac4e9'>
              <path d='M490.3 40.4C512.2 62.27 512.2 97.73 490.3 119.6L460.3 149.7L362.3 51.72L392.4 21.66C414.3-.2135 449.7-.2135 471.6 21.66L490.3 40.4zM172.4 241.7L339.7 74.34L437.7 172.3L270.3 339.6C264.2 345.8 256.7 350.4 248.4 353.2L159.6 382.8C150.1 385.6 141.5 383.4 135 376.1C128.6 370.5 126.4 361 129.2 352.4L158.8 263.6C161.6 255.3 166.2 247.8 172.4 241.7V241.7zM192 63.1C209.7 63.1 224 78.33 224 95.1C224 113.7 209.7 127.1 192 127.1H96C78.33 127.1 64 142.3 64 159.1V416C64 433.7 78.33 448 96 448H352C369.7 448 384 433.7 384 416V319.1C384 302.3 398.3 287.1 416 287.1C433.7 287.1 448 302.3 448 319.1V416C448 469 405 512 352 512H96C42.98 512 0 469 0 416V159.1C0 106.1 42.98 63.1 96 63.1H192z' />
            </svg>Autor: {$post_author}</p>
          <p><svg viewBox='0 0 512 512' width='16' height='16' fill='#9ac4e9'>
              <path d='M256 32C114.6 32 .0272 125.1 .0272 240c0 49.63 21.35 94.98 56.97 130.7c-12.5 50.37-54.27 95.27-54.77 95.77c-2.25 2.25-2.875 5.734-1.5 8.734C1.979 478.2 4.75 480 8 480c66.25 0 115.1-31.76 140.6-51.39C181.2 440.9 217.6 448 256 448c141.4 0 255.1-93.13 255.1-208S397.4 32 256 32z' />
            </svg>Komentarze: {$post_comment}</p>
          <p><svg viewBox='0 0 512 512' width='16' height='16' fill='#9ac4e9'>
              <path d='M512 144v288c0 26.5-21.5 48-48 48h-416C21.5 480 0 458.5 0 432v-352C0 53.5 21.5 32 48 32h160l64 64h192C490.5 96 512 117.5 512 144z' />
            </svg>Tagi: {$post_tag}</p>
          <p><svg viewBox='0 0 512 512' width='16' height='16' fill='#9ac4e9'>
              <path d='M512 144v288c0 26.5-21.5 48-48 48h-416C21.5 480 0 458.5 0 432v-352C0 53.5 21.5 32 48 32h160l64 64h192C490.5 96 512 117.5 512 144z' />
            </svg>Kategoria: {$cat_title}</p>
          <p><svg viewBox='0 0 448 512' width='16' height='16' fill='#9ac4e9'>
              <path d='M96 32C96 14.33 110.3 0 128 0C145.7 0 160 14.33 160 32V64H288V32C288 14.33 302.3 0 320 0C337.7 0 352 14.33 352 32V64H400C426.5 64 448 85.49 448 112V160H0V112C0 85.49 21.49 64 48 64H96V32zM448 464C448 490.5 426.5 512 400 512H48C21.49 512 0 490.5 0 464V192H448V464z' />
            </svg>{$post_date}</p>
        </div>
        <div class='img-wrapper'>
          <img class='img' src='../style/images/{$post_image}'>
        </div>
        <p class='blog-text'>{$post_content}</p>
      </div>
    ";
  }
}


function showAllPosts() {
  global $connection;

  // if (isset($_GET['pager'])) {
  //   $single_page = $_GET['pager'];
  // } else {
  //   $single_page = "";
  // }

  // if ($single_page = "" || $single_page == 1) {
  //   $pager_1 = 0;
  // } else {
  //   $pager_1 = ($single_page * 2) - 2;
  // }

  // $sql = "SELECT * FROM posts LIMIT $pager_1, 2";
  $sql = "SELECT * FROM posts";
  $select_all_posts_result = mysqli_query($connection, $sql);
  while ($row = mysqli_fetch_assoc($select_all_posts_result)) {
    $post_id = $row['post_id'];
    $post_category_id = $row['post_category_id'];
    $post_title = $row['post_title'];
    $post_author = $row['post_author'];
    $post_date = $row['post_date'];
    $post_image = $row['post_image'];
    $post_content = $row['post_content'];
    $post_tag = $row['post_tags'];
    $post_comment = $row['post_comment_count'];

    if (strlen($post_content) > 180) {
      $sub = substr($post_content, 0, 180);
    }

    $query = "SELECT * FROM categories WHERE cat_id = $post_category_id";
    $categories_result = mysqli_query($connection, $query);
    while ($row_cat = mysqli_fetch_assoc($categories_result)) {
      $cat_title = $row_cat['cat_title'];
    }

    echo "
      <div class='blog-content'>
        <h2><a href='./post.php?id={$post_id}'>{$post_title}</a></h2>
        <div class='blog-info'>
          <p><svg viewBox='0 0 512 512' width='16' height='16' fill='#9ac4e9'>
              <path d='M490.3 40.4C512.2 62.27 512.2 97.73 490.3 119.6L460.3 149.7L362.3 51.72L392.4 21.66C414.3-.2135 449.7-.2135 471.6 21.66L490.3 40.4zM172.4 241.7L339.7 74.34L437.7 172.3L270.3 339.6C264.2 345.8 256.7 350.4 248.4 353.2L159.6 382.8C150.1 385.6 141.5 383.4 135 376.1C128.6 370.5 126.4 361 129.2 352.4L158.8 263.6C161.6 255.3 166.2 247.8 172.4 241.7V241.7zM192 63.1C209.7 63.1 224 78.33 224 95.1C224 113.7 209.7 127.1 192 127.1H96C78.33 127.1 64 142.3 64 159.1V416C64 433.7 78.33 448 96 448H352C369.7 448 384 433.7 384 416V319.1C384 302.3 398.3 287.1 416 287.1C433.7 287.1 448 302.3 448 319.1V416C448 469 405 512 352 512H96C42.98 512 0 469 0 416V159.1C0 106.1 42.98 63.1 96 63.1H192z' />
            </svg>Autor: {$post_author}</p>
          <p><svg viewBox='0 0 512 512' width='16' height='16' fill='#9ac4e9'>
              <path d='M256 32C114.6 32 .0272 125.1 .0272 240c0 49.63 21.35 94.98 56.97 130.7c-12.5 50.37-54.27 95.27-54.77 95.77c-2.25 2.25-2.875 5.734-1.5 8.734C1.979 478.2 4.75 480 8 480c66.25 0 115.1-31.76 140.6-51.39C181.2 440.9 217.6 448 256 448c141.4 0 255.1-93.13 255.1-208S397.4 32 256 32z' />
            </svg>Komentarze: {$post_comment}</p>
          <p><svg viewBox='0 0 512 512' width='16' height='16' fill='#9ac4e9'>
              <path d='M512 144v288c0 26.5-21.5 48-48 48h-416C21.5 480 0 458.5 0 432v-352C0 53.5 21.5 32 48 32h160l64 64h192C490.5 96 512 117.5 512 144z' />
            </svg>Tagi: {$post_tag}</p>
          <p><svg viewBox='0 0 448 512' width='16' height='16' fill='#9ac4e9'>
              <path d='M96 32C96 14.33 110.3 0 128 0C145.7 0 160 14.33 160 32V64H288V32C288 14.33 302.3 0 320 0C337.7 0 352 14.33 352 32V64H400C426.5 64 448 85.49 448 112V160H0V112C0 85.49 21.49 64 48 64H96V32zM448 464C448 490.5 426.5 512 400 512H48C21.49 512 0 490.5 0 464V192H448V464z' />
            </svg>Kategoria: {$cat_title}</p>
          <p><svg viewBox='0 0 448 512' width='16' height='16' fill='#9ac4e9'>
              <path d='M96 32C96 14.33 110.3 0 128 0C145.7 0 160 14.33 160 32V64H288V32C288 14.33 302.3 0 320 0C337.7 0 352 14.33 352 32V64H400C426.5 64 448 85.49 448 112V160H0V112C0 85.49 21.49 64 48 64H96V32zM448 464C448 490.5 426.5 512 400 512H48C21.49 512 0 490.5 0 464V192H448V464z' />
            </svg>{$post_date}</p>
        </div>
        <a href='./post.php?id={$post_id}' class='img-wrapper'><img class='img' src='../style/images/$post_image'></a>
        <p class='blog-text'>{$sub}...</p>
        <div class='read-more_wrapper'>
          <a href='./post.php?id={$post_id}' class='read-more_btn'>CZYTAJ WIĘCEJ...</a>
        </div>
      </div>
    ";
  }
}


function showPagination() {
  global $connection;
  $post_query_count = "SELECT * FROM posts";
  $find_count = mysqli_query($connection, $post_query_count);
  $count = mysqli_num_rows($find_count);
  $count = ceil($count / 2);

  echo "<ul>";
  for ($i = 1; $i <= $count; $i++) {
    echo "<li><a href='?pager={$i}'>{$i}</a></li>";
  }
  echo "</ul>";
}

function showPageContent() {
  global $connection;

  if (isset($_GET['id'])) {
    $getPageID = $_GET['id'];
  }

  $sql = "SELECT * FROM pages WHERE page_id = $getPageID";
  $select_all_pages_result = mysqli_query($connection, $sql);
  while ($row = mysqli_fetch_assoc($select_all_pages_result)) {
    $page_h2 = $row['page_h2'];
    $page_content = $row['page_content'];

    echo "
      <div class='single-page_wrapper'>
        <h2>{$page_h2}</h2>
        <div>{$page_content}</div>
      </div>
    ";
  }
}


function showPageH1() {
  global $connection;

  if (isset($_GET['id'])) {
    $getPageID = $_GET['id'];
  }

  $sql = "SELECT * FROM pages WHERE page_id = $getPageID";
  $select_all_pages_result = mysqli_query($connection, $sql);
  while ($row = mysqli_fetch_assoc($select_all_pages_result)) {
    $page_h1 = $row['page_h1'];

    echo "<h1 class='h1'>{$page_h1}</h1>";
  }
}


function showNap(){
  global $connection;
  $sql = "SELECT * FROM nap";
  $select_specify_nap = mysqli_query($connection, $sql);
  while ($row = mysqli_fetch_array($select_specify_nap)) {
    $id = $row['a_id'];
    $company_name = $row['company_name'];
    $hours = $row['hours'];
    $street = $row['street'];
    $province = $row['province'];
    $nip = $row['nip'];
    $number = $row['number'];
    $mail = $row['mail'];

    echo "
      <div class='data'>
        <h3>DANE</h3>
        <p>{$company_name}</p>
        <p>{$hours}</p>
        <p>{$street}</p>
        <p>{$province}</p>
        <p>NIP: {$nip}</p>
      </div>
      <div class='mail'>
        <h3>KONTAKT</h3>
        <p>{$number}</p>
        <p>{$mail}</p>
      </div>
    ";
  }
}


function changeMeta() {
  global $connection;
  if (isset($_GET['id'])) {
    $getPageID = $_GET['id'];
  }

  $sql = "SELECT * FROM pages WHERE page_id = $getPageID";
  $select_all_pages_result = mysqli_query($connection, $sql);
  while ($row = mysqli_fetch_assoc($select_all_pages_result)) {
    $page_title = $row['page_title'];
    $page_desc = $row['page_desc'];
    $page_robots = $row['page_robots'];

    echo "
      <head>
        <meta charset='UTF-8'>
        <meta http-equiv='X-UA-Compatible' content='IE=edge'>
        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
        <meta name='description' content='{$page_desc}'>
        <meta name='robots' content='{$page_robots}'>
        <title>{$page_title}</title>
        <link rel='stylesheet' href='/style/index.css'>
        <script defer src='./functions/hamburgerMenu.js'></script>
      </head>
    ";
  }
}


function changeMetaPost() {
  global $connection;
  if (isset($_GET['id'])) {
    $getPostID = $_GET['id'];
  }

  $sql = "SELECT * FROM posts WHERE post_id = $getPostID";
  $select_all_posts_result = mysqli_query($connection, $sql);
  while ($row = mysqli_fetch_assoc($select_all_posts_result)) {
    $post_meta_title = $row['post_meta_title'];
    $post_meta_desc = $row['post_meta_desc'];

    echo "
      <head>
        <meta charset='UTF-8'>
        <meta http-equiv='X-UA-Compatible' content='IE=edge'>
        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
        <meta name='description' content='{$post_meta_desc}'>
        <title>{$post_meta_title}</title>
        <link rel='stylesheet' href='/style/index.css'>
        <script defer src='./functions/hamburgerMenu.js'></script>
      </head>
    ";
  }
}


function showMenuLinks() {
  global $connection;
  $sql = "SELECT * FROM pages";
  $select_all_pages_result = mysqli_query($connection, $sql);
  while ($row = mysqli_fetch_assoc($select_all_pages_result)) {
    $page_id = $row['page_id'];
    $page_name = $row['page_name'];

    echo "
      <li class='link'><a href='page.php?id=$page_id'>{$page_name}</a></li>
    ";
  }
}


function showAdminLink() {
  if (isset($_SESSION['user_role'])) {
    echo 'Panel CMS - ' . strtoupper($_SESSION['username']);
  } else {
    echo 'Panel CMS - niedostępny';
    echo '<li class="link"><a href="../login/loginpage.php" class="admin-href">Panel CMS - LOGOWANIE</a></li>';
  }
}


function showCategoryResult() {
  global $connection;

  if (isset($_GET['category'])) {
    $post_category_id = $_GET['category'];
  }

  $sql = "SELECT * FROM categories WHERE cat_id = $post_category_id";
  $cats_results = mysqli_query($connection, $sql);

  while ($row = mysqli_fetch_assoc($cats_results)) {
    $cat_title = $row['cat_title'];
  }

  $sql = "SELECT * FROM posts WHERE post_category_id = $post_category_id";
  $select_all_posts_query = mysqli_query($connection, $sql);

  $count = mysqli_num_rows($select_all_posts_query);

  if ($count == 0) {
    echo "<h4 class='no-result'>Niestety, ale kategoria: &quot;<em class='empha'>{$cat_title}</em>&quot; do tej pory nie posiada żadnych artykułów i podstron 😣☹️ Ale za to można dodać kontent w panelu Admina ✌️</h4>";
  } else {

    while ($row = mysqli_fetch_assoc($select_all_posts_query)) {
      $post_id = $row['post_id'];
      $post_title = $row['post_title'];
      $post_author = $row['post_author'];
      $post_date = $row['post_date'];
      $post_image = $row['post_image'];
      $post_tags = $row['post_tags'];
      $post_content = $row['post_content'];

      if (strlen($post_content) > 100) {
        $sub = substr($post_content, 0, 100);
      }

      echo "
        <div class='blog-content'>
          <h2><a href='../post.php?id=$post_id'>$post_title</a></h2>
          <div class='blog-info'>
            <p><svg viewBox='0 0 512 512' width='16' height='16' fill='#9ac4e9'>
                <path d='M490.3 40.4C512.2 62.27 512.2 97.73 490.3 119.6L460.3 149.7L362.3 51.72L392.4 21.66C414.3-.2135 449.7-.2135 471.6 21.66L490.3 40.4zM172.4 241.7L339.7 74.34L437.7 172.3L270.3 339.6C264.2 345.8 256.7 350.4 248.4 353.2L159.6 382.8C150.1 385.6 141.5 383.4 135 376.1C128.6 370.5 126.4 361 129.2 352.4L158.8 263.6C161.6 255.3 166.2 247.8 172.4 241.7V241.7zM192 63.1C209.7 63.1 224 78.33 224 95.1C224 113.7 209.7 127.1 192 127.1H96C78.33 127.1 64 142.3 64 159.1V416C64 433.7 78.33 448 96 448H352C369.7 448 384 433.7 384 416V319.1C384 302.3 398.3 287.1 416 287.1C433.7 287.1 448 302.3 448 319.1V416C448 469 405 512 352 512H96C42.98 512 0 469 0 416V159.1C0 106.1 42.98 63.1 96 63.1H192z' />
              </svg>$post_author</p>
            <p><svg viewBox='0 0 512 512' width='16' height='16' fill='#9ac4e9'>
                <path d='M256 32C114.6 32 .0272 125.1 .0272 240c0 49.63 21.35 94.98 56.97 130.7c-12.5 50.37-54.27 95.27-54.77 95.77c-2.25 2.25-2.875 5.734-1.5 8.734C1.979 478.2 4.75 480 8 480c66.25 0 115.1-31.76 140.6-51.39C181.2 440.9 217.6 448 256 448c141.4 0 255.1-93.13 255.1-208S397.4 32 256 32z' />
              </svg>Kategorie:$cat_title</p>
            <p><svg viewBox='0 0 512 512' width='16' height='16' fill='#9ac4e9'>
                <path d='M512 144v288c0 26.5-21.5 48-48 48h-416C21.5 480 0 458.5 0 432v-352C0 53.5 21.5 32 48 32h160l64 64h192C490.5 96 512 117.5 512 144z' />
              </svg>Tagi:$post_tags</p>
            <p><svg viewBox='0 0 448 512' width='16' height='16' fill='#9ac4e9'>
                <path d='M96 32C96 14.33 110.3 0 128 0C145.7 0 160 14.33 160 32V64H288V32C288 14.33 302.3 0 320 0C337.7 0 352 14.33 352 32V64H400C426.5 64 448 85.49 448 112V160H0V112C0 85.49 21.49 64 48 64H96V32zM448 464C448 490.5 426.5 512 400 512H48C21.49 512 0 490.5 0 464V192H448V464z' />
              </svg>$post_date</p>
          </div>
          <div class='img-wrapper'>
            <img class='img' src='../style/images/$post_image'>
          </div>
          <p class='blog-text'>$sub</p>
          <div class='read-more_wrapper'>
            <a href='../post.php?id=$post_id' class='read-more_btn'>CZYTAJ WIĘCEJ...</a>
          </div>
        </div>";
    }
  }
}


function showCategoryH1() {
  global $connection;
  $getCatId = $_GET['category'];

  $sql = "SELECT * FROM categories WHERE cat_id = $getCatId";
  $cats_results = mysqli_query($connection, $sql);
  while ($row = mysqli_fetch_assoc($cats_results)) {
    $cat_id = $row['cat_id'];
    $cat_title = $row['cat_title'];
  }

  echo "<h1 class='h1'>Kategoria: $cat_title </h1>";
}



?>