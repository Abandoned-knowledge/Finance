// document.addEventListener("DOMContentLoaded", () => {
//   document.addEventListener("click", function (e) {
//     if (e.target.tagName === "A") {
//       route(e);
//     }
//     e.preventDefault();
//   });

//   const routers = {
//     "/": "./index.html",
//     "/income": "./pages/income.html",
//     "/expenses": "./pages/expenses.html",
//     "/report-expenses": "./pages/report-expenses.html",
//     "/report-income": "./pages/report-income.html",
//     "/profile": "./pages/profile.html",
//     "/exit": "./pages/exit.html",
//   };

//   const route = (e) => {
//     window.history.pushState({}, "", e.target.href);
//     handleLocation();
//   };

//   const handleLocation = async () => {
//     const path = window.location.pathname;
//     const html = await fetch(routers[path]).then((response) => response.text());
//     document.querySelector(".main").innerHTML = html;
//   };

//   window.onpopstate = handleLocation;
//   window.route = route;
// });
