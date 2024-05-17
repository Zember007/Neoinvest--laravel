document.addEventListener("DOMContentLoaded", function() {

  const tableWrappers = document.querySelectorAll(".table-wrapper");

  function tableResize() {
    tableWrappers.forEach(tableWrap => {

      let docWidth = document.documentElement.clientWidth;
      
      if (tableWrap.classList.contains("inv-table__wrapper")) {
        if (docWidth > 1201 && docWidth < 1368) {

          let profileWidth = document.querySelector(".a1__wrapper").clientWidth;
          let sbWidth = document.querySelector(".sb").clientWidth;
          let tableWidth = docWidth - sbWidth - profileWidth - 60 - 40;

          tableWrap.style.width = tableWidth + 'px';
  
        }
      }
  
    });
  }

  tableResize();

  window.addEventListener("resize", () => {

    tableResize();

  });

  // таблица в финансах

  const finReps =  document.querySelectorAll(".fin-rep");

  function resize() {
    finReps.forEach(finRep => {

      let docWidth = document.documentElement.clientWidth,
          tableWidth;

      let profileWidth = document.querySelector(".a1__wrapper").clientWidth;
      let sbWidth = document.querySelector(".sb").clientWidth;

    
      if (docWidth > 1681 ) {
        tableWidth = docWidth - sbWidth - profileWidth - 60 - 40;
      } else if (docWidth > 1201 && docWidth < 1681) {
        tableWidth = docWidth - sbWidth - profileWidth - 60;
      }

      finRep.style.width = tableWidth + 'px';
  
    });
  }

  if (document.documentElement.clientWidth > 1201) {
    resize();

    window.addEventListener("resize", () => {

      resize();

    });
  
  }



});