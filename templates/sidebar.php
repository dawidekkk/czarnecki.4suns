<div class="blog-categories">
  <h4>Lista wszystkich kategorii:</h4>
  <div>
    <ul>
      <?php
        $sql = "SELECT * FROM categories";
        $cats_results = mysqli_query($connection, $sql);
        while ($row = mysqli_fetch_assoc($cats_results)) {
          $cat_id = $row['cat_id'];
          $cat_title = $row['cat_title'];
          echo "<li><a href='searchcategories.php?category={$cat_id}' class='cat-link'>{$cat_title}</a></li>";
      }
      ?>
    </ul>
  </div>
</div>