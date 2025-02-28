var modal = document.getElementById("myModal");
var btn = document.getElementById("modalButton");
var span = document.getElementsByClassName("close")[0];
var larar = document.getElementById("lararschem");

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
      modal.style.display = "none";
    }
  });
});

function buttonClick(index) {
  const buttons = document.querySelectorAll(".button");

  if (buttons[index].id === "left") {
    updateIndex("left");
  } else if (buttons[index].id === "right") {
    updateIndex("right");
  } else {
    modal.style.display = "block";
    const teacher = buttons[index].id;
    const dayOfWeek = new Date().getDay() - 1;
    const currentTime = new Date().toLocaleTimeString([], {
      hour: "2-digit",
      minute: "2-digit",
    });

    fetch(
      `/fetch_schedule?selectedTeacher=${teacher}&dayOfWeek=${dayOfWeek}&currentTime=${currentTime}`
    )
      .then((response) => response.text())
      .then((data) => {
        larar.innerHTML = data;
      });
  }
}

function updateIndex(direction) {
  let xhr = new XMLHttpRequest();
  xhr.open("POST", "/scripts/indexControl.php", true);
  xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
  xhr.onreadystatechange = function () {
    if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
      location.reload();
    }
  };
  xhr.send("direction=" + direction);
}
