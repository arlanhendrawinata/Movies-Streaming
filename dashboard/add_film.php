<?php
if (!isset($_SESSION['admin'])) {
  // header("Location: ../login.php");
  echo 'goblok';
}
$obj = new ProsesCrud();

if (isset($_POST['addfilm'])) {
  if ($obj->title($_POST['film_title'])) {
    if ($test = $obj->upload($_FILES)) {
      $obj->addFilm($_POST);
    } else {
      echo '<script>alert("Please upload image!")</script>';
    }
  } else {
    echo '<script>alert("Title cant be the same!")</script>';
  }
}
?>

<div class="card">
  <div class="card-header bg-primary text-white">
    Add Film
  </div>
  <div class="card-body">
    <div class="container">
      <div class="tambahfilm-form">
        <form action="" method="POST" enctype="multipart/form-data" class="form row g-3">
          <div class="col-md-6">
            <label for="film_title" class="form-label">Title</label>
            <input type="text" class="form-control" id="film_title" name="film_title" required />
          </div>
          <div class="col-md-6">
            <label for="film_genre" class="form-label">Genre</label>
            <input type="text" class="form-control" id="film_genre" name="film_genre" required />
          </div>
          <div class="mb-3">
            <label for="film_synopsis" class="form-label">Synopsis</label>
            <textarea class="form-control" name="film_synopsis" id="film_synopsis" cols="30" rows="10" maxlength="65535" required></textarea>
          </div>
          <div class="col-md-6">
            <label for="film_year" class="form-label">Year</label>
            <input type="number" class="form-control" id="film_year" name="film_year" required />
          </div>
          <div class="col-md-6">
            <label for="film_code" class="form-label">Code</label>
            <input type="text" class="form-control" id="film_code" name="film_code" required />
          </div>
          <div class="col-md-6">
            <label for="film_img" class="form-label">Image</label>
            <input type="file" class="form-control" id="film_img" name="film_img" required />
          </div>
          <div class="col-md-6">
            <label for="film_type" class="form-label">Type</label>
            <select name="film_type" id="film_type" class="form-select" required>
              <option value="Movies">Movies</option>
              <option value="Series">Series</option>
            </select>
          </div>
          <div class="mb-3">
            <label for="film_rating" class="form-label">Rating</label>
            <input type="number" step="0.5" class="form-control" id="film_rating" name="film_rating" required />
          </div>
          <button type="submit" name="addfilm" class="btn btn-primary">Add Film</button>
        </form>
      </div>
    </div>
  </div>
</div>
</div>