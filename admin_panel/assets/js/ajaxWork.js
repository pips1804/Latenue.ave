function showProductItems() {
  $.ajax({
    url: "./adminView/viewAllProducts.php",
    method: "post",
    data: { record: 1 },
    success: function (data) {
      $(".allContent-section").html(data);
    },
  });
}
function showCategory() {
  $.ajax({
    url: "./adminView/viewCategories.php",
    method: "POST",
    data: { record: 1 },
    success: function (data) {
      $(".allContent-section").html(data);
    },
  });
}

function showSupplier() {
  $.ajax({
    url: "./adminView/viewAllSuppliers.php",
    method: "post",
    data: { record: 1 },
    success: function (data) {
      $(".allContent-section").html(data);
    },
  });
}
function showSizes() {
  $.ajax({
    url: "./adminView/viewSizes.php",
    method: "post",
    data: { record: 1 },
    success: function (data) {
      $(".allContent-section").html(data);
    },
  });
}
function showProductSizes() {
  $.ajax({
    url: "./adminView/viewProductSizes.php",
    method: "post",
    data: { record: 1 },
    success: function (data) {
      $(".allContent-section").html(data);
    },
  });
}

function showCustomers() {
  $.ajax({
    url: "./adminView/viewCustomers.php",
    method: "post",
    data: { record: 1 },
    success: function (data) {
      $(".allContent-section").html(data);
    },
  });
}

function showOrders() {
  $.ajax({
    url: "./adminView/viewAllOrders.php",
    method: "post",
    data: { record: 1 },
    success: function (data) {
      $(".allContent-section").html(data);
    },
  });
}

function showAdmin() {
  $.ajax({
    url: "./adminView/viewAdmin.php",
    method: "post",
    data: { record: 1 },
    success: function (data) {
      $(".allContent-section").html(data);
    },
  });
}

function showCart() {
  $.ajax({
    url: "../customer-panel/customerView/viewCart.php",
    method: "post",
    data: { record: 1 },
    success: function (data) {
      $(".allContent-section-customer").html(data);
    },
  });
}

function showAudit() {
  $.ajax({
    url: "./adminView/viewAuditLog.php",
    method: "post",
    data: { record: 1 },
    success: function (data) {
      $(".allContent-section").html(data);
    },
  });
}

function showBank() {
  $.ajax({
    url: "./adminView/viewBank.php",
    method: "post",
    data: { record: 1 },
    success: function (data) {
      $(".allContent-section").html(data);
    },
  });
}

function showEWallet() {
  $.ajax({
    url: "./adminView/viewEwallet.php",
    method: "post",
    data: { record: 1 },
    success: function (data) {
      $(".allContent-section").html(data);
    },
  });
}

function ChangeOrderStatus(id) {
  $.ajax({
    url: "./controller/updateOrderStatus.php",
    method: "post",
    data: { record: id },
    success: function (data) {
      alert("Order Status updated successfully");
      $("form").trigger("reset");
      showOrders();
    },
  });
}

function ChangePay(id) {
  $.ajax({
    url: "./controller/updatePayStatus.php",
    method: "post",
    data: { record: id },
    success: function (data) {
      alert("Payment Status updated successfully");
      $("form").trigger("reset");
      showOrders();
    },
  });
}

function addItems() {
  var p_name = $("#p_name").val();
  var p_desc = $("#p_desc").val();
  var category = $("#category").val();
  var supplier = $("#supplier").val();
  var upload = $("#upload").val();
  var file = $("#file")[0].files[0];

  var fd = new FormData();
  fd.append("p_name", p_name);
  fd.append("p_desc", p_desc);
  fd.append("category", category);
  fd.append("supplier", supplier);
  fd.append("file", file);
  fd.append("upload", upload);
  $.ajax({
    url: "./controller/addItemController.php",
    method: "post",
    data: fd,
    processData: false,
    contentType: false,
    success: function (data) {
      alert("Product Added successfully.");
      $("form").trigger("reset");
      showProductItems();
    },
  });
}

function addEWallet() {
  var e_name = $("#e_name").val();
  var f_name = $("#first_name").val();
  var m_name = $("#middle_name").val();
  var l_name = $("#last_name").val();
  var e_num = $("#e_number").val();
  var upload = $("#upload").val();
  var file = $("#file")[0].files[0];

  var fd = new FormData();
  fd.append("e_name", e_name);
  fd.append("f_name", f_name);
  fd.append("m_name", m_name);
  fd.append("l_name", l_name);
  fd.append("e_num", e_num);
  fd.append("file", file);
  fd.append("upload", upload);
  $.ajax({
    url: "./controller/addEWalletController.php",
    method: "post",
    data: fd,
    processData: false,
    contentType: false,
    success: function (data) {
      alert("EWallet Added successfully.");
      $("form").trigger("reset");
      showEWallet();
    },
  });
}

