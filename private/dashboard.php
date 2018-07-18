<?php include_once "../configuration.php"; 
  if(!isset($_SESSION["a"])){
  header("location: " . $pathAPP . "logout.php");
}

?>
<!doctype html>
<html class="no-js" lang="en" dir="ltr">
<head>
  <?php include_once "../template/head.php"; ?>
</head>
<body>

  <?php include_once "../template/navbar.php"; ?>
  Dashboard
  <?php include_once "../template/footer.php"; ?>

  <?php include_once "../template/scripts.php"; ?>
</body>
</html>
