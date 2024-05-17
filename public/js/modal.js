document.addEventListener("DOMContentLoaded", function() {

  const modals = document.querySelectorAll(".modal__wrapper"),
        btns = document.querySelectorAll(".btn-modal__wrapper");

  btns.forEach(btn => {
    btn.addEventListener("click", function() {

      const modalEl = btn.querySelector(".modal__wrapper");

      modalEl.classList.add("active");
      document.body.classList.add("noscroll");

    });
  });

  modals.forEach(modalEl => {

    modalEl.addEventListener("click", function(e) {

      e.stopPropagation();
      
      const close = e.target.closest(".js-modal-close");

      if (close || e.target.classList.contains("modal__wrapper")) {
        modalEl.classList.remove("active");
        document.body.classList.remove("noscroll");
      }
    });

    if (document.documentElement.clientWidth < 991) {

      const inputs = modalEl.querySelectorAll('input[type="text"], input[type="tel"], input[type="email"], input[type="password"]');

      inputs.forEach(input => {
        input.addEventListener("focus", function() {
          modalEl.style.alignItems = 'flex-start';
        });
        input.addEventListener("blur", function() {
          modalEl.style.alignItems = 'center';
        });
      });
      
    }

  });

});