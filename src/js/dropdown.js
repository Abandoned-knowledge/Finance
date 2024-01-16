const dropdownButton = document.querySelector(".dropdown__button");
const dropdownText = dropdownButton.querySelector(".dropdown__text");
const dropdownListItems = document.querySelectorAll(".dropdown__item");
const dropdownInput = document.querySelector(".dropdown__input");

dropdownButton.addEventListener("click", function (event) {
  this.classList.toggle("dropdown_open");
});

dropdownListItems.forEach((element) => {
  element.addEventListener("click", function () {
    let text = this.innerText;
    dropdownInput.value = text;
    dropdownText.innerText = text;
  });
});

document.addEventListener("click", function (event) {
  if (!event.target.closest(".dropdown")) {
    dropdownButton.classList.remove("dropdown_open");
  }
});
