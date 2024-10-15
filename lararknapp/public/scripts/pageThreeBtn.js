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
      alert("anna-lena");

      break;

    case 1:
      alert("chandra");

      break;

    case 2:
      alert("pauline");

      break;

    case 3:
      alert("katarina");

      break;

    case 4:
      window.location = "/pagetwo";

      break;

    default:
      alert("unkown button ");
  }
}
