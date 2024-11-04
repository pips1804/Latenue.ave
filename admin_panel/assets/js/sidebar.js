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
}

function toggleInventoryDropdown() {
  var dropdown = document.querySelector(".inventory-container");
  dropdown.style.display = dropdown.style.display === "none" ? "block" : "none";

  var dropdown1 = document.querySelector(".prod-info-container");
  dropdown1.style.display = "none";
}
