/**
 * Theme: Frogetor - Responsive Bootstrap 4 Admin Dashboard
 * Author: Mannatthemes
 * Morris Chart Js
 */

!(function ($) {
    "use strict";

    var MorrisCharts = function () {};

    //   //creates line chart
    //   MorrisCharts.prototype.createLineChart = function(element, data, xkey, ykeys, labels, lineColors) {
    //       Morris.Line({
    //         element: element,
    //         data: data,
    //         xkey: xkey,
    //         ykeys: ykeys,
    //         labels: labels,
    //         hideHover: 'auto',
    //         gridLineColor: '#eef0f2',
    //         resize: true, //defaulted to true
    //         lineColors: lineColors
    //       });
    //   },

    //   //creates area chart
    //   MorrisCharts.prototype.createAreaChart = function(element, pointSize, lineWidth, data, xkey, ykeys, labels, lineColors) {
    //       Morris.Area({
    //           element: element,
    //           pointSize: 3,
    //           lineWidth: 2,
    //           data: data,
    //           xkey: xkey,
    //           ykeys: ykeys,
    //           labels: labels,
    //           resize: true,
    //           hideHover: 'auto',
    //           gridLineColor: '#eef0f2',
    //           lineColors: lineColors
    //       });
    //   },
    //   //creates Bar chart
    //   MorrisCharts.prototype.createBarChart  = function(element, data, xkey, ykeys, labels, lineColors) {
    //       Morris.Bar({
    //           element: element,
    //           data: data,
    //           xkey: xkey,
    //           ykeys: ykeys,
    //           labels: labels,
    //           gridLineColor: '#eef0f2',
    //           barSizeRatio: 0.4,
    //           resize: true,
    //           hideHover: 'auto',
    //           barColors: lineColors
    //       });
    //   },
    //creates Donut chart
    (MorrisCharts.prototype.createDonutChart = function (
        element,
        data,
        colors
    ) {
        Morris.Donut({
            element: element,
            data: data,
            resize: true,
            colors: colors,
        });
    }),
        (MorrisCharts.prototype.init = function () {
            //       //create line chart
            //       var $data  = [
            //           { y: '2009', a: 3, b: 5 },
            //           { y: '2010', a: 30,  b: 15 },
            //           { y: '2011', a: 10,  b: 12 },
            //           { y: '2012', a: 10,  b: 25 },
            //           { y: '2013', a: 22,  b: 5 },
            //           { y: '2014', a: 12,  b: 7 },
            //           { y: '2015', a: 5, b: 5 }
            //         ];
            //       this.createLineChart('morris-line-example', $data, 'y', ['a', 'b'], ['Series A', 'Series B'], ['#ffc400', '#0078ff']);

            //       //creating area chart
            //       var $areaData = [
            //           {y: '2009', a: 10, b: 20},
            //           {y: '2010', a: 75, b: 65},
            //           {y: '2011', a: 50, b: 40},
            //           {y: '2012', a: 75, b: 65},
            //           {y: '2013', a: 50, b: 40},
            //           {y: '2014', a: 75, b: 65},
            //           {y: '2015', a: 90, b: 60},
            //           {y: '2016', a: 90, b: 75}
            //       ];
            //       this.createAreaChart('morris-area-example', 0, 0, $areaData, 'y', ['a', 'b'], ['Series A', 'Series B'], ['#3f89af', '#f6f7f9']);

            //       //creating bar chart
            //       var $barData = [
            //           {y: '2009', a: 100, b: 90},
            //           {y: '2010', a: 75, b: 65},
            //           {y: '2011', a: 50, b: 40},
            //           {y: '2012', a: 75, b: 65},
            //           {y: '2013', a: 50, b: 40},
            //           {y: '2014', a: 75, b: 65},
            //           {y: '2015', a: 100, b: 90},
            //           {y: '2016', a: 90, b: 75}
            //       ];
            //       this.createBarChart('morris-bar-example', $barData, 'y', ['a', 'b'], ['Series A', 'Series B'], ['#3f89af', '#b2d0df']);

            //creating donut chart
            var $donutData = [
                { label: "Download Sales", value: 12 },
                { label: "In-Store Sales", value: 30 },
                { label: "Mail-Order Sales", value: 20 },
            ];

            console.log($donutData);
            this.createDonutChart("morris-donut-example", $donutData, [
                "#f8b75e",
                "#f64069",
                "#00caaf",
            ]);
        }),
        //init
        ($.MorrisCharts = new MorrisCharts()),
        ($.MorrisCharts.Constructor = MorrisCharts);
})(window.jQuery),
    //initializing
    (function ($) {
        "use strict";
        $.MorrisCharts.init();
    })(window.jQuery);