const menuOpenDropdown = document.querySelector(".menu__dropdown");
const navProfile = document.querySelector(".nav-profile__main");
const navLinks = document.querySelectorAll(".menu .nav__link");

menuOpenDropdown.addEventListener("mouseover", function () {
  this.classList.add("menu__dropdown_open");
});
menuOpenDropdown.addEventListener("mouseout", function () {
  this.classList.remove("menu__dropdown_open");
});

navProfile.addEventListener("click", function () {
  this.parentElement.classList.toggle("nav-profile_open");
});

window.addEventListener("click", function (event) {
  if (!event.target.closest(".nav-profile")) {
    navProfile.parentElement.classList.remove("nav-profile_open");
  }
  event.stopPropagation();
});

// document.addEventListener("DOMContentLoaded", function (event) {
//   let path = window.location.pathname;

//   console.log(path);

//   for (const item of navLinks) {
//     if (item.getAttribute("href").includes(path)) {
//       item.classList.add("menu__link--selected");
//       break;
//     }
//     if (item.getAttribute("href").includes("/pages/report-income.html") || item.getAttribute("href").includes("/pages/report-expenses.html")) {
//       console.log(1);
//       item.parentElement.parentElement.classList.add("menu__link--selected");
//     }
//   }
// });
