document.addEventListener("DOMContentLoaded", function() {

  data = {
    values: [
      {
        valueOffsetX: 23,
        valueOffsetY: 38,
        dot1: 33,
        dot2: 20,
        dot3: 34
      },
      {
        valueOffsetX: 39,
        valueOffsetY: 54,
        dot1: 48,
        dot2: 37,
        dot3: 49
      },
      {
        valueOffsetX: 56,
        valueOffsetY: 71,
        dot1: 65,
        dot2: 53,
        dot3: 66
      },
      {
        valueOffsetX: 73,
        valueOffsetY: 88,
        dot1: 80,
        dot2: 70,
        dot3: 80
      },
      {
        valueOffsetX: 89,
        valueOffsetY: 104,
        dot1: 95,
        dot2: 86,
        dot3: 95
      },
      {
        valueOffsetX: 106,
        valueOffsetY: 121,
        dot1: 111,
        dot2: 103,
        dot3: 111
      },
      {
        valueOffsetX: 123,
        valueOffsetY: 138,
        dot1: 128,
        dot2: 120,
        dot3: 128
      },
      {
        valueOffsetX: 142,
        valueOffsetY: 157,
        dot1: 145,
        dot2: 139,
        dot3: 145
      },
      {
        valueOffsetX: 162,
        valueOffsetY: 176,
        dot1: 163,
        dot2: 159,
        dot3: 163
      },
      {
        valueOffsetX: 184,
        valueOffsetY: 198,
        dot1: 183,
        dot2: 181,
        dot3: 183
      },
      {
        valueOffsetX: 201,
        valueOffsetY: 216,
        dot1: 197,
        dot2: 199,
        dot3: 197
      },
      {
        valueOffsetX: 223,
        valueOffsetY: 238,
        dot1: 217,
        dot2: 221,
        dot3: 217
      },
      {
        valueOffsetX: 243,
        valueOffsetY: 257,
        dot1: 236,
        dot2: 241,
        dot3: 236
      },
      {
        valueOffsetX: 262,
        valueOffsetY: 276,
        dot1: 252,
        dot2: 260,
        dot3: 252
      },
      {
        valueOffsetX: 280,
        valueOffsetY: 294,
        dot1: 270,
        dot2: 277,
        dot3: 270
      },
      {
        valueOffsetX: 296,
        valueOffsetY: 311,
        dot1: 285,
        dot2: 294,
        dot3: 285
      },
      {
        valueOffsetX: 312,
        valueOffsetY: 326,
        dot1: 300,
        dot2: 310,
        dot3: 300
      },
      {
        valueOffsetX: 329,
        valueOffsetY: 343,
        dot1: 315,
        dot2: 327,
        dot3: 315
      },
      {
        valueOffsetX: 346,
        valueOffsetY: 360,
        dot1: 332,
        dot2: 344,
        dot3: 332
      },
      {
        valueOffsetX: 362,
        valueOffsetY: 376,
        dot1: 347,
        dot2: 360,
        dot3: 347
      }
    ],
    endValue: '<path d="M13.4243 8.53195C14.9536 3.46613 19.6206 0 24.9123 0H355.088C360.379 0 365.046 3.46613 366.576 8.53194L378.953 49.5319C379.636 51.7936 379.636 54.2064 378.953 56.4681L366.576 97.4681C365.046 102.534 360.379 106 355.088 106H24.9123C19.6206 106 14.9536 102.534 13.4243 97.4681L1.04696 56.4681C0.364204 54.2064 0.364203 51.7936 1.04696 49.5319L13.4243 8.53195Z" fill="url(#paint0_linear)"/>'
  }

  function renderProgress(data, path, valueElem, isFull) {

    if (!isFull) {
      const {valueOffsetX, valueOffsetY, dot1, dot2, dot3} = data;

      path.outerHTML = `
        <path d="
        M 13.4243 8.53195
        C 14.9536 3.46613 19.6206 0 24.9123 0
        H ${dot1}
        L ${dot2} 52.0982
        L ${dot3} 106
        H 24.9123
        C 19.6206 106 14.9536 102.534 13.4243 97.4681
        L 1.04696 56.4681
        C 0.364204 54.2064 0.364203 51.7936 1.04696 49.5319
        L 13.4243 8.53195Z"
        fill="url(#paint0_linear)"
      />
      `;

      if (document.documentElement.clientWidth > 1201) {
        valueElem.style.left = `${valueOffsetX}px`
      } else {
        valueElem.style.left = `${valueOffsetY}px`
      }

    } else {
      path.outerHTML = data;
      progressValElem.style.display = 'none';
    }
  }

  const progressLine = document.querySelector(".prbar-progress path"),
        progressValElem = document.querySelector(".prbar-val"),
        progressPercent = document.querySelector(".prbar-val-num");

  let value = document.querySelector(".prbar-input").value;

  value = Math.round(value / 5) * 5;

  let index = value / 5;

  if (value >= 0 && value <= 96) {
    renderProgress(data.values[index], progressLine, progressValElem, false);
    progressPercent.textContent = value;
  } else if (value > 95 && value <= 100) {
    renderProgress(data.endValue, progressLine, progressValElem, true);
    progressPercent.textContent = value;
  } else {
    renderProgress(data.values[0], progressLine, progressValElem, false);
    progressPercent.textContent = '?';
  }

});
