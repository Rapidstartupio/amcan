(function () {
    "use strict";

    function b(a) {
      return a.split("").reverse().join("");
    }

    function c(a, b) {
      return a.substring(0, b.length) === b;
    }

    function d(a, b) {
      return a.slice(-1 * b.length) === b;
    }

    function e(a, b, c) {
      if ((a[b] || a[c]) && a[b] === a[c]) throw new Error(b);
    }

    function f(a) {
      return typeof a === "number" && isFinite(a);
    }

    function g(a, b) {
      var c = Math.pow(10, b);
      return (Math.round(a * c) / c).toFixed(b);
    }

    function h(a, c, d, e, h, i, j, k, l, m, n, o) {
      var q,
        r,
        s,
        p = o,
        t = "",
        u = "";

      if (i) o = i(o);

      if (f(o)) {
        if (a !== false && parseFloat(o.toFixed(a)) === 0) o = 0;

        if (o < 0) {
          q = true;
          o = Math.abs(o);
        }

        if (a !== false) o = g(o, a);

        o = o.toString();

        if (o.indexOf(".") !== -1) {
          r = o.split(".");
          s = r[0];

          if (d) t = d + r[1];
        } else {
          s = o;
        }

        if (c) {
          s = b(s).match(/.{1,3}/g);
          s = b(s.join(b(c)));
        }

        if (q && k) u += k;
        if (e) u += e;
        if (q && l) u += l;

        u += s;
        u += t;
        if (h) u += h;
        if (m) u = m(u, p);

        return u;
      } else {
        return false;
      }
    }

    function i(a, b, e, g, h, i, j, k, l, m, n, o) {
      var q,
        r = "";

      if (n) o = n(o);

      if (o && typeof o === "string") {
        if (k && c(o, k)) {
          o = o.replace(k, "");
          q = true;
        }

        if (g && c(o, g)) o = o.replace(g, "");

        if (l && c(o, l)) {
          o = o.replace(l, "");
          q = true;
        }

        if (h && d(o, h)) o = o.slice(0, -1 * h.length);
        if (b) o = o.split(b).join("");
        if (e) o = o.replace(e, ".");

        if (q) r += "-";
        r += o;
        r = r.replace(/[^0-9\.\-.]/g, "");

        if (r === "") {
          return false;
        } else {
          r = Number(r);
          if (j) r = j(r);
          if (f(r)) return r;
          else return false;
        }
      } else {
        return false;
      }
    }

    function j(b) {
      var c,
        d,
        f,
        g = {};

      for (c = 0; c < a.length; c += 1) {
        d = a[c];
        f = b[d];

        if (typeof f === "undefined") {
          if (d !== "negative" || g.negativeBefore) {
            if (d === "mark" && g.thousand !== ".") {
              g[d] = ".";
            } else {
              g[d] = false;
            }
          } else {
            g[d] = "-";
          }
        } else {
          if (d === "decimals") {
            if (!(f >= 0 && f < 8)) throw new Error(d);
          } else if (
            d === "encoder" ||
            d === "decoder" ||
            d === "edit" ||
            d === "undo"
          ) {
            if (typeof f !== "function") throw new Error(d);
          } else {
            if (typeof f !== "string") throw new Error(d);
          }

          g[d] = f;
        }
      }

      e(g, "mark", "thousand");
      e(g, "prefix", "negative");
      e(g, "prefix", "negativeBefore");

      return g;
    }

    function k(b, c, d) {
      var e,
        f = [];

      for (e = 0; e < a.length; e += 1) {
        f.push(b[a[e]]);
      }

      f.push(d);

      return c.apply("", f);
    }

    function l(a) {
      if (this instanceof l) {
        if (typeof a === "object") {
          a = j(a);

          this.to = function (b) {
            return k(a, h, b);
          };

          this.from = function (b) {
            return k(a, i, b);
          };
        }
      } else {
        return new l(a);
      }
    }

    var a = [
      "decimals",
      "thousand",
      "mark",
      "prefix",
      "postfix",
      "encoder",
      "decoder",
      "negativeBefore",
      "negative",
      "edit",
      "undo"
    ];
    window.wNumb = l;
  })();

  document.addEventListener("DOMContentLoaded", function () {
    // Variables
    var amountSlider = document.getElementById("amount-slider");
    var amountInput = document.getElementById("amount-input");
    var fixedFeeInput = document.getElementById("fixed-fee");
    var fixedFee = 5;

    // Create Loan amount Slider
    noUiSlider.create(amountSlider, {
        start: 30,
        connect: "lower",
        range: {
          min: 30,
          '33%': 60,
          max: 100
        },
        snap: true,
        format: wNumb({
          mark: ".",
          decimals: 0,
          thousand: ",",
          prefix: "$"
        })
      });

    // On Update pass Amount Slider value to Amount Input
    amountSlider.noUiSlider.on("update", function (values, handle) {
      amountInput.value = values[handle];
      calculate();
    });

    // On Change Pass Amount Input value to Amount Slider
    amountInput.addEventListener("change", function () {
      amountSlider.noUiSlider.set(this.value);
      calculate();
    });

    // On Change Pass Fixed Fee Input value to calculate
    fixedFeeInput.addEventListener("change", function () {
      calculate();
    });

    /*function calculate() {
      // Store elements in calculator
      // Store elements in calculator
      var amountRaw = amountInput.value;
      var loanAmount = parseFloat(amountRaw.replace(/[^0-9.-]+/g, "")) || 0;
      var loanTerm = parseInt(document.getElementById("loan-term").value);
      var fixedFeePercentage = fixedFee; // Use fixedFee variable for percentage

      // Calculate the fixed fee as a percentage of the loan amount
      var fixedFeeValue = (loanAmount * fixedFeePercentage) / 100;

      // Update the fixed fee input element
      document.getElementById("fixed-fee").value =
        "$" + formatNumber(fixedFeeValue.toFixed(0));

      // Calculate the total loan amount
      var totalLoan = loanAmount + fixedFeeValue;

      // Update the total loan amount element
      document.getElementById("loan-total").innerHTML =
        "$" + formatNumber(totalLoan.toFixed(0));

      var loanFrequency = document.querySelector(
        ".calculator .loan-frequency option:checked"
      ).value;

      var intervalOutput = document.getElementById("payment-frequency");

      var repayment = "";
      if (loanTerm > 0) {
        var loanTermMonths = loanTerm * 12;
        var repaymentRaw = totalLoan / loanTermMonths / loanFrequency;
        repayment = repaymentRaw.toFixed(2);
      } else {
        repayment = "N/A";
      }

      document.getElementById("loan-repayment").innerHTML = "$ " + repayment;

      if (loanFrequency == 1) {
        intervalOutput.innerHTML = "per month";
      } else if (loanFrequency == 2) {
        intervalOutput.innerHTML = "per fortnight";
      } else {
        intervalOutput.innerHTML = "per week";
      }
    }*/

    function calculate() {
        var loanRepaymentAmount = parseFloat(amountInput.value.replace('$', '')) || 0;
        var loanTermMonths = 24; // Fixed term at 24 months
        var fixedFee = 99; // Fixed fee at $99
        var totalLoan = (loanRepaymentAmount * loanTermMonths) + fixedFee;

        // Update the total loan amount element
        document.getElementById("loan-total").innerHTML = "$" + formatNumber(totalLoan);

        // Update the loan repayment
        document.getElementById("loan-repayment").innerHTML = "$" + loanRepaymentAmount;
        document.getElementById("payment-frequency").innerHTML = "per month";
    }

    function formatNumber(number) {
      return new Intl.NumberFormat("en-US").format(number);
    }
    calculate();

    var calculatorInputs = document.querySelectorAll(".calculator input");
    for (var i = 0; i < calculatorInputs.length; i++) {
      calculatorInputs[i].addEventListener("keyup", function () {
        calculate();
      });
    }

    var calculatorSelects = document.querySelectorAll(".calculator select");
    for (var j = 0; j < calculatorSelects.length; j++) {
      calculatorSelects[j].addEventListener("change", function () {
        calculate();
      });
    }
  });
