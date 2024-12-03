document.addEventListener("DOMContentLoaded", function () {
  const viewButtons = document.querySelectorAll(".view-btn");
  const addToCartButton = document.querySelectorAll(".add-to-cart");

  viewButtons.forEach((button) => {
    button.addEventListener("click", function () {
      const productName = this.getAttribute("data-name");
      const productDesc = this.getAttribute("data-desc");
      const productImage = this.getAttribute("data-image");

      console.log(productName, productDesc, productImage);

      document.getElementById("modalProductName").textContent = productName;
      document.getElementById("modalProductDescription").textContent =
        productDesc;
      document.getElementById("modalProductImage").src =
        "../admin_panel" + productImage;
    });
  });

  // addToCartButton.forEach((button) => {
  //   button.addEventListener("click", function () {
  //     const productName = this.getAttribute("data-name");
  //     const productImage = this.getAttribute("data-image");
  //     const productId = this.getAttribute("data-id");

  //     console.log(productId);

  //     document.getElementById("modalAdcProductName").textContent = productName;
  //     document.getElementById("modalAdcProductImage").src =
  //       "../admin_panel" + productImage;
  //   });
  // });
});

function updatePrice(productId) {
  // Get the select element by ID
  const selectElement = document.getElementById("sizeSelect-" + productId);
  // Get the selected option
  const selectedOption = selectElement.options[selectElement.selectedIndex];

  if (selectedOption) {
    // Get the unit price and variation ID from the data attributes
    const unitPrice = selectedOption.getAttribute("data-price");
    const variationId = selectedOption.getAttribute("data-variation-id");

    // Update the price display
    document
      .getElementById("priceDisplay-" + productId)
      .querySelector(".price-value").textContent = unitPrice
      ? "₱" + parseFloat(unitPrice).toFixed(2)
      : "₱0.00";

    // Store the selected variation ID in the hidden input
    const hiddenInput = document.querySelector(".variationId-" + productId);
    if (hiddenInput) {
      hiddenInput.value = variationId;
    } else {
      console.error("Error: Hidden input not found for product " + productId);
    }

    // Log the variation_id to the console
    console.log(
      "Selected variation_id for product " + productId + ": " + variationId
    );
  } else {
    console.error("Error: No valid option selected.");
  }
}
