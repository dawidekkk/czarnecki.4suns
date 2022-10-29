<?php session_start();?>

<?php
include("../config/db_conn.php");
$username = $password = '';
$errors = ['username' => '', 'password' => ''];

if (isset($_POST['submit'])) {

  if (empty($_POST['login'])) {
    $errors['username'] = 'Login jest wymagany!';
  } else {
    $username = $_POST['login'];
  }

  if (empty($_POST['password'])) {
    $errors['password'] = 'Password jest wymagany!';
  } else {
    $password = $_POST['password'];
  }

  if (array_filter($errors)) {
    echo 'W formularzu występuje błąd!';
  } else {
    $username = mysqli_real_escape_string($connection, $username);
    $password = mysqli_real_escape_string($connection, $password);

    $sql = "SELECT * FROM users WHERE username = '{$username}' AND user_password = '{$password}'";
    $select_user_query = mysqli_query($connection, $sql);

    if (!$select_user_query) {
      die('Login error' . mysqli_error($connection));
    }

    while ($row = mysqli_fetch_array($select_user_query)) {
      $db_id = $row['user_id'];
      $db_username = $row['username'];
      $db_password = $row['user_password'];
      $db_user_role = $row['user_role'];
    }

    if ($username === $db_username && $password === $db_password) {

      $_SESSION['user_id'] = $db_id;
      $_SESSION['username'] = $db_username;
      $_SESSION['user_password'] = $db_password;
      $_SESSION['user_role'] = $db_user_role;
      session_write_close();
      header("Location: ../admin/index.php");
    }
  }
}
?>

<!DOCTYPE html>
<html lang="pl">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Logowanie - Panel DC CMS</title>
  <link rel="stylesheet" href="../style/login/login.css">
</head>

<body>
  <div class="login-wrapper">
    <div class="pattern"></div>
    <h1>CMS - DC</h1>
    <h2>Panel logowania</h2>
    <form action="" method="post" class="login-form">
      <input type="text" name="login" placeholder="Login">
      <div class="<?php if($errors['username']) { echo 'so-red'; } ?>"><?php echo $errors['username'] ?></div>
      <input type="password" name="password" placeholder="Password">
      <div class="<?php if($errors['password']) { echo 'so-red'; } ?>"><?php echo $errors['password'] ?></div>
      <input type="submit" name="submit" value="Zaloguj się">
    </form>
    <a href="../index.php" class="back">Wróć do strony głównej</a>
  </div>

  <div class="copyrights">
    <p> © Copyrights 2022 by Dawid Czarnecki.</p>
    <p>Wszelkie prawa zastrzeżone.</p>
  </div>
</body>

</html>