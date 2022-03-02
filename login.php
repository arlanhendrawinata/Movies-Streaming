<?php
require "config/proses_crud.php";

if (isset($_SESSION['admin'])) {
  header("Location: index.php");
} else if (isset($_SESSION['member'])) {
  header("Location: index.php");
}

require "layouts/header.php";
$obj = new ProsesCrud();
if (isset($_POST['btn-login'])) {
  $username = $_POST['username'];
  $password = $_POST['password'];
  $login = $obj->processLogin($username, $password);
}
?>
<!-- navbar -->
<section class="hero-login">
  <div class="navbar-section">
    <nav class="navbar navbar-expand-lg py-3">
      <div class="container-fluid px-5">
        <a class="navbar-logo" href="/lanflix"><img src="img/logo.png" alt="" width="200px"></a>
        <div class="navbar" id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a href="index.php" class="btn btn-primary">Home<a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  </div>

  <!-- login section -->
  <div class="login-section">
    <div class="login-container">
      <h2>Sign In</h3>
        <form class="login-form" action="" method="POST">
          <div class="mb-3">
            <label for="username" class="form-label">Username</label>
            <input type="text" class="form-control" id="username" name="username" />
          </div>
          <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password" />
          </div>
          <div class="btn-box">
            <button type="submit" name="btn-login" class="btn btn-primary">Login</button>
            <span>This page is protected by Google reCAPTCHA to ensure you're not a bot.</span>
          </div>
        </form>
    </div>
  </div>
</section>
<?php require "layouts/footer-black.php"; ?>