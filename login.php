<?php include_once "configuration.php"; ?>
<!doctype html>
<html class="no-js" lang="en" dir="ltr">
<head>
  <?php include_once "template/head.php"; ?>
  <style>

  form .form-icons {
    text-align: center;
  }

  form .form-icons h4 {
    margin-bottom: 1rem;
  }

  form .form-icons .input-group-label {
    background-color: #1779ba;
    border-color: #1779ba;
  }

  form .form-icons .input-group-field {
    border-color: #1779ba;
  }

  form .form-icons .fa {
    color: white;
    width: 1rem;
  }


</style>
</head>
<body>
  <?php include_once "template/navbar.php"; ?>
  <div class="grid-container ">
   <div class="grid-x grid-padding-x align-center">
    <div class="large-4 cell">
      <form method="POST" action="authorize.php">
        <div class="form-icons">
          <h4>Login</h4>

          <div class="input-group">
            <span class="input-group-label">
              <i class="fa fa-user"></i>
            </span>
            <input class="input-group-field" type="text" id="user" name="user" >
          </div>

          <div class="input-group">
            <span class="input-group-label">
              <i class="fa fa-key"></i>
            </span>
            <input class="input-group-field" type="password" id="password" name="password" >
          </div>
        </div>

        <input class="button expanded" type="submit" value="Login">
      </form>
    </div>
  </div>
</div>

<?php include_once "template/footer.php"; ?>

<?php include_once "template/scripts.php"; ?>
</body>
</html>
