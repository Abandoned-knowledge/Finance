// const dropdownItems = document.querySelectorAll(".dropdown");

// dropdownItems.forEach((element) => {
//   const dropdownButton = element.querySelector(".dropdown__button");
//   const dropdownText = element.querySelector(".dropdown__text");
//   const dropdownListItems = element.querySelectorAll(".dropdown__item");
//   const dropdownInput = element.querySelector(".dropdown__input");

//   dropdownButton.addEventListener("click", function (event) {
//     element.classList.toggle("dropdown_open");
//   });
//   dropdownText.addEventListener("click", function (event) {
//     element.classList.toggle("dropdown_open");
//   });

//   dropdownListItems.forEach((element) => {
//     element.addEventListener("click", function (e) {
//       let text = this.innerText;
//       dropdownInput.value = text;
//       dropdownText.innerText = text;
//       dropdownButton.classList.remove("dropdown_open");
//       e.stopPropagation();
//     });
//   });

//   document.addEventListener("click", function (event) {
//     if (event.target !== dropdownButton) {
//       dropdownButton.classList.remove("dropdown_open");
//     }
//   });
// });

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
      input.value = item.innerText;
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
