const menuOpenDropdown = document.querySelector(".menu__dropdown");
const navProfile = document.querySelector(".nav-profile__main");
const navLinks = document.querySelectorAll(".menu .menu__link");

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

document.addEventListener("DOMContentLoaded", function () {
  let path = window.location.pathname;

  for (let i = 0; i < navLinks.length; i++) {
    try {
      if (navLinks[i].getAttribute("href").includes(path)) {
        navLinks[i].classList.add("menu__link--selected");
        break;
      }
    } catch (error) {
      navLinks[i].classList.add("menu__link--selected");
    }
  }
});
