const dropdowns = document.querySelectorAll(".dropdown");

dropdowns.forEach((dropdown) => {
  const button = dropdown.querySelector(".dropdown__button");
  const buttonText = dropdown.querySelector(".dropdown__text");
  const listItems = dropdown.querySelectorAll(".dropdown__item");
  const input = dropdown.querySelector(".dropdown__input");

  button.addEventListener("click", function (event) {
    dropdown.classList.toggle("dropdown_open");
  });

  listItems.forEach((item) => {
    item.addEventListener("click", function () {
      let text = item.querySelector(".dropdown__item--id");
      input.value = text.innerText;
      buttonText.innerText = item.innerText;
      dropdown.classList.remove("dropdown_open");
    });
  });

  document.addEventListener("click", function (event) {
    if (
      event.target !== button && 
      event.target !== button.lastElementChild &&
      event.target !== button.firstElementChild
      ) {
      dropdown.classList.remove("dropdown_open");
    }
  });
});