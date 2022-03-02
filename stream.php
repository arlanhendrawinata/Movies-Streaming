<?php
require 'config/proses_crud.php';
require "layouts/header.php";
$obj = new ProsesCrud();
$id = $_GET['id'];
$data = $obj->displayFilmById($id);
?>


<div class="navbar-section">
  <nav class="navbar navbar-expand-lg navbar-light bg-light ">
    <div class="container py-4">
      <a class="navbar-logo" href="/lanflix/"><img src="img/logo.png" alt="" width="200px"></a>
      <div class="navbar stream-navbar" id="navbarNav">
        <ul class="navbar-nav stream-nav">
          <?php if (isset($_SESSION['login'])) { ?>
            <li class="nav-item">
              <a href="dashboard/index.php" class="btn btn-primary">Dashboard<a>
            </li>
            <li class="nav-item">
              <a href="index.php" class="btn btn-primary">Back<a>
            </li>
            <li class="nav-item">
              <a href="logout.php" class="btn btn-primary">Logout<a>
            </li>
          <?php } else { ?>
            <li class="nav-item">
              <a href="login.php" class="btn btn-primary">Login<a>
            </li>
            <li class="nav-item">
              <a href="index.php" class="btn btn-primary">Back<a>
            </li>
          <?php } ?>
        </ul>
      </div>
    </div>
  </nav>
</div>

<div class="stream-section">
  <div class="container stream-container">
    <div class="menu-section breadcrumb">
      <nav class="navbar navbar-expand-lg navbar-light bg-light container">
        <span><a href="index.php">Home</a>/<a href="index.php">Movies</a>/<a href="stream.php?id=<?= $_GET["id"]; ?>"><?= $data['film_title']; ?>(<?= $data['film_year']; ?>)</a></span>
      </nav>
    </div>

    <div class="container stream">
      <iframe width="956" height="538" src="https://www.youtube.com/embed/<?= $data['film_code']; ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
    </div>

    <div class="stream-detail">
      <h3><?= $data['film_title']; ?>(<?= $data['film_year']; ?>)</h3>
      <div class="stream-yr">
        <span><?= $data['film_genre']; ?></span>
        <i class="fas fa-star"></i><?= $data['film_rating']; ?></li>

      </div>
      <p><?= $data['film_synopsis']; ?></p>

    </div>
  </div>
</div>
<?php require "layouts/footer.php"; ?>