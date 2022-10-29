<!DOCTYPE html>
<html lang="pl">

<?php include("./header.php") ?>
<?php include("./dashboard.php") ?>

  <?php

  $errors = ['email'=>''];

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
  }

  if (isset($_POST['editNapSubmit'])) {

    if(!filter_var($mail, FILTER_VALIDATE_EMAIL)) {
      $errors['email'] = 'email must be a valid email address!';
    }

    $nap_company_name = $_POST['editCompany'];
    $nap_hours = $_POST['editHours'];
    $nap_street = $_POST['editStreet'];
    $nap_province = $_POST['editProvince'];
    $nap_nip = $_POST['editNip'];
    $nap_number = $_POST['editNumber'];
    $nap_mail = $_POST['editMail'];

    $sql = "UPDATE nap SET ";
    $sql .= "company_name = '{$nap_company_name}',";
    $sql .= "hours = '{$nap_hours}',";
    $sql .= "street = '{$nap_street}',";
    $sql .= "province = '{$nap_province}',";
    $sql .= "nip = '{$nap_nip}',";
    $sql .= "number = '{$nap_number}',";
    $sql .= "mail = '{$nap_mail}' ";

    $edit_nap = mysqli_query($connection, $sql);

    confirm($edit_nap);

    echo "<p class='cat-added'>Pomyślna edycja NAP - Naaajs ;)</p>";

    header("Location: nap.php");
  } 
  ?>

<form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data" class="edit-post">
  <div class="edit-post-wrapper">
    <label for="editCompany">Pełna nazwa firmy</label>
    <input type="text" value="<?php echo htmlspecialchars("$company_name") ?>" class="form-control" name="editCompany">
  </div>
  <div class="edit-post-wrapper">
    <label for="editHours">Godziny otwarcia</label>
    <input type="text" value="<?php echo htmlspecialchars("$hours") ?>" class="form-control" name="editHours">
  </div>
  <div class="edit-post-wrapper">
    <label for="editStreet">Pełny adres z kodem pocztowym</label>
    <input type="text" value="<?php echo htmlspecialchars("$street") ?>" class="form-control" name="editStreet">
  </div>
  <div class="edit-post-wrapper">
    <label for="editProvince">Województwo</label>
    <input type="text" value="<?php echo htmlspecialchars("$province") ?>" class="form-control" name="editProvince">
  </div>
  <div class="edit-post-wrapper">
    <label for="editNip">NIP</label>
    <input type="text" value="<?php echo htmlspecialchars("$nip") ?>" class="form-control" name="editNip">
  </div>
  <div class="edit-post-wrapper">
    <label for="editNumber">Numer telefonu</label>
    <input type="number" value="<?php echo htmlspecialchars("$number") ?>" class="form-control" name="editNumber">
  </div>
  <div class="edit-post-wrapper">
    <label for="editMail">Adres @mail</label>
    <input type="mail" value="<?php echo htmlspecialchars("$mail") ?>" class="form-control" name="editMail">
  </div>
  <div class="edit-post-wrapper">
    <input type="submit" name="editNapSubmit" value="Edytuj NAP" class="submit-post">
  </div>
</form>

<?php include("./footer.php") ?>

</html>