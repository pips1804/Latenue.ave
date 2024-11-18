function showCart() {
  $.ajax({
    url: "customerView/viewCart.php",
    method: "post",
    data: { record: 1 },
    success: function (data) {
      $(".allContent-section-customer").html(data);
    },
  });
}

function showCheckout() {
  $.ajax({
    url: "customerView/viewCheckout.php",
    method: "post",
    data: { record: 1 },
    success: function (data) {
      $(".allContent-section-customer").html(data);
    },
  });
}

function showOrders() {
  $.ajax({
    url: "customerView/viewOrders.php",
    method: "post",
    data: { record: 1 },
    success: function (data) {
      $(".allContent-section-customer").html(data);
    },
  });
}

function cartDelete(id) {
  $.ajax({
    url: "controller/deleteCartController.php",
    method: "post",
    data: { record: id },
    success: function (data) {
      alert("Cart Item Successfully deleted");
      $("form").trigger("reset");
      showCart();
    },
  });
}

function quantityPlus(id) {
  $.ajax({
    url: "controller/addQuantityController.php",
    method: "post",
    data: { record: id },
    success: function (data) {
      // $("form").trigger("reset");
      // showMyCart();
      const response = JSON.parse(data);
      if (response.status === "success") {
        $("#quantity-" + id).text(response.quantity);

        // Get the unit price from the DOM and calculate the new total price
        const unitPrice = parseFloat($("#unit-price-" + id).text());
        const newTotalPrice = (unitPrice * response.quantity).toFixed(2);

        // Update the total price in the DOM
        $("#total-price-" + id).text(newTotalPrice);
      } else {
        alert(response.message);
      }
      showCart();
    },
  });
}

function quantityMinus(id) {
  $.ajax({
    url: "controller/subQuantityController.php",
    method: "post",
    data: { record: id },
    success: function (data) {
      // $("form").trigger("reset");
      // showMyCart();
      const response = JSON.parse(data);
      if (response.status === "success") {
        $("#quantity-" + id).text(response.quantity);

        // Get the unit price from the DOM and calculate the new total price
        const unitPrice = parseFloat($("#unit-price-" + id).text());
        const newTotalPrice = (unitPrice * response.quantity).toFixed(2);

        // Update the total price in the DOM
        $("#total-price-" + id).text(newTotalPrice);
      } else {
        alert(response.message);
      }
      showCart();
    },
  });
}

function cancelOrder(id) {
  $.ajax({
    url: "controller/cancelOrderController.php",
    method: "post",
    data: { record: id },
    success: function (data) {
      alert("Order cancelled successfully");
      $("form").trigger("reset");
      showOrders();
    },
  });
}
