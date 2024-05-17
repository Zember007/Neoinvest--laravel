document.addEventListener("DOMContentLoaded", function() {

  class Switch {
    constructor(el) {
      this.$switchWrapper = el;
      this.$switch = this.$switchWrapper.querySelector(".switch");
      this.$switchBoxes = this.$switchWrapper.querySelectorAll(".switch-box");
      this.setup();
    }

    setup() {
      this.handleClick = this.handleClick.bind(this);
      this.$switch.addEventListener("click", this.handleClick);
    }

    handleClick(e) {
      const $switchTabClicked = e.target.closest(".switch-item"),
            $switchTab = this.$switch.querySelectorAll(".switch-item"),
            $switchValue = this.$switch.querySelector(".switch-value");
      
      if ($switchTabClicked && !$switchTabClicked.classList.contains("active")) {
        $switchTab.forEach(el => el.classList.remove("active"));
        $switchTabClicked.classList.add("active");
        $switchValue.value = $switchTabClicked.dataset.value;
      }
    }
  }

  const switches = document.querySelectorAll(".switch-wrapper");

  switches && switches.forEach(el => {
    const switchEl = new Switch(el);
  });

  const switchTabs = document.querySelectorAll(".switch.scroll-mobile");

  window.addEventListener("resize", (e) => {
    switchTabs.forEach(tab => {
      if (document.documentElement.clientWidth <= tab.dataset.scrollWidth) {
        tab.style.width = document.documentElement.clientWidth - 32 + 'px';
      }
    });
  
  })

});