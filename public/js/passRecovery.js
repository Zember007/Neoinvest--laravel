document.addEventListener("DOMContentLoaded", function() {

  const recInput = document.querySelectorAll(".recovery-code"),
        recBtn = document.querySelectorAll(".recovery-btn");

  recInput.forEach((input, index) => {
    input.addEventListener("input", () => {
      if (input.value == '') {
        recBtn[index].disabled = true;
      } else {
        recBtn[index].disabled = false;
      }
    });
  })

});