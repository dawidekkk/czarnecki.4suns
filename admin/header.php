<?php include("./functions.php") ?>
<?php include("../config/db_conn.php") ?>
<?php session_start(); ?>
<?php ob_start(); ?>

<?php

if (!isset($_SESSION['user_role'])) {
  header("Location: ../index.php");
}

?>

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Panel - CMS</title>
  <link rel="stylesheet" href="../style/admin/index.css">
  <script defer src="../functions/hamburgerMenuAdmin.js"></script>
  <script src="https://cdn.tiny.cloud/1/n05lmdhwxgxgjp7vripjeg4fmb7l3t6g9gzj1qjqaf135xh6/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
  <script src="../functions/tiny.js"></script>
  <!-- <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500&display=swap" rel="stylesheet"> -->
</head>

<body>
  <div id="root">
    <div class="pattern"></div>
    <header class="header">
      <div class="brand">
        <a href="index.php" class="brand-link">Panel - DC CMS</a>
      </div>
      <nav class="nav_wrapper none">
        <ul>
          <div class="ham-x-wrapper ham-x_none">
            <svg viewBox="0 0 384 512" width="32" height="32" class="ham_x none" fill="#000">
              <path d="M376.6 427.5c11.31 13.58 9.484 33.75-4.094 45.06c-5.984 4.984-13.25 7.422-20.47 7.422c-9.172 0-18.27-3.922-24.59-11.52L192 305.1l-135.4 162.5c-6.328 7.594-15.42 11.52-24.59 11.52c-7.219 0-14.48-2.438-20.47-7.422c-13.58-11.31-15.41-31.48-4.094-45.06l142.9-171.5L7.422 84.5C-3.891 70.92-2.063 50.75 11.52 39.44c13.56-11.34 33.73-9.516 45.06 4.094L192 206l135.4-162.5c11.3-13.58 31.48-15.42 45.06-4.094c13.58 11.31 15.41 31.48 4.094 45.06l-142.9 171.5L376.6 427.5z" />
            </svg>
          </div>
          <li class="link_1"><a href="index.php">Dashboard</a></li>
          <li class="link_2"><a href="posts.php">Posty</a></li>
          <li class="link_3"><a href="posts.php?source=addpost">Dodaj post</a></li>
          <li class="link_4"><a href="./categories.php">Kategorie</a></li>
          <li class="link_5"><a href="pages.php">Strony</a></li>
          <li class="link_6"><a href="pages.php?source=addpage">Dodaj strone</a></li>
          <li class="link_7"><a href="./nap.php">Edytuj NAP</a></li>
          <li class="link_8"><a href="../index.php">Wróć do głównej</a></li>
          <li class="link_9"><a href="../login/logout.php" class="admin-href">Wyloguj</a></li>
        </ul>
      </nav>
      <nav class="nav none">
        <ul>
          <li><a href="index.php">Dashboard</a></li>
          <li><a href="./posts.php">Posty</a></li>
          <li><a href="./posts.php?source=addpost">Dodaj post</a></li>
          <li><a href="./categories.php">Kategorie</a></li>
          <li><a href="./pages.php">Strony</a></li>
          <li><a href="./pages.php?source=addpage">Dodaj strone</a></li>
          <li><a href="./nap.php">Edytuj NAP</a></li>
          <li><a href="../index.php">Wróć do głównej</a></li>
          <li><a href="../login/logout.php" class="admin-href">Wyloguj</a></li>
        </ul>
      </nav>
      <div class="user">
        <span><?php echo 'Rola zalogowanego użytkownika: ' .  $_SESSION['user_role']; ?></span>
      </div>
      <div class="ham ham_none">
        <svg viewBox="0 0 448 512" width="32" height="32" class="ham_btn" fill="#fff">
          <path d="M0 96C0 78.33 14.33 64 32 64H416C433.7 64 448 78.33 448 96C448 113.7 433.7 128 416 128H32C14.33 128 0 113.7 0 96zM0 256C0 238.3 14.33 224 32 224H416C433.7 224 448 238.3 448 256C448 273.7 433.7 288 416 288H32C14.33 288 0 273.7 0 256zM416 448H32C14.33 448 0 433.7 0 416C0 398.3 14.33 384 32 384H416C433.7 384 448 398.3 448 416C448 433.7 433.7 448 416 448z" />
        </svg>
      </div>
    </header>