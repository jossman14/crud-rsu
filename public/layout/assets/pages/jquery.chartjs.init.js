/**
 * Theme: Frogetor - Responsive Bootstrap 4 Admin Dashboard
 * Author: Mannatthemes
 * Chart Js
 */

!(function ($) {
    "use strict";

    var ChartJs = function () {};

    (ChartJs.prototype.respChart = function (selector, type, data, options) {
        // get selector by context
        var ctx = selector.get(0).getContext("2d");
        // pointing parent container to make chart js inherit its width
        var container = $(selector).parent();

        // enable resizing matter
        $(window).resize(generateChart);

        // this function produce the responsive Chart JS
        function generateChart() {
            // make chart width fit with its container
            var ww = selector.attr("width", $(container).width());
            switch (type) {
                case "Line":
                    new Chart(ctx, {
                        type: "line",
                        data: data,
                        options: options,
                    });
                    break;
                case "Doughnut":
                    new Chart(ctx, {
                        type: "doughnut",
                        data: data,
                        options: options,
                    });
                    break;
                case "Pie":
                    new Chart(ctx, {
                        type: "pie",
                        data: data,
                        options: options,
                    });
                    break;
                case "Bar":
                    new Chart(ctx, {
                        type: "bar",
                        data: data,
                        options: options,
                    });
                    break;
                case "Radar":
                    new Chart(ctx, {
                        type: "radar",
                        data: data,
                        options: options,
                    });
                    break;
                case "PolarArea":
                    new Chart(ctx, {
                        data: data,
                        type: "polarArea",
                        options: options,
                    });
                    break;
            }
            // Initiate new chart or Redraw
        }
        // run function - render chart at first load
        generateChart();
    }),
        //init
        (ChartJs.prototype.init = function () {
            //donut chart
            var donutChart = {
                labels: [
                    "Bitcoin",
                    "Ethereum",
                    "Litecoin",
                    "Dashcoin",
                    "Bitcoin",
                    "Ethereum",
                    "Litecoin",
                    "Dashcoin",
                ],
                datasets: [
                    {
                        data: [80, 50, 100, 121, 80, 50, 100, 121],
                        backgroundColor: [
                            "#f7931a",
                            "#1ecab8",
                            "#e3eaef",
                            "#1c75bc",
                        ],
                        hoverBackgroundColor: [
                            "#f7931a",
                            "#1ecab8",
                            "#e3eaef",
                            "#1c75bc",
                        ],
                        hoverBorderColor: "#fff",
                    },
                ],
            };
            this.respChart($("#doughnut"), "Doughnut", donutChart);
        }),
        ($.ChartJs = new ChartJs()),
        ($.ChartJs.Constructor = ChartJs);
})(window.jQuery),
    //initializing
    (function ($) {
        "use strict";
        $.ChartJs.init();
    })(window.jQuery);
