@extends('pages.charts.layouts.chart-layout')
@section('title','Charts')

@section('content')
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bar Charts</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            font-family: sans-serif;
        }

        .chartMenu {
            width: 100vw;
            height: 10px;
            background: #1A1A1A;
            color: rgba(163, 157, 159, 0.466);
        }

        .chartMenu p {
            padding: 5px;
            font-size: 20px;
        }

        .chartCard {
            width: 100vw;
            /* height: calc(100vh - 40px); */
            background: rgba(184, 176, 178, 0.014);
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .chartBox {
            width: 700px;
            padding: 10px;
            border-radius: 20px;
            border: solid 3px rgb(238, 229, 232);
            background: rgb(255, 255, 255);
        }
    </style>
</head>

<body>
<div class="topnav">
            <a href="{{ route('admin.index') }}" class="btn btn-primary">Back to Dashboard</a>
            {{-- <a href="#">Link</a> --}}
</div>
<hr>
<div class="row">
  <div class="column">
    <h2>Line Chart - ENERGY CONSUMPTION (5G VS LoRa VS NB-IoT)</h2>
    <div class="chartCard">
        <div class="chartBox">
            <canvas id="visitors-chart" height="130"></canvas>
            <button onclick="updateChart_2()">Update</button>
        </div>
    </div>
  </div>
</div>
<hr>
<div class="row">
  <div class="column">
    <h2>Line Graphs - FINAL COST </h2>
    <br><hr><br>
    <div class="chartCard">
        <div class="chartBox">
            <canvas id="Line_Graphs" height="130"></canvas>
            <button onclick="updateChart()">View</button>
        </div>
    </div>
  </div>
</div>
<hr>
<hr>
<div class="row">
    <div class="column">
        <h2>Scatter Plots</h2>
        <button type="button" class="btn btn-primary btn-lg">Open</button>
    </div>
</div>
<hr>
<hr>
<div class="row">
    <div class="column">
        <h2>Multiple Lines</h2>
        <button type="button" class="btn btn-primary btn-lg">Open</button>
    </div>
</div>
<hr>

    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
    // Fetch Block
    function updateChart(){
    async function fetchJSON() {
        const url = 'json/chart.json';
        //const url = 'F:/Development/Laravel/Thesis_Tool/public/json/report.json';
        const response = await fetch(url);
        // Loads / Waiting to complete the request.....
        const datapoints = await response.json();
        console.log(datapoints);
        return datapoints;
    };
    fetchJSON().then(datapoints => {
        const Technology = datapoints.results.map(function (index) {
        return index.Technology;
        });
        console.log(Technology)
        myChart.config.data.labels = Technology;
        myChart.update();
    });

    fetchJSON().then(datapoints => {
        const FinalCost = datapoints.results.map(function (index) {
        return index.FinalCost;
        });
        console.log(FinalCost)
        myChart.config.data.datasets[0].data = FinalCost;
        myChart.update();
    });
    };
        // setup
        const data = {
            labels: [],
            datasets: [{
                label: '',
                data: [],
                backgroundColor: [
                    'rgba(255, 26, 104, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)',
                    'rgba(0, 0, 0, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 26, 104, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)',
                    'rgba(0, 0, 0, 1)'
                ],
                borderWidth: 2
            }]
        };

        // config
        const config = {
            type: 'bar',
            data,
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        };

        // render init block
        const myChart = new Chart(
            document.getElementById('myChart'),
            config
        );
    </script>

    <script>
    function updateChart_2(){
    async function fetchJSON() {
        const url = 'json/chart.json';
        //const url = 'F:/Development/Laravel/Thesis_Tool/public/json/report.json';
        const response = await fetch(url);
        // Loads / Waiting to complete the request.....
        const datapoints = await response.json();
        console.log(datapoints);
        return datapoints;
    };
    fetchJSON().then(datapoints => {
        const Technology = datapoints.results.map(function (index) {
        return index.Technology;
        });
        console.log(Technology)
        Pie_Charts.labels = Technology;
        Pie_Charts.update();
        // console.log(Pie_Charts.labels);
    });

    fetchJSON().then(datapoints => {
        const FinalCost = datapoints.results.map(function (index) {
        return index.FinalCost;
        });
        console.log(FinalCost)
        Pie_Charts.data.datasets[0] = FinalCost;
        Pie_Charts.update();
    });
    };
    </script>

    <!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>

<!-- OPTIONAL SCRIPTS -->
<script src="plugins/chart.js/Chart.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard3.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>

<a id="back-to-top" href="{{ route('chartView') }}#" class="btn btn-primary back-to-top" role="button" aria-label="Scroll to top">
      <i class="fas fa-chevron-up"></i>
    </a>
@endsection
