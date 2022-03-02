<?php
require '../config/proses_crud.php';
if (!isset($_SESSION['admin'])) {
  header("Location: ../login.php");
  echo 'admin';
}



?>

<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="../../lanflix/dist/bootstrap/css/bootstrap.min.css">

  <!-- CSS -->
  <link rel="stylesheet" href="../dist/style.css">

  <title>LANFLIX</title>
</head>

<body>
  <div class="dashboard">
    <!-- navbar -->
    <div class="navbar-section">
      <nav class="navbar navbar-expand-lg border-bottom">
        <div class="container">
          <a class="navbar-logo" href="../index.php"><img src="../img/logo.png" alt="" width="200px"></a>
          <div class="navbar" id="navbarNav">
            <ul class="navbar-nav">
              <li class="nav-item">
                <a href="../index.php" class="btn btn-primary">Home</a>
              </li>
              <li class="nav-item">
                <a href="../logout.php" class="btn btn-primary">Logout</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
    </div>

    <div class="main-section">
      <div class="sidebar">
        <ul>
          <li class="sidebar-item">
            <a href="?page=film_list" class="sidebar-link">Film List</a>
          </li>
          <li class="sidebar-item">
            <a href="?page=add_film" class="sidebar-link">Add Film</a>
          </li>
        </ul>
      </div>
      <div class="content">
        <?php

        @$page = $_GET['page'];

        if (!empty($page)) {
          switch ($page) {
            case 'film_list':
              include "film_list.php";
              break;

            case 'add_film':
              include "add_film.php";
              break;

            case 'edit_film':
              include "edit_film.php";
              break;

            case 'daftar_mobil':
              include "daftar_mobil.php";
              break;

            case 'tambah_mobil':
              include "tambah_mobil.php";
              break;

            case 'edit_mobil':
              include "edit_mobil.php";
              break;

            default:
              include "film_list.php";
              break;
          }
        } else {
          include "film_list.php";
        }

        ?>
      </div>
    </div>
    <footer class="footer dashboard-footer border-top">
      <div class="container footer-content">
        <img src="../img/logo.png" alt="" width="200px">
        <p><strong>LANFLIX</strong> is a movie and tv series streaming service, providing a desktop and mobile friendly interface.</p>
        <ul class="navbar-nav">
          <li class="nav-link"><a href="#">FAQ</a></li>
          <li class="nav-link"><a href="#">Help Center</a></li>
          <li class="nav-link"><a href="#">Terms of Use</a></li>
          <li class="nav-link"><a href="#">Contact Us</a></li>
        </ul>
      </div>
    </footer>
  </div>
  <script src="dist/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>