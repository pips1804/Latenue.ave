function openNav() {
  document.getElementById("mySidebar").classList.toggle("side-bar-show");

  if (
    document.getElementById("mySidebar").classList.contains("side-bar-show")
  ) {
    document.body.style.overflow = "hidden";
  } else {
    document.body.style.overflow = "";
  }
}

function closeNav() {
  document.getElementById("mySidebar").classList.remove("side-bar-show");

  document.body.style.overflow = "";
}

// function togglePayInfoDropdown() {
//   var dropdown = document.querySelector(".pay-info-container");
//   dropdown.style.display = dropdown.style.display === "none" ? "block" : "none";
// }

function toggleProdInfoDropdown() {
  var dropdown = document.querySelector(".prod-info-container");
  dropdown.style.display = dropdown.style.display === "none" ? "block" : "none";

  var dropdown1 = document.querySelector(".inventory-container");
  dropdown1.style.display = "none";

  var dropdown2 = document.querySelector(".bank-container");
  dropdown2.style.display = "none";

  var dropdown2 = document.querySelector(".order-container");
  dropdown2.style.display = "none";
}

function toggleInventoryDropdown() {
  var dropdown = document.querySelector(".inventory-container");
  dropdown.style.display = dropdown.style.display === "none" ? "block" : "none";

  var dropdown1 = document.querySelector(".prod-info-container");
  dropdown1.style.display = "none";

  var dropdown2 = document.querySelector(".bank-container");
  dropdown2.style.display = "none";

  var dropdown2 = document.querySelector(".order-container");
  dropdown2.style.display = "none";
}

function togglePaymentDropdown() {
  var dropdown = document.querySelector(".bank-container");
  dropdown.style.display = dropdown.style.display === "none" ? "block" : "none";

  var dropdown1 = document.querySelector(".prod-info-container");
  dropdown1.style.display = "none";

  var dropdown2 = document.querySelector(".inventory-container");
  dropdown2.style.display = "none";

  var dropdown2 = document.querySelector(".order-container");
  dropdown2.style.display = "none";
}

function toggleOrderDropdown() {
  var dropdown = document.querySelector(".order-container");
  dropdown.style.display = dropdown.style.display === "none" ? "block" : "none";

  var dropdown1 = document.querySelector(".prod-info-container");
  dropdown1.style.display = "none";

  var dropdown2 = document.querySelector(".inventory-container");
  dropdown2.style.display = "none";

  var dropdown2 = document.querySelector(".bank-container");
  dropdown2.style.display = "none";
}
