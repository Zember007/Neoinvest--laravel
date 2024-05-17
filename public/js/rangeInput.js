document.addEventListener("DOMContentLoaded", function() {

  
  class Range {
    constructor (rangeElement, inputElement, valueElement, options) {
      this.rangeElement = rangeElement
      this.inputElement = inputElement
      this.valueElement = valueElement
      this.options = options

      // Attach a listener to "change" event
      this.rangeElement.addEventListener('input', this.updateSlider.bind(this));
      this.inputElement.addEventListener('input', this.updateSliderByInput.bind(this));
    }

    // Initialize the slider
    init() {
      this.rangeElement.setAttribute('min', this.options.min)
      this.rangeElement.setAttribute('max', this.options.max)
      this.rangeElement.value = this.options.cur
      this.inputElement.value = this.options.cur

      this.updateSlider()
    }

    // Format the money
    asMoney(value) {
      return '$' + parseFloat(value)
        .toLocaleString('en-US', { maximumFractionDigits: 2 })
    }

    generateBackground(rangeElement) {   
      if (this.rangeElement.value === this.options.min) {
        return
      }
      
      let percentage =  (this.rangeElement.value - this.options.min) / (this.options.max - this.options.min) * 100
      return 'background: linear-gradient(to right, #003FC4, #003FC4 ' + percentage + '%, #FFFFFF ' + percentage + '%, #FFFFFF 100%)'
    }

    updateSlider (newValue) {
      this.inputElement.value = this.rangeElement.value
      this.valueElement.innerHTML = this.asMoney(this.rangeElement.value)
      this.rangeElement.style = this.generateBackground(this.rangeElement.value)
    }

    updateSliderByInput() {
      this.rangeElement.value = this.inputElement.value 
      this.valueElement.innerHTML = this.asMoney(this.rangeElement.value)
      this.rangeElement.style = this.generateBackground(this.rangeElement.value)
    }
  }

  let rangeElems = document.querySelectorAll('.range [type="range"]');
  let valueElems = document.querySelectorAll('.range-value span');
  let rangeInputs = document.querySelectorAll('.input-range');

  rangeElems && rangeElems.forEach((rangeEl, index) => {
    let options = {
    min: rangeEl.dataset.min,
    max: rangeEl.dataset.max,
    cur: rangeEl.value
    }

    let range = new Range(rangeEl, rangeInputs[index], valueElems[index], options);

    range.init();

  });


});