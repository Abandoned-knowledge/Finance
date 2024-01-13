const menuOpenDropdown = document.querySelector(".menu__dropdown");
menuOpenDropdown.addEventListener("mouseover", function() {
    this.classList.add("menu__dropdown_open");
})
menuOpenDropdown.addEventListener("mouseout", function() {
    this.classList.remove("menu__dropdown_open");
})