document.addEventListener("DOMContentLoaded", function () {
  const buttons = document.querySelectorAll(".button");
  let currentFocus = 0;

  buttons.forEach((button, index) => {
    button.addEventListener("click", function () {
      buttonClick(index);
    });
  });

  document.addEventListener("keydown", function (event) {
    if (event.key === "A" || event.key === "a") {
      event.preventDefault();

      currentFocus = (currentFocus + 1) % buttons.length;
      buttons[currentFocus].focus();
    }
  });

  document.addEventListener("keydown", function (event) {
    if (event.key === "B" || event.key === "b") {
      event.preventDefault();
      buttons[currentFocus].click();
    }
  });

  document.addEventListener("keydown", function (event) {
    if (event.key === "C" || event.key === "c") {
      event.preventDefault();
      historyBack();
    }
  });
});

function historyBack() {
  if (window.history.length > 1) {
    window.history.back();
  } else {
    console.log("no history");
  }
}

function buttonClick(index) {
  switch (index) {
    case 0:
      alert("edward");

      break;

    case 1:
      alert("jonn");

      break;

    case 2:
      alert("ann-kristin");

      break;

    case 3:
      alert("maria");

      break;

    case 4:
      window.location = "/pageone";

      break;

    case 5:
      alert("måns");

      break;

    case 6:
      alert("tyra");

      break;

    case 7:
      window.location = "/pagethree";
      break;

    default:
      alert("unkown button ");
  }
}
