<?php include("functions.php") ?>
<?php include("./config/db_conn.php") ?>

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Projekt CMS - Dawid Czarnecki</title>
  <meta name="description" content="Witam serdecznie w prywatnym CMS'ie zbudowanym z użyciem języka programowania PHP.">
  <link rel="stylesheet" href="/style/index.css" />
  <script defer src="./functions/hamburgerMenu.js"></script>
  <script defer src="./functions/menu.js"></script>

</head>

<body>
  <div id="root">
    
    <header class="header">
      <?php include("menu.php") ?>
    </header>
