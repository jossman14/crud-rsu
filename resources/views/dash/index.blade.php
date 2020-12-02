<?php

// pasien  poli
// detail poli digunakan
$label = [];
$poli = [];

foreach ($pasien as $item) {
    $poli[] = $item->poli->nama_poli;
}

$coba = array_count_values($poli);

foreach ($coba as $key => $value) {
    $label['label'] = $key;
    $label['value'] = $value;
}

//donut chart
$poliLabel = [];
$poliValue = [];

foreach ($coba as $key => $value) {
    $poliLabel[]= $key;
    $poliValue[]= $value;
}


//hitung jumlah gedung
$gedung=[];

foreach ($ruang as $key => $value) {
    $gedung[] = $value->nama_gedung;
}

$gedung = array_count_values($gedung);

$GedungLabel = [];
$GedungValue = [];

foreach ($gedung as $key => $value) {
$GedungLabel[]= $key;
$GedungValue[]= $value;
}

//hitung dokter
$dokterCek=[];

foreach ($pasien as $item) {
$dokterCek[] = $item->dokter->nama_dokter;
}

$dokterCek = array_count_values($dokterCek);

$dokterCekLabel = [];
$dokterCekValue = [];
$dokterArray=[];
$labelDokter = [];

foreach ($dokterCek as $key => $value) {
$dokterCekLabel[]= $key;
$dokterCekValue[]= $value;
$labelDokter["label"] = $key;
$labelDokter["value"] = $value;
$dokterArray[]=$labelDokter;
}

?>


@extends('layout.main')

@section('judulSitus',"Dashboard Manajemen")

@section('css')
<link rel="stylesheet" href="../../layout/assets/plugins/morris/morris.css">
@endsection

@section('konten')
<div class="row">
    <div class="col-lg-4">
        <div class="card overflow-hidden">
            <div class="card-body bg-gradient3">
                <div class="">
                    <div class="card-icon">
                        <i class="mdi mdi-account-heart-outline"></i>
                    </div>
                    <h2 class="font-weight-bold text-white">{{count($pasien)}}</h2>
                    <p class="text-white mb-0 font-16">Pasien</p>
                </div>
            </div>
            <!--end card-body-->

        </div>
        <!--end card-->
    </div>

    <div class="col-lg-4">
        <div class="card overflow-hidden">
            <div class="card-body bg-gradient2">
                <div class="">
                    <div class="card-icon">
                        <i class="dripicons-user-group"></i>
                    </div>
                    <h2 class="font-weight-bold text-white">{{count($dokter)}}</h2>
                    <p class="text-white mb-0 font-16">Dokter</p>
                </div>
            </div>
            <!--end card-body-->

            <!--end card-body-->
        </div>
        <!--end card-->
    </div>

    <div class="col-lg-4">
        <div class="card overflow-hidden">
            <div class="card-body bg-gradient1">
                <div class="">
                    <div class="card-icon">
                        <i class="mdi mdi-shield-account"></i>
                    </div>
                    <h2 class="font-weight-bold text-white">{{count($perawat)}}</h2>
                    <p class="text-white mb-0 font-16">Perawat</p>
                </div>
            </div>
            <!--end card-body-->

            <!--end card-body-->
        </div>
        <!--end card-->
    </div>

</div>
<div class="row">
    <div class="col-lg-4">
        <div class="card overflow-hidden">
            <div class="card-body bg-gradient4">
                <div class="">
                    <div class="card-icon">
                        <i class="mdi mdi-table-column-width"></i>
                    </div>
                    <h2 class="font-weight-bold text-white">{{count($ruang)}}</h2>
                    <p class="text-white mb-0 font-16">Ruang</p>
                </div>
            </div>
            <!--end card-body-->

            <!--end card-body-->
        </div>
        <!--end card-->
    </div>

    <div class="col-lg-4">
        <div class="card overflow-hidden">
            <div class="card-body bg-gradient5">
                <div class="">
                    <div class="card-icon">
                        <i class="mdi mdi-seat-individual-suite"></i>
                    </div>
                    <h2 class="font-weight-bold text-white">{{count($inap)}}</h2>
                    <p class="text-white mb-0 font-16">Rawat Inap</p>
                </div>
            </div>
            <!--end card-body-->

            <!--end card-body-->
        </div>
        <!--end card-->
    </div>

    <div class="col-lg-4">
        <div class="card overflow-hidden">
            <div class="card-body bg-gradient6">
                <div class="">
                    <div class="card-icon">
                        <i class="mdi mdi-square-inc-cash"></i>
                    </div>
                    <h2 class="font-weight-bold text-white">{{count($bayar)}}</h2>
                    <p class="text-white mb-0 font-16">Pembayaran</p>
                </div>
            </div>
            <!--end card-body-->
        </div>
        <!--end card-->
    </div>

