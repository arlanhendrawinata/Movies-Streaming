<?php

session_start();

include 'connection.php';

$obj = new Koneksi;


class prosesCart extends Koneksi
{
  public function cart()
  {

    $request = $_SERVER['REQUEST_METHOD'];
    $uid = $_SESSION['id_user'];

    switch ($request) {
      case 'GET':

        $query = mysqli_query($this->conn, "SELECT * FROM cart WHERE id_user = '$uid'")->num_rows;
        echo json_encode($query);

        break;

      case 'POST':

        switch ($_POST['proses']) {
          case 'add':

            $id = $_POST['id'];

            $result_display = mysqli_query($this->conn, "SELECT * FROM cart WHERE id_film = '$id' and id_user = '$uid'");

            // $result_display = mysqli_query($this->conn, "SELECT * FROM cart WHERE id_film = '$id'");

            $check_count = $result_display->num_rows;

            while ($row = mysqli_fetch_object($result_display)) {
              $qty = $row->qty;
            }

            if ($check_count == 0) {
              $result = mysqli_query($this->conn, "INSERT INTO cart (id_user, id_film, qty) VALUES ('$uid', '$id', '1') ");

              if ($result) {
                echo json_encode(["message" => "add success"]);
              } else {
                echo json_encode(["message" => "add failed"]);
              }
            } else if ($check_count > 0) {
              $qty += 1;
              $result_update = mysqli_query($this->conn, "UPDATE cart SET qty = '$qty' WHERE id_film = '$id' ");

              if ($result_update) {
                echo json_encode(["message" => "update success"]);
              } else {
                echo json_encode(["message" => "update failed"]);
              }
            }
            break;
          case 'delete':

            $id = $_POST['id'];

            $result_delete = mysqli_query($this->conn, "DELETE FROM cart WHERE id_cart = '$id' ");

            if ($result_delete) {
              echo json_encode(["message" => "success"]);
            } else {
              echo json_encode(["message" => "failed"]);
            }
        }
    }
  }
}

$obj2 = new prosesCart();
$obj2->cart();
