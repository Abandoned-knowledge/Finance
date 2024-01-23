const popup = document.querySelector(".popup");
const closePopup = popup.querySelector(".popup__close");

closePopup.addEventListener("click", function () {
    popup.classList.remove("popup--open");
})