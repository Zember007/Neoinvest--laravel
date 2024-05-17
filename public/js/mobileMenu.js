document.addEventListener("DOMContentLoaded", function() {

  const menuEl = document.querySelector(".menu"),
        sidebarEl = document.querySelector(".sb"),
        contentEl = document.querySelector(".content");

  menuEl.addEventListener("click", function() {
    menuEl.classList.toggle("active");
    sidebarEl.classList.toggle("active");
    console.log(sidebarEl.clientHeight, contentEl.clientHeight);
    if(sidebarEl.clientHeight > contentEl.clientHeight) {
      sidebarEl.style.height = sidebarEl.clientHeight + 'px';
    } else {
      sidebarEl.style.height = document.body.clientHeight + 'px';
    }
  });

});