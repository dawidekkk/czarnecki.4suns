<div class="brand">
  <a href="/" class="brand-link">Brand</a>
</div>
<nav class="nav_wrapper none">
  <ul>
    <div class="ham-x-wrapper ham-x_none">
      <svg viewBox="0 0 384 512" width="32" height="32" class="ham_x none" fill="#000">
        <path d="M376.6 427.5c11.31 13.58 9.484 33.75-4.094 45.06c-5.984 4.984-13.25 7.422-20.47 7.422c-9.172 0-18.27-3.922-24.59-11.52L192 305.1l-135.4 162.5c-6.328 7.594-15.42 11.52-24.59 11.52c-7.219 0-14.48-2.438-20.47-7.422c-13.58-11.31-15.41-31.48-4.094-45.06l142.9-171.5L7.422 84.5C-3.891 70.92-2.063 50.75 11.52 39.44c13.56-11.34 33.73-9.516 45.06 4.094L192 206l135.4-162.5c11.3-13.58 31.48-15.42 45.06-4.094c13.58 11.31 15.41 31.48 4.094 45.06l-142.9 171.5L376.6 427.5z" />
      </svg>
    </div>
    <li class="link"><a href="/">Home</a></li>
    <?php showMenuLinks(); ?>
    <li class="link"><a href="admin/index.php"><?php echo showAdminLink(); ?> </a></li>
  </ul>
</nav>
<nav class="nav none">
  <ul>
    <li class="link"><a href="/">Home</a></li>
    <?php showMenuLinks(); ?>
    <li class="link"><a href="admin/index.php"><?php echo showAdminLink(); ?></a></li>
  </ul>
</nav>
<div class="ham ham_none">
  <svg viewBox="0 0 448 512" width="32" height="32" class="ham_btn" fill="#fff">
    <path d="M0 96C0 78.33 14.33 64 32 64H416C433.7 64 448 78.33 448 96C448 113.7 433.7 128 416 128H32C14.33 128 0 113.7 0 96zM0 256C0 238.3 14.33 224 32 224H416C433.7 224 448 238.3 448 256C448 273.7 433.7 288 416 288H32C14.33 288 0 273.7 0 256zM416 448H32C14.33 448 0 433.7 0 416C0 398.3 14.33 384 32 384H416C433.7 384 448 398.3 448 416C448 433.7 433.7 448 416 448z" />
  </svg>
</div>
<div class="search">
  <form action="searchtag.php" method="post">
    <input type="text" placeholder="Szukaj po tagu wpisu..." name="search">
    <button type="submit" name="submit" class="btn-submit"><svg viewBox="0 0 512 512" width="32" height="32" fill="#fff">
        <path d="M500.3 443.7l-119.7-119.7c27.22-40.41 40.65-90.9 33.46-144.7C401.8 87.79 326.8 13.32 235.2 1.723C99.01-15.51-15.51 99.01 1.724 235.2c11.6 91.64 86.08 166.7 177.6 178.9c53.8 7.189 104.3-6.236 144.7-33.46l119.7 119.7c15.62 15.62 40.95 15.62 56.57 0C515.9 484.7 515.9 459.3 500.3 443.7zM79.1 208c0-70.58 57.42-128 128-128s128 57.42 128 128c0 70.58-57.42 128-128 128S79.1 278.6 79.1 208z" />
      </svg></button>
  </form>
</div>