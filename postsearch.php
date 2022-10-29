<?php

$post_tag = $_POST['search'];

?>

<div class="page-wrapper">
  <h1 class="h1">Szukany tag: <?php echo $post_tag ?></h1>
  <main class="blog-wrapper">
    <?php
    if (isset($_POST['submit'])) {
      $search = $_POST['search'];

      // if(empty($_POST['submit'])) {
      //   header("Location: index.php");
      // } 

      $sql = "SELECT * FROM posts WHERE post_tags LIKE '%$search%'";
      $result_query = mysqli_query($connection, $sql);

      if (!$result_query) {
        die("QUERY FAILED" . mysqli_error($connection));
      }

      $count = mysqli_num_rows($result_query);

      if ($count == 0) {
        echo "<h4 class='no-result'>Niestety, ale szukany tag: &quot;<em class='empha'>{$post_tag}</em>&quot; nie jest powiązany z żadnym artykułem. 😣☹️ Ale za to można dodać nowe artykuły w panelu Admina ✌️</h4>";
      } else {

        while ($row = mysqli_fetch_assoc($result_query)) {
          $post_id = $row['post_id'];
          $post_title = $row['post_title'];
          $post_author = $row['post_author'];
          $post_date = $row['post_date'];
          $post_tags = $row['post_tags'];
          $post_image = $row['post_image'];
          $post_content = $row['post_content'];
          $post_comment = $row['post_comment_count'];

          if (strlen($post_content) > 100) {
            $sub = substr($post_content, 0, 100);
          }
    ?>
        <div class="blog-content">
          <h2><a href="#"><?php echo $post_title; ?></a></h2>
          <div class="blog-info">
            <p><svg viewBox="0 0 512 512" width="16" height="16" fill="#9ac4e9">
                <path d="M490.3 40.4C512.2 62.27 512.2 97.73 490.3 119.6L460.3 149.7L362.3 51.72L392.4 21.66C414.3-.2135 449.7-.2135 471.6 21.66L490.3 40.4zM172.4 241.7L339.7 74.34L437.7 172.3L270.3 339.6C264.2 345.8 256.7 350.4 248.4 353.2L159.6 382.8C150.1 385.6 141.5 383.4 135 376.1C128.6 370.5 126.4 361 129.2 352.4L158.8 263.6C161.6 255.3 166.2 247.8 172.4 241.7V241.7zM192 63.1C209.7 63.1 224 78.33 224 95.1C224 113.7 209.7 127.1 192 127.1H96C78.33 127.1 64 142.3 64 159.1V416C64 433.7 78.33 448 96 448H352C369.7 448 384 433.7 384 416V319.1C384 302.3 398.3 287.1 416 287.1C433.7 287.1 448 302.3 448 319.1V416C448 469 405 512 352 512H96C42.98 512 0 469 0 416V159.1C0 106.1 42.98 63.1 96 63.1H192z" />
              </svg><?php echo $post_author; ?></p>
            <p><svg viewBox="0 0 512 512" width="16" height="16" fill="#9ac4e9">
                <path d="M256 32C114.6 32 .0272 125.1 .0272 240c0 49.63 21.35 94.98 56.97 130.7c-12.5 50.37-54.27 95.27-54.77 95.77c-2.25 2.25-2.875 5.734-1.5 8.734C1.979 478.2 4.75 480 8 480c66.25 0 115.1-31.76 140.6-51.39C181.2 440.9 217.6 448 256 448c141.4 0 255.1-93.13 255.1-208S397.4 32 256 32z" />
              </svg>Komentarze: <?php echo $post_comment; ?></p>
            <p><svg viewBox="0 0 512 512" width="16" height="16" fill="#9ac4e9">
                <path d="M512 144v288c0 26.5-21.5 48-48 48h-416C21.5 480 0 458.5 0 432v-352C0 53.5 21.5 32 48 32h160l64 64h192C490.5 96 512 117.5 512 144z" />
              </svg>Tagi: <?php echo $post_tags; ?></p>
            <p><svg viewBox="0 0 448 512" width="16" height="16" fill="#9ac4e9">
                <path d="M96 32C96 14.33 110.3 0 128 0C145.7 0 160 14.33 160 32V64H288V32C288 14.33 302.3 0 320 0C337.7 0 352 14.33 352 32V64H400C426.5 64 448 85.49 448 112V160H0V112C0 85.49 21.49 64 48 64H96V32zM448 464C448 490.5 426.5 512 400 512H48C21.49 512 0 490.5 0 464V192H448V464z" />
              </svg><?php echo $post_date; ?></p>
          </div>
          <div class="img-wrapper">
            <img alt="dada" class="img" src="../style/images/<?php echo $post_image ?>">
          </div>
          <p class="blog-text"><?php echo $sub; ?></p>
          <div class="read-more_wrapper">
            <a href="post.php?id=<?php echo $post_id ?>" class="read-more_btn">Przejdź do postu -></a>
          </div>
        </div>
    <?php }
      }
    }
    ?>
  </main>
  <div class="widgets-wrapper">
    <?php include("./templates/sidebar.php") ?>
    <?php include("./templates/newsletter.php") ?>
    <?php include("./templates/widget.php") ?>
  </div>
</div>