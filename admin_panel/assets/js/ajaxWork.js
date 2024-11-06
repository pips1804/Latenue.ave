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

//add product data

// $(document).ready(function () {
//   $("#addProductForm").on("submit", function (e) {
//     e.preventDefault(); // Prevent the form from submitting in the traditional way
//     addItems(); // Call the addItems() function via AJAX
//   });
// });

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

//delete cart data
function cartDelete(id) {
  $.ajax({
    url: "./controller/deleteCartController.php",
    method: "post",
    data: { record: id },
    success: function (data) {
      alert("Cart Item Successfully deleted");
      $("form").trigger("reset");
      showMyCart();
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
    url: "./controller/addQuantityController.php",
    method: "post",
    data: { record: id },
    success: function (data) {
      $("form").trigger("reset");
      showMyCart();
    },
  });
}
function quantityMinus(id) {
  $.ajax({
    url: "./controller/subQuantityController.php",
    method: "post",
    data: { record: id },
    success: function (data) {
      $("form").trigger("reset");
      showMyCart();
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
