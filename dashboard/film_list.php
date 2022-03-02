<?php
if (!isset($_SESSION['admin'])) {
  header("Location: ../login.php");
}
$obj = new ProsesCrud();
?>
<div class="listfilm-container">
  <div class="listfilm-card card">
    <div class="card-header text-white">
      Film List
    </div>
    <div class="card-body">
      <div class="container-fluid">
        <table class="table">
          <thead>
            <tr>
              <th>No</th>
              <th>Title</th>
              <th>Genre</th>
              <th>Year</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $datas = $obj->displayMovies();
            $no = 1;
            foreach ($datas as $data) {
            ?>
              <tr>
                <td><?= $no++; ?></td>
                <td><?= $data['film_title']; ?></th>
                <td><?= $data['film_genre']; ?></td>
                <td><?= $data['film_year']; ?></td>
                <td>
                  <a href="?page=edit_film&id=<?= $data["id"]; ?>" class="btn btn-primary">Edit</a>

                  <a href="delete_film.php?id=<?= $data["id"]; ?>" onclick="return confirm('Are you sure want to remove this data?')" class="btn btn-primary">Remove</a>
                </td>
              </tr>
            <?php } ?>
            <!-- foreach -->
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>