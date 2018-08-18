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

  <!-- LOGIN FORM -->
  <div class="grid-container ">
   <?php include_once "template/header.php" ?>
   <?php include_once "template/navbar.php"; ?>
   <div class="grid-x grid-padding-y align-center">
    <div class="large-8 cell">
      <form style="height: 100vh;" method="POST" action="authorize.php">
        <div class="form-icons">
          <h4>Login</h4>

          <div class="input-group">
            <span class="input-group-label">
              <i class="fa fa-user"></i>
            </span>
            <input class="input-group-field" type="text" id="user" name="user" placeholder="admin">
          </div>

          <div class="input-group">
            <span class="input-group-label">
              <i class="fa fa-key"></i>
            </span>
            <input class="input-group-field" type="password" id="password" name="password" placeholder="a">
          </div>
        </div>

        <input class="button expanded" type="submit" value="Login">
      </form>
    </div>
  </div>

  <!-- / LOGIN FORM -->
  <!-- ALERT -->

  <div class="grid-x">
    <div class="cell">
      <?php if(isset($_GET["message"])){
        /*
            ==============================
              Checks for message and 
              prints it
            ==============================
        */
            switch($_GET["message"]){
              case "1":
              echo "<div data-closable class='alert-box callout alert'>
              <i class='fa fa-ban'></i> Username doesn't match our records. Please try again.
              <button class='close-button' aria-label='Dismiss alert' type='button' data-close>
              <span aria-hidden='true'>&CircleTimes;</span>
              </button>
              </div>";
              break;
              case "2":
              echo "<div data-closable class='alert-box callout warning'>
              <i class='fa fa-exclamation-triangle'></i> Please enter a username.
              <button class='close-button' aria-label='Dismiss alert' type='button' data-close>
              <span aria-hidden='true'>&CircleTimes;</span>
              </button>
              </div>";
              break;
              default:
              echo "";
              break;
            }
          } 
          ?>
        </div>
      </div>
    </div>
    <!-- / ALERT -->
    <?php include_once "template/footer.php"; ?>

    <?php include_once "template/scripts.php"; ?>
  </body>
  </html>
