// Toggle mobile menu
const toggle = document.querySelector(".mobile-menu-toggle");
const menu = document.getElementById("mobileMenu");

if (toggle && menu) {
  toggle.addEventListener("click", () => {
    menu.style.display = menu.style.display === "block" ? "none" : "block";
  });
}
