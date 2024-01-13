const menuOpenDropdown = document.querySelector(".menu__dropdown");
const navProfile = document.querySelector(".nav-profile__main");

menuOpenDropdown.addEventListener("mouseover", function() {
    this.classList.add("menu__dropdown_open");
})
menuOpenDropdown.addEventListener("mouseout", function() {
    this.classList.remove("menu__dropdown_open");
})

navProfile.addEventListener("click", function () {
    this.parentElement.classList.toggle("nav-profile_open");
})

window.addEventListener("click", function (event) {
    if (!event.target.closest(".nav-profile")) {
        navProfile.parentElement.classList.remove("nav-profile_open");
    }
    event.stopPropagation();
})