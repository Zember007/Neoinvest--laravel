document.addEventListener("DOMContentLoaded", function() {

  const links = document.querySelectorAll(".link-copy");

  links.forEach(link => {
    const input = link.querySelector(".link-copy-input"),
          notif = link.querySelector(".link-copy-hint__text");

    link.addEventListener("click", function() {
      input.select();
      document.execCommand("copy");
      input.blur();

      notif.classList.remove("hidden");
      notif.classList.add("active");

      setTimeout(() => {
        notif.classList.add("hidden");
        notif.classList.remove("active");
      }, 1000);
    });
  })

});