document.addEventListener("DOMContentLoaded", function() {

  const progressElems = document.querySelectorAll(".pr-placeholder");

  progressElems.forEach(pr => {
    const prLine = pr.querySelector(".pr-progress");
    let fullNum = parseInt(pr.dataset.fullness, 10);

    if(fullNum >= 0 && fullNum <= 100) {
      prLine.style.width = `${fullNum}%`
    }

  })

});