</div>

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <div id="profit" class="apex-charts"></div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-12 col-xl-8">
        <div class="card">
            <div class="card-body">
                <h4 class="mt-0 header-title">Jumlah Gedung</h4>
                <p class="text-muted mb-4 d-inline-block">Jumlah gedung dan ruangan di rumah sakit
                </p>
                <canvas id="poli" height="300"></canvas>
            </div>
            <!--end card-body-->
        </div>
        <!--end card-->
    </div>
    <div class="col-lg-4">
        <div class="card">
            <div class="card-body">
                <h4 class="mt-0 header-title">Jumlah Dokter Aktif</h4>
                <p class="text-muted mb-4 d-inline-block">Detail dokter aktif disertai jumlah pasien
                </p>
                <div id="morris-donut-example" style="height: 300px"></div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title mt-0 mb-4">Detail Poliklinik Aktif</h4>
                <div class="chart-demo">
                    <div id="poliAktif" class="apex-charts"></div>
                </div>
            </div>
            <!--end card-body-->
        </div>
        <!--end card-->
    </div>
    <!--end col-->
</div>
@endsection

@section('js')
<?php 

$total=0;
$totalArray = [];

?>
@foreach ($bayar as $item)
<?php 

$total += $item->jumlah_harga;
$totalArray[]= $item->jumlah_harga;

?>
@endforeach
<script src="../../layout/assets/plugins/apexcharts/apexcharts.min.js"></script>
<script src="https://apexcharts.com/samples/assets/irregular-data-series.js"></script>
<script src="https://apexcharts.com/samples/assets/ohlc.js"></script>
<!-- Chart JS -->
<script src="../../layout/assets/plugins/chartjs/chart.min.js"></script>
{{-- <script src="../../layout/assets/pages/jquery.chartjs.init.js"></script> --}}

<!--Morris Chart-->
<script src="../../layout/assets/plugins/morris/morris.min.js"></script>
<script src="../../layout/assets/plugins/raphael/raphael.min.js"></script>
{{-- <script src="../../layout/assets/pages/jquery.morris.init.js"></script> --}}
<script>
    var colorArray = [
    "#F64069","#00CAAF","#F8B75E","#3F89AF","#B2D0DF","#0276F8","#00A5BB","#63b598", "#ce7d78", "#ea9e70", "#a48a9e", "#c6e1e8", "#648177" ,"#0d5ac1" ,
    "#f205e6" ,"#1c0365" ,"#14a9ad" ,"#4ca2f9" ,"#a4e43f" ,"#d298e2" ,"#6119d0",
    "#d2737d" ,"#c0a43c" ,"#f2510e" ,"#651be6" ,"#79806e" ,"#61da5e" ,"#cd2f00" ,
    "#9348af" ,"#01ac53" ,"#c5a4fb" ,"#996635","#b11573" ,"#4bb473" ,"#75d89e" ,
    "#2f3f94" ,"#2f7b99" ,"#da967d" ,"#34891f" ,"#b0d87b" ,"#ca4751" ,"#7e50a8",
    "#c4d647" ,"#e0eeb8" ,"#11dec1" ,"#289812" ,"#566ca0" ,"#ffdbe1" ,"#2f1179" ,
    "#935b6d" ,"#916988" ,"#513d98" ,"#aead3a", "#9e6d71", "#4b5bdc", "#0cd36d",
    "#250662", "#cb5bea", "#228916", "#ac3e1b", "#df514a", "#539397", "#880977",
    "#f697c1", "#ba96ce", "#679c9d", "#c6c42c", "#5d2c52", "#48b41b", "#e1cf3b",
    "#5be4f0", "#57c4d8", "#a4d17a", "#225b8", "#be608b", "#96b00c", "#088baf",
    "#f158bf", "#e145ba", "#ee91e3", "#05d371", "#5426e0", "#4834d0", "#802234",
    "#6749e8", "#0971f0", "#8fb413", "#b2b4f0", "#c3c89d", "#c9a941", "#41d158",
    "#fb21a3", "#51aed9", "#5bb32d", "#807fb", "#21538e", "#89d534", "#d36647",
    "#7fb411", "#0023b8", "#3b8c2a", "#986b53", "#f50422", "#983f7a", "#ea24a3",
    "#79352c", "#521250", "#c79ed2", "#d6dd92", "#e33e52", "#b2be57", "#fa06ec",
    "#1bb699", "#6b2e5f", "#64820f", "#1c271", "#21538e", "#89d534", "#d36647",
    "#7fb411", "#0023b8", "#3b8c2a", "#986b53", "#f50422", "#983f7a", "#ea24a3",
    "#79352c", "#521250", "#c79ed2", "#d6dd92", "#e33e52", "#b2be57", "#fa06ec",
    "#1bb699", "#6b2e5f", "#64820f", "#1c271", "#9cb64a", "#996c48", "#9ab9b7",
    "#06e052", "#e3a481", "#0eb621", "#fc458e", "#b2db15", "#aa226d", "#792ed8",
    "#73872a", "#520d3a", "#cefcb8", "#a5b3d9", "#7d1d85", "#c4fd57", "#f1ae16",
    "#8fe22a", "#ef6e3c", "#243eeb", "#1dc18", "#dd93fd", "#3f8473", "#e7dbce",
    "#421f79", "#7a3d93", "#635f6d", "#93f2d7", "#9b5c2a", "#15b9ee", "#0f5997",
    "#409188", "#911e20", "#1350ce", "#10e5b1", "#fff4d7", "#cb2582", "#ce00be",
    "#32d5d6", "#17232", "#608572", "#c79bc2", "#00f87c", "#77772a", "#6995ba",
    "#fc6b57", "#f07815", "#8fd883", "#060e27", "#96e591", "#21d52e", "#d00043",
    "#b47162", "#1ec227", "#4f0f6f", "#1d1d58", "#947002", "#bde052", "#e08c56",
    "#28fcfd", "#bb09b", "#36486a", "#d02e29", "#1ae6db", "#3e464c", "#a84a8f",
    "#911e7e", "#3f16d9", "#0f525f", "#ac7c0a", "#b4c086", "#c9d730", "#30cc49",
    "#3d6751", "#fb4c03", "#640fc1", "#62c03e", "#d3493a", "#88aa0b", "#406df9",
    "#615af0", "#4be47", "#2a3434", "#4a543f", "#79bca0", "#a8b8d4", "#00efd4",
    "#7ad236", "#7260d8", "#1deaa7", "#06f43a", "#823c59", "#e3d94c", "#dc1c06",
    "#f53b2a", "#b46238", "#2dfff6", "#a82b89", "#1a8011", "#436a9f", "#1a806a",
    "#4cf09d", "#c188a2", "#67eb4b", "#b308d3", "#fc7e41", "#af3101", "#ff065",
    "#71b1f4", "#a2f8a5", "#e23dd0", "#d3486d", "#00f7f9", "#474893", "#3cec35",
    "#1c65cb", "#5d1d0c", "#2d7d2a", "#ff3420", "#5cdd87", "#a259a4", "#e4ac44",
    "#1bede6", "#8798a4", "#d7790f", "#b2c24f", "#de73c2", "#d70a9c", "#25b67",
    "#88e9b8", "#c2b0e2", "#86e98f", "#ae90e2", "#1a806b", "#436a9e", "#0ec0ff",
    "#f812b3", "#b17fc9", "#8d6c2f", "#d3277a", "#2ca1ae", "#9685eb", "#8a96c6",
    "#dba2e6", "#76fc1b", "#608fa4", "#20f6ba", "#07d7f6", "#dce77a", "#77ecca"]

    var profit = {
    chart: {
    type: 'area',
    height: 160,
    sparkline: {
    enabled: true
    },
    },
    stroke: {
    width: 2,
    curve: 'straight'
    },
    fill: {
    opacity: 0.2,
    },
    series: [{
    name: 'Pendapatan ',
    data: [{{implode(', ',$totalArray)}}],
    }],
    xaxis: {
    crosshairs: {
    width: 1
    },
    },
    yaxis: {
    min: 0
    },
    colors: ['#0acf97'],
    title: {
    text: 'Rp. {{number_format($total) }}',
    offsetX: 20,
    style: {
    fontSize: '24px'
    }
    },
    subtitle: {
    text: 'Total Pendapatan',
    offsetX: 20,
    style: {
    fontSize: '14px'
    }
    }
    }
    
    new ApexCharts(document.querySelector("#profit"), profit).render();
