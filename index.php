<?php
require 'config/proses_crud.php';
require "layouts/header.php";
$obj = new ProsesCrud();
?>

<section class="cart-wrap">
  <a href=""><i class="fas fa-times-circle" id="close"></i></a>
  <div class="cart-content"></div>
</section>

<section class="hero">
  <div class="navbar-section">
    <nav class="navbar navbar-expand-lg py-4">
      <div class="container-fluid px-5">
        <a class="navbar-logo" href="/lanflix/"><img src="img/logo.png" alt="" width="200px"></a>
        <div class="navbar" id="navbarNav">
          <ul class="navbar-nav">

            <?php if (isset($_SESSION['login'])) { ?>
              <li class="nav-item">
                <a href="./cart.php" class="btn-cart btn btn-primary spa" id="cart"><i class="fas fa-shopping-cart m-lr-m"></i> <span class="count-cart"></span><a>
              </li>
              <?php if (isset($_SESSION['admin'])) { ?>
                <li class="nav-item">
                  <a href="dashboard/index.php" class="btn btn-primary">Dashboard<a>
                </li>
              <?php } ?>
              <li class="nav-item">
                <a href="logout.php" class="btn btn-primary">Logout</a>
              </li>
            <?php } else { ?>
              <li class="nav-item">
                <a href="login.php" class="btn btn-primary">Sign In</a>
              </li>
            <?php } ?>
          </ul>
        </div>
      </div>
    </nav>
  </div>

  <div class="container home-content">
    <h1 class="m-tb">Unlimited movies and TV shows.</h1>
    <span class="m-tb">Watch anywhere and anytime.</span>
    <a href="#films" class="btn btn-primary m-tb get-started">Get Started</a>
  </div>

</section>

<section class="film-container" id="films">

  <div class="container">
    <div class="head-content">
      <ul class="menu-list">
        <a class="type-link spa" id="movies">
          <li>
            <i class="fas fa-film"></i>
            Movies
          </li>
        </a>
        <a class="type-link spa" id="series">
          <li>
            <i class="fas fa-film"></i>
            Series
          </li>
        </a>
      </ul>
    </div>
  </div>

  <div class=" container container-divider">
    <div class="divider"></div>
  </div>

  <?php include "layouts/menu_bar.php"; ?>

  <!-- film list -->
  <div class="film-list">
    <div class="container">
      <div class="row g-5 film-content"></div>
    </div>
  </div>
</section>

<?php require "layouts/footer-black.php"; ?>