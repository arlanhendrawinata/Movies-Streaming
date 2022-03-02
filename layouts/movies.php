<?php
include '../config/proses_crud.php';
$obj = new ProsesCrud();
$datas = $obj->displayTypeMovies();
foreach ($datas as $data) {
?>
  <div class="col-md-3 d-flex justify-content-center">
    <div class="cards">
      <a href="stream.php?id=<?= $data["id"]; ?>" class="">
        <img src="img/films/<?= $data["film_img"]; ?>" class="card-img" alt="<?= $data["film_img"]; ?>"></a>
      <div class="card-body">
        <h5 class="card-title"><?= $data["film_title"]; ?></h5>
        <div class="detail-box">
          <div class="detail-item">
            <span><?= $data["film_genre"]; ?></span>
          </div>
          <ul class="detail-list">
            <li class="card-text"><?= $data["film_year"]; ?></li>
            <li class="card-text red"><i class="fas fa-heart"></i></li>
            <li class="card-text yellow"><i class="fas fa-star"></i><?= $data['film_rating']; ?></li>
          </ul>
        </div>
        <a class="link-cart btn btn-primary" onclick="addToCart(<?= $data['id']; ?>)"><i class="fas fa-shopping-cart"></i> Add To Cart</a>
      </div>
    </div>
  </div>
<?php } ?>
<!-- foreach -->