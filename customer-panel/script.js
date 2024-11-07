document.addEventListener("DOMContentLoaded", function () {
  const viewButtons = document.querySelectorAll(".view-btn");

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
});
