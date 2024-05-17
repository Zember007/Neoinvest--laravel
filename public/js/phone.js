document.addEventListener("DOMContentLoaded", function() {
  class Phone {
    constructor(el) {
      this.$dd = el;
      this.$selectedItem = this.$dd.querySelector(".selected");
      this.$input = this.$dd.querySelector(".ph-value");
      this.setup();
      this.setCountry();
    }

    setup() {
      this.handleClick = this.handleClick.bind(this);
      this.handleOutClick = this.handleOutClick.bind(this);
      this.$dd.addEventListener("click", this.handleClick);
      document.addEventListener("click", this.handleOutClick);
    }

    setCountry() {
      const item = this.$dd.querySelector(`.ph-list-item[data-value="${this.$input.value}"]`);
      const flag = item.querySelector(".flag");
      this.$selectedItem.innerHTML = flag.outerHTML;
      this.$input.value = item.dataset.value;
    }

    handleClick(e) {

      this.$selectedItem = this.$dd.querySelector(".selected");
      const clickedItem = e.target.closest(".ph-list-item");
      if (clickedItem) {
        const flag = clickedItem.querySelector(".flag");
        this.$selectedItem.innerHTML = flag.outerHTML;
        this.$input.value = clickedItem.dataset.value;
        this.$input.dispatchEvent(new Event("change"));
      }

      if (this.$dd.classList.contains("active")) {
        this.close();
      } else {
        this.open();
      }

    }

    handleOutClick(e) {
      let path = e.path || (e.composedPath && e.composedPath());
      if (path) {
        if (!path.includes(this.$dd)) {
          this.close();
        }
      }
    }

    open() {
      this.$dd.classList.add("active");
    }

    close() {
      this.$dd.classList.remove("active");
    }

    toggle() {
      this.$dd.classList.toggle("active");
    }
  }

  const ddElems = document.querySelectorAll(".ph-dd");

  ddElems && ddElems.forEach(el => {
    const dd = new Phone(el);
  });

  // ==============================

  var phoneMask = function (e) {

    var el = e.target,
    clearVal = el.dataset.phoneClear,
    pattern = el.dataset.phonePattern,
    matrix_def = "+7(___) ___-__-__",
    matrix = pattern ? pattern : matrix_def,
    i = 0,
    def = matrix.replace(/\D/g, ""),
    val = e.target.value.replace(/\D/g, "");

    if (clearVal !== 'false' && e.type === 'blur') {
        if (val.length < matrix.match(/([\_\d])/g).length) {
            e.target.value = '';
            return;
        }
    }
    if (def.length >= val.length) val = def;
    e.target.value = matrix.replace(/./g, function (a) {
        return /[_\d]/.test(a) && i < val.length ? val.charAt(i++) : i >= val.length ? "" : a
    });
  }

  var phone_inputs = document.querySelectorAll('[data-phone-pattern]');
  for (let elem of phone_inputs) {
      for (let ev of ['input', 'blur', 'focus']) {
          elem.addEventListener(ev, phoneMask);
      }
  }

  const countryData = [
    {
      code: 'ru',
      phoneCode: '+7',
      phoneMask: '+7 (___) ___-__-__'
    },
    {
      code: 'ua',
      phoneCode: '+380',
      phoneMask: '+380 (__) ___-__-__'
    },
    {
      code: 'by',
      phoneCode: '+375',
      phoneMask: '+375 (__) ___-__-__'
    },
    {
      code: 'az',
      phoneCode: '+994',
      phoneMask: '+994 (__) ___-__-__'
    },
    {
      code: 'am',
      phoneCode: '+374',
      phoneMask: '+374 (__) ___-__-__'
    },
    {
      code: 'kz',
      phoneCode: '+7',
      phoneMask: '+7 (___) ___-__-__'
    },
    {
      code: 'kg',
      phoneCode: '+996',
      phoneMask: '+996 (__) ___-__-__'
    },
    {
      code: 'md',
      phoneCode: '+373',
      phoneMask: '+373 (__) ___-__-__'
    },
    {
      code: 'tg',
      phoneCode: '+992',
      phoneMask: '+992 (__) ___-__-__'
    },
    {
      code: 'tm',
      phoneCode: '+993',
      phoneMask: '+993 (__) ___-__-__'
    },
    {
      code: 'uz',
      phoneCode: '+998',
      phoneMask: '+998 (__) ___-__-__'
    },
  ]

  function setPhoneMask(code) {
    for (let i = 0; i < countryData.length; i++) {
      if (code === countryData[i].code) {
        phoneInput.value = '';
        phoneInput.placeholder = countryData[i].phoneCode;
        phoneInput.dataset.phonePattern = countryData[i].phoneMask;
        break;
      }
    }
  }

  const countrySelected = document.querySelector(".ph-value"),
        phoneInput = document.querySelector(".ph-input");

  setPhoneMask(countrySelected.value);

  if (phoneInput.dataset.phone) {
    phoneInput.value = phoneInput.dataset.phone;
  }

  countrySelected.addEventListener("change", () => setPhoneMask(countrySelected.value));

});