//edit product data
function itemEditForm(id) {
  $.ajax({
    url: "./adminView/editItemForm.php",
    method: "post",
    data: { record: id },
    success: function (data) {
      $(".allContent-section").html(data);
    },
  });
}

function eWalletEditForm(id) {
  $.ajax({
    url: "./adminView/editEWalletForm.php",
    method: "post",
    data: { record: id },
    success: function (data) {
      $(".allContent-section").html(data);
    },
  });
}

//update product after submit
function updateItems() {
  var product_id = $("#product_id").val();
  var p_name = $("#p_name").val();
  var p_desc = $("#p_desc").val();
  var category = $("#category").val();
  var supplier = $("#supplier").val();
  var existingImage = $("#existingImage").val();
  var newImage = $("#newImage")[0].files[0];
  var fd = new FormData();
  fd.append("product_id", product_id);
  fd.append("p_name", p_name);
  fd.append("p_desc", p_desc);
  fd.append("category", category);
  fd.append("supplier", supplier);
  fd.append("existingImage", existingImage);
  fd.append("newImage", newImage);

  $.ajax({
    url: "./controller/updateItemController.php",
    method: "post",
    data: fd,
    processData: false,
    contentType: false,
    success: function (data) {
      alert("Data Update Success.");
      $("form").trigger("reset");
      showProductItems();
    },
  });
}

function updateEWallet() {
  var e_id = $("#e_wallet_id").val();
  var e_name = $("#e_name").val();
  var f_name = $("#first_name").val();
  var m_name = $("#middle_name").val();
  var l_name = $("#last_name").val();
  var e_num = $("#e_number").val();
  var existingImage = $("#existingImage").val();
  var newImage = $("#newImage")[0].files[0];

  var fd = new FormData();
  fd.append("e_id", e_id);
  fd.append("e_name", e_name);
  fd.append("f_name", f_name);
  fd.append("m_name", m_name);
  fd.append("l_name", l_name);
  fd.append("e_num", e_num);
  fd.append("existingImage", existingImage);
  fd.append("newImage", newImage);
  $.ajax({
    url: "./controller/updateEWalletController.php",
    method: "post",
    data: fd,
    processData: false,
    contentType: false,
    success: function (data) {
      alert("EWallet Updated successfully.");
      $("form").trigger("reset");
      showEWallet();
    },
  });
}

//delete product data
function itemDelete(id) {
  $.ajax({
    url: "./controller/deleteItemController.php",
    method: "post",
    data: { record: id },
    success: function (data) {
      alert("Items Successfully deleted");
      $("form").trigger("reset");
      showProductItems();
    },
  });
}

function eWalletDelete(id) {
  $.ajax({
    url: "./controller/deleteEWalletController.php",
    method: "post",
    data: { record: id },
    success: function (data) {
      alert("EWallet Successfully deleted");
      $("form").trigger("reset");
      showEWallet();
    },
  });
}

//delete cart data
// function addToCart() {
//   var v_id = $("#variation_id").val();
//   var fd = new FormData();
//   fd.append("variation_id", v_id);

//   $.ajax({
//     url: "../customer-panel/controller/addToCartController.php",
//     method: "post",
//     data: fd,
//     processData: false,
//     contentType: false,
//     success: function (data) {
//       alert("Product added to cart successfully.");
//       $("form").trigger("reset");
//     },
//   });
// }

function cartDelete(id) {
  $.ajax({
    url: "../customer-panel/controller/deleteCartController.php",
    method: "post",
    data: { record: id },
    success: function (data) {
      alert("Cart Item Successfully deleted");
      $("form").trigger("reset");
      showCart();
    },
  });
}

function eachDetailsForm(id) {
  $.ajax({
    url: "./view/viewEachDetails.php",
    method: "post",
    data: { record: id },
    success: function (data) {
      $(".allContent-section").html(data);
    },
  });
}

//delete category data
function categoryDelete(id) {
  $.ajax({
    url: "./controller/catDeleteController.php",
    method: "post",
    data: { record: id },
    success: function (data) {
      alert("Category Successfully deleted");
      $("form").trigger("reset");
      showCategory();
    },
  });
}

function bankDelete(id) {
  $.ajax({
    url: "./controller/bankDeleteController.php",
    method: "post",
    data: { record: id },
    success: function (data) {
      alert("Bank Details Successfully deleted");
      $("form").trigger("reset");
      showBank();
    },
  });
}

