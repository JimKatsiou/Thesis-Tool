<script> //2o chart
    //function updateChart_2() { //THIS FUNCTION IS TO UPDATE THE CHART ONLY AFTER THE CLICKING OF BUTTON UPDATE

        async function fetchJSON_2() {
        const url = 'MatlabCodes/Results/cost-effective.json';
        //const url = 'F:/Development/Laravel/Thesis_Tool/public/json/report.json';
        const response = await fetch(url);
        // Loads / Waiting to complete the request.....
        const datapoints = await response.json();
        console.log(datapoints);
        return datapoints;
    };
    fetchJSON().then(datapoints => {
        const scenario = datapoints.map(function(index) {
            return index.scenario;
        })
        console.log(scenario)
        myChart_2.config.data.labels = scenario;
        myChart_2.update()
    });

    fetchJSON().then(datapoints => {
        const final_cost = datapoints.map(function(index) {
            return index.final_cost;
        })
        console.log(final_cost)
        myChart_2.config.data.datasets[0].data = final_cost;
        myChart_2.update()
    });
    //}
    const data = {
    labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
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
    document.getElementById('myChart_2'),
    config
    );

</script>
