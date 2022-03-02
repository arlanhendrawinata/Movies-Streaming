<?php
include '../config/proses_crud.php';
$obj = new ProsesCrud();
$uid = $_SESSION['id_user'];
$datas = $obj->displayCart($uid);

?>
<div class="container">
  <h1 class="cart-title red">Produk Cart</h1>
  <table class="table table-striped ">
    <thead class="thead-inverse">
      <tr>
        <th>#</th>
        <th>Nama Film</th>
        <th>Price</th>
        <th>Quantity</th>
        <th>Total</th>
      </tr>
    </thead>
    <?php
    $gtotal = 0;
    if (is_array($datas)) {
      foreach ($datas as $data) {
        $price = 10000;
        $total = $price * $data['qty'];
        $gtotal += $total;
    ?>
        <tbody>
          <tr>
            <td><a class="del-cart" onclick="deleteCart(<?= $data['id_cart']; ?>)"><i class="fas fa-times-circle red" style="font-size: 1.4rem;"></i></a></td>
            <td><?= $data['film_title']; ?></td>
            <td><?= $price; ?></td>
            <td><?= $data['qty']; ?></td>
            <td><?= $total ?></td>
          </tr>
      <?php }
    } else {
      echo '<h5>Data is still empty</h5>';
    } ?>
        </tbody>
  </table>

  <div class="card-checkout">
    <div class="card border-primary">
      <div class="card-body">
        <h4 class="card-title">Checkout</h4>
        <p class="card-text">Total : Rp <?php echo $gtotal ?></p>
      </div>
      <div class="card-footer">
        <button class="btn btn-primary btn-block">Checkout</button>
      </div>
    </div>
  </div>
</div>