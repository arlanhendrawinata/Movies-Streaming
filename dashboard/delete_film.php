<?php
require "../config/proses_crud.php";
if (!isset($_SESSION['admin'])) {
  header("Location: ../login.php");
}
$pc = new ProsesCrud();
if (isset($_GET['id'])) {
  $id = $_GET['id'];
  $pc->deleteFilm($id);
}
