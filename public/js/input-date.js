const inputDate = document.querySelector(".input__content--date");
let fullDate = new Date();

function normalDate(date) {
  let day = date.getDate();
  let month = date.getMonth() + 1;
  let year = date.getFullYear();

  if (month < 10) {
    month = "0" + month;
  }

  return `${year}-${month}-${day}`;
}

inputDate.value = normalDate(fullDate);
