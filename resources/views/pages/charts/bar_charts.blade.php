@extends('layouts.app')
@section('title','??')

@section('content')
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script type="text/javascript" src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"> </script>
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
            color: rgb(94, 31, 52);
        }

        .chartMenu p {
            padding: 5px;
            font-size: 20px;
        }

        .chartCard {
            width: 50vw;
            height: calc(50vh - 40px); */
            background: rgb(255, 255, 255);
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .chartBox {
            width: 800px;
            padding: 30px;
            border-radius: 30px;
            border: solid 3px rgb(0, 0, 0);
            background: rgb(255, 255, 255);
        }
    </style>
</head>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
        <a href={{ route('admin.index') }} type="button" class="btn btn-danger">Back to Dashboard</a>
        </div>
    </div>
    <hr>
    <div class="card">
        <div class="card-header">
            <h4>1. Bar Chart - Chipest scenario by cost</h4>
        </div>
        <div class="card-body">
            <div class="chartCard">
                <div class="chartBox">
                  <canvas id="myChart"></canvas>
                  <button onclick="updateChart()">Update</button>
                </div>
            </div>
        </div>
    </div>
    <hr>
    <div class="card">
        <div class="card-header">
            <h4>2. Bar Chart - Chipest Scenarios (sorted by scenario)</h4>
        </div>
        <div class="card-body">
            <div class="chartCard">
                <div class="chartBox">
                  <canvas id="bar-chart_2"></canvas>
                  {{-- <button onclick="updateChart_2()">Update</button> --}}
                </div>
            </div>
        </div>
    </div>
    <hr>
    <div class="card">
        <div class="card-header">
            <h4>3. Bar Chart - Sort by chipest </h4>
        </div>
        <div class="card-body">
            <div class="chartCard">
                <div class="chartBox">
                    <canvas id="bar-chart"></canvas>
                </div>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-header">
            <h4>4. Bar Chart - Sort by Enrergy efficient </h4>
        </div>
        <div class="card-body">
            <div class="chartCard">
                <div class="chartBox">
                    <canvas id="bar-chart"></canvas>
                </div>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-header">
            <h4>5. Bar Chart - ENERGY CONSUMPTION (ΥΠΑΡΧΕΙ ΚΑΙ ΑΥΤΟ ΤΟ ΕΙΔΟΣ ΠΡΟΒΟΛΗΣ ΑΛΛΑ ΜΑΛΛΟΝ ΕΙΝΑΙ ΠΑΡΑΠΑΝΩ CLICK ΧΩΡΙΣ ΛΟΓΟ) </h4>
        </div>
        <div class="card-body">
            <a href={{ route('bar-cost_effective') }} type="button" class="btn btn-primary btn-sm">Open</a>
        </div>
    </div>
    <hr>
    {{-- <div class="card">
        <div class="card-header">
            <h4>Bar Chart - Total Score </h4>
        </div>
        <div class="card-body">
            <button type="button" class="btn btn-primary btn-lg">Open</button>
            <a href={{ route('bar-chart-view') }} type="button" class="btn btn-primary btn-sm">Open</a>
        </div>
    </div> --}}
    <hr>
</div>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script> //1ο chart
    //Fetch Block
    function updateChart() { //THIS FUNCTION IS TO UPDATE THE CHART ONLY AFTER THE CLICKING OF BUTTON UPDATE

        async function fetchJSON() {
            const url = 'MatlabCodes/Results/sort_by_chipest_list.json';
            //const url = 'F:/Development/Laravel/Thesis_Tool/public/json/report.json';
            const response = await fetch(url);
            // Loads / Waiting to complete the request.....
            const datapoints = await response.json();
            //console.log(datapoints);
            return datapoints;
        };
        fetchJSON().then(datapoints => {
            const scenario = datapoints.map(function(index) {
                return index.scenario;
            })
            //console.log(scenario)
            myChart.config.data.labels = scenario;
            myChart.update()
        });

        fetchJSON().then(datapoints => {
            const final_cost = datapoints.map(function(index) {
                return index.final_cost;
            })
            //console.log(final_cost)
            myChart.config.data.datasets[0].data = final_cost;
            myChart.update()
        });
    }
    const data = {
        labels: [],
        datasets: [{
        label: 'Total cost for each scenario',
        data: [],
        backgroundColor: ['rgba(54, 162, 235, 0.2)',],
        borderColor: ['rgba(0, 0, 0, 1)'],
        borderWidth: 1
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

    //2ο chart
    //Fetch Block
    getData_2();

        async function getData_2() {
            const response = await fetch('MatlabCodes/Results/sort_by_scenario.json')
            console.log(response);
			const data = await response.json();
			console.log(data);
			length = data.length;
			//console.log(length);

            labels = [];
			values = [];
			for (i = 0; i < length; i++) {
				labels.push(data[i].scenario);
				values.push(data[i].final_cost);
		    }
            // console.log(labels);
            // console.log(values);

            new Chart(document.getElementById('bar-chart_2'), {
				type: 'bar',
				data: {
					labels: labels,
					datasets: [
						{
							label: "Population (millions)",
							backgroundColor: ["#3e95cd",
											"#8e5ea2"],
							data: values
						}
					]
				},
				options: {
					legend: { display: false },
					title: {
						display: true,
						text: 'U.S population'
					}
				}
			});
        }

    </script>

    <script>
        getData();

        async function getData() {
            const response = await fetch('MatlabCodes/Results/sort_by_chipest_list.json')
            console.log(response);
			const data = await response.json();
			console.log(data);
			length = data.length;
			//console.log(length);

            labels = [];
			values = [];
			for (i = 0; i < length; i++) {
				labels.push(data[i].scenario);
				values.push(data[i].final_cost);
		    }
            // console.log(labels);
            // console.log(values);

            new Chart(document.getElementById('bar-chart'), {
				type: 'bar',
				data: {
					labels: labels,
					datasets: [
						{
							label: "Final Cost (Euro)",
							backgroundColor: ["#3e95cd",
											"#8e5ea2"],
							data: values
						}
					]
				},
				options: {
					legend: { display: false },
					title: {
						display: true,
						text: 'Fanal Costs'
					}
				}
			});
        }
    </script>

@endsection
<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- OPTIONAL SCRIPTS -->
<script src="plugins/chart.js/Chart.min.js"></script>

{{-- <!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard3.js"></script> --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>