</script>

{{-- morris js --}}
<script>
    /**
    * Theme: Frogetor - Responsive Bootstrap 4 Admin Dashboard
    * Author: Mannatthemes
    * Morris Chart Js
    */
    
    !(function ($) {
    "use strict";
    
    var MorrisCharts = function () {};
    
  
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
    
    
    //creating donut chart
    var $donutData = @JSON($dokterArray);
    
    console.log($donutData);
    this.createDonutChart("morris-donut-example", $donutData, colorArray);
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
</script>



<script>
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

    labels: @JSON($GedungLabel),
    datasets: [
    {
    data: @JSON($GedungValue),
    backgroundColor: colorArray,
    hoverBackgroundColor: colorArray,
    hoverBorderColor: "#fff",
    },
    ],
    };
    this.respChart($("#poli"), "Doughnut", donutChart);
    
    }),
    ($.ChartJs = new ChartJs()),
    ($.ChartJs.Constructor = ChartJs);
    })(window.jQuery),
    //initializing
    (function ($) {
    "use strict";
    $.ChartJs.init();
    })(window.jQuery);
</script>


{{-- poli chart --}}
<script>
    // apex-bar-1
    
    var options = {
    chart: {
    height: 380,
    type: 'bar',
    toolbar: {
    show: false
    }
    },
    plotOptions: {
    bar: {
    horizontal: true,
    }
    },
    dataLabels: {
    enabled: false
    },
    series: [{
    data: @JSON($poliValue)
    }],
    colors: ["#95a6bf"],
    xaxis: {
    categories: @JSON($poliLabel),
    },
    states: {
    hover: {
    filter: 'none'
    }
    },
    grid: {
    borderColor: '#f1f3fa'
    }
    }
    
    var chart = new ApexCharts(
    document.querySelector("#poliAktif"),
    options
    );
    
    chart.render();
</script>
@endsection