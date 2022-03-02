<?php
if (!isset($_SESSION['admin'])) {
    header("Location: ../login.php");
}
$obj = new ProsesCrud();

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $edit = $obj->displayFilmById($id);
}
$type = $edit['film_type'];

if (isset($_POST['editfilm'])) {
    if ($obj->upload($_FILES)) {
        $obj->editFilm($_POST);
    } else {
        echo '<script>alert("Failed to edit data!")</script>';
    }
}

?>

<div class="card">
    <div class="card-header bg-primary text-white">
        Edit Film
    </div>
    <div class="card-body">
        <div class="container">
            <div class="editfilm-form">
                <form action="" method="POST" enctype="multipart/form-data" class="form row g-3">
                    <input type="hidden" name="id" value="<?= $edit['id']; ?>">
                    <div class="col-md-6">
                        <label for="film_title" class="form-label">Title</label>
                        <input type="text" class="form-control" id="film_title" name="film_title" value="<?= $edit['film_title']; ?>" required />
                    </div>
                    <div class="col-md-6">
                        <label for="film_genre" class="form-label">Genre</label>
                        <input type="text" class="form-control" id="film_genre" name="film_genre" value="<?= $edit['film_genre']; ?>" required />
                    </div>
                    <div class="mb-3">
                        <label for="film_synopsis" class="form-label">Synopsis</label>
                        <textarea class="form-control text-area" name="film_synopsis" id="film_synopsis" cols="30" rows="10" maxlength="65535" required><?= $edit['film_synopsis']; ?></textarea>
                    </div>
                    <div class="col-md-6">
                        <label for="film_year" class="form-label">Year</label>
                        <input type="number" class="form-control" id="film_year" name="film_year" value="<?= $edit['film_year']; ?>" required />
                    </div>
                    <div class="col-md-6">
                        <label for="film_code" class="form-label">Code</label>
                        <input type="text" class="form-control" id="film_code" name="film_code" value="<?= $edit['film_code']; ?>" required />
                    </div>
                    <div class="col-md-6">
                        <label for="film_img" class="form-label">Image</label>
                        <input type="file" class="form-control" id="film_img" name="film_img" required />
                    </div>
                    <div class="col-md-6">
                        <label for="film_type" class="form-label">Type</label>
                        <select name="film_type" id="film_type" class="form-select" required>
                            <option value="Movies" <?php
                                                    if ($type == 'Movies') {
                                                        echo "selected";
                                                    }
                                                    ?>>Movies</option>
                            <option value="Series" <?php
                                                    if ($type == 'Series') {
                                                        echo "selected";
                                                    }
                                                    ?>>Series</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="film_rating" class="form-label">Rating</label>
                        <input type="number" step="0.5" class="form-control" id="film_rating" name="film_rating" value="<?= $edit['film_rating']; ?>" required />
                    </div>
                    <button type="submit" name="editfilm" class="btn btn-primary">Edit Film</button>
                </form>
            </div>
        </div>
    </div>
</div>