function supplierDelete(id) {
  $.ajax({
    url: "./controller/suppDeleteController.php",
    method: "post",
    data: { record: id },
    success: function (data) {
      alert("Supplier Successfully deleted");
      $("form").trigger("reset");
      showSupplier();
    },
  });
}

//delete size data
function sizeDelete(id) {
  $.ajax({
    url: "./controller/deleteSizeController.php",
    method: "post",
    data: { record: id },
    success: function (data) {
      alert("Size Successfully deleted");
      $("form").trigger("reset");
      showSizes();
    },
  });
}

//delete variation data
function variationDelete(id) {
  $.ajax({
    url: "./controller/deleteVariationController.php",
    method: "post",
    data: { record: id },
    success: function (data) {
      alert("Successfully deleted");
      $("form").trigger("reset");
      showProductSizes();
    },
  });
}

//edit variation data
function variationEditForm(id) {
  $.ajax({
    url: "./adminView/editVariationForm.php",
    method: "post",
    data: { record: id },
    success: function (data) {
      $(".allContent-section").html(data);
    },
  });
}

function adminEditForm(id) {
  $.ajax({
    url: "./adminView/editAdminForm.php",
    method: "post",
    data: { record: id },
    success: function (data) {
      $(".allContent-section").html(data);
    },
  });
}

function bankEditForm(id) {
  $.ajax({
    url: "./adminView/editBankForm.php",
    method: "post",
    data: { record: id },
    success: function (data) {
      $(".allContent-section").html(data);
    },
  });
}

//update variation after submit
function updateVariations() {
  var v_id = $("#v_id").val();
  var product = $("#product").val();
  var size = $("#size").val();
  var qty = $("#qty").val();
  var unit_price = $("#unit_price").val();
  var fd = new FormData();
  fd.append("v_id", v_id);
  fd.append("product", product);
  fd.append("size", size);
  fd.append("qty", qty);
  fd.append("unit_price", unit_price);

  $.ajax({
    url: "./controller/updateVariationController.php",
    method: "post",
    data: fd,
    processData: false,
    contentType: false,
    success: function (data) {
      alert("Update Success.");
      $("form").trigger("reset");
      showProductSizes();
    },
  });
}

function updateAdmin() {
  var u_id = $("#u_id").val();
  var fname = $("#fname").val();
  var lname = $("#lname").val();
  var email = $("#email").val();
  var password = $("#password").val();
  var fd = new FormData();
  fd.append("u_id", u_id);
  fd.append("fname", fname);
  fd.append("lname", lname);
  fd.append("email", email);
  fd.append("password", password);

  $.ajax({
    url: "./controller/updateAdminController.php",
    method: "post",
    data: fd,
    processData: false,
    contentType: false,
    success: function (data) {
      alert("Update Success.");
      $("form").trigger("reset");
      showAdmin();
    },
  });
}

function updateBank() {
  var b_id = $("#b_id").val();
  var bname = $("#bname").val();
  var fname = $("#fname").val();
  var mname = $("#mname").val();
  var lname = $("#lname").val();
  var bnum = $("#bnum").val();

  var fd = new FormData();
  fd.append("b_id", b_id);
  fd.append("bname", bname);
  fd.append("fname", fname);
  fd.append("mname", mname);
  fd.append("lname", lname);
  fd.append("bnum", bnum);

  $.ajax({
    url: "./controller/updateBankController.php",
    method: "post",
    data: fd,
    processData: false,
    contentType: false,
    success: function (data) {
      alert("Update Success.");
      $("form").trigger("reset");
      showBank();
    },
  });
}

function search(id) {
  $.ajax({
    url: "./controller/searchController.php",
    method: "post",
    data: { record: id },
    success: function (data) {
      $(".eachCategoryProducts").html(data);
    },
  });
}

function quantityPlus(id) {
  $.ajax({
    url: "../customer-panel/controller/addQuantityController.php",
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
    url: "../customer-panel/controller/subQuantityController.php",
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

function checkout() {
  $.ajax({
    url: "./view/viewCheckout.php",
    method: "post",
    data: { record: 1 },
    success: function (data) {
      $(".allContent-section").html(data);
    },
  });
}

function removeFromWish(id) {
  $.ajax({
    url: "./controller/removeFromWishlist.php",
    method: "post",
    data: { record: id },
    success: function (data) {
      alert("Removed from wishlist");
    },
  });
}

function addToWish(id) {
  $.ajax({
    url: "./controller/addToWishlist.php",
    method: "post",
    data: { record: id },
    success: function (data) {
      alert("Added to wishlist");
    },
  });
}
