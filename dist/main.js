$(document).ready(function () {
  $('.film-content').load('./layouts/movies.php');

  $('#close').hide();
  countCart();

  $('.spa').click(function (e) {
    e.preventDefault();
    var menu = $(this).attr('id');
    if (menu == "movies") {
      $('#movies').addClass('active');
      $('#series').removeClass('active');
      $('.film-content').load('./layouts/movies.php');
    } else if (menu == "series") {
      $('#movies').removeClass('active');
      $('#series').addClass('active');
      $('.film-content').load('./layouts/series.php');
    }
  });

});

$('#cart').click(function (e) {
  e.preventDefault();
  $('.cart-content').show().animate({ opacity: '1' }, 200);
  $('.cart-content').load('./layouts/cart.php');
  $('#close').show().animate({ opacity: '1' }, 500);

});

$('#close').click(function (e) {
  e.preventDefault();
  $('.cart-content').css('display', 'none');
  $('#close').hide();
  countCart();
});

function countCart() {
  // console.log('countcart');
  $.ajax({
    type: "GET",
    url: "./config/proses_cart.php",
    dataType: "JSON",
    success: function (response) {
      console.log(response);
      $('.count-cart').text(response);
    }
  });
}

function addToCart($id) {
  $.ajax({
    type: "POST",
    url: "./config/proses_cart.php",
    data: { "proses": "add", "id": $id },
    dataType: "JSON",
    success: function (response) {
      countCart();
      window.scroll(0, 0);
    }
  });
}

function deleteCart($id) {
  $.ajax({
    type: "POST",
    url: "./config/proses_cart.php",
    data: { "proses": "delete", "id": $id },
    dataType: "JSON",
    success: function (response) {
      if (response.message == "success") {
        alert('Delete cart successful');
      } else {
        alert('Delete cart failed');
      }
      $('.cart-content').load('./layouts/cart.php');
      countCart();
    }
  });
}