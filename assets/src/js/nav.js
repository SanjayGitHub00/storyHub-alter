let overlay = document.querySelector(".overlay");
let mobileMenu = document.querySelector(".mobile__sidebar_menu");
let hamburger = document.querySelector(".hamburger");
let closeBtn = document.querySelector(".closeBtn");
let searchBtn = document.querySelector(".searchBtn");
let searchForm = document.querySelector(".search__form_bar");
let formClose = document.getElementById("close-btn");

function removeHide() {
  mobileMenu.classList.remove("hide");
  overlay.classList.remove("hide");

  mobileMenu.classList.add("show");
  overlay.classList.add("show");
}

function removeShow() {
  overlay.classList.remove("show");
  mobileMenu.classList.remove("show");

  mobileMenu.classList.add("hide");
  overlay.classList.add("hide");
}

hamburger.addEventListener("click", () => {
  // remove the default hide class
  removeHide();
});
overlay.addEventListener("click", () => {
  // remove the default hide class
  removeShow();
});
closeBtn.addEventListener("click", () => {
  removeShow();
});
document.addEventListener("keydown", function (e) {
  if (e.key === "Escape" && !mobileMenu.classList.contains("hide")) {
    removeShow();
  }
});

// Search form
let toggleHide = function () {
  searchForm.classList.toggle("hide");
};
searchBtn.addEventListener("click", () => {
  // searchForm.classList.toggle("hide");
  toggleHide();
});
formClose.addEventListener("click", () => {
  // searchForm.classList.add("hide");
  toggleHide();
});
