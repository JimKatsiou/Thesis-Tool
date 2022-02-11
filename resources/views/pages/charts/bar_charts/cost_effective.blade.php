<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>How to Connect API to Bar Chart in Chart js</title>
    <style>
      * {
        margin: 0;
        padding: 0;
        font-family: sans-serif;
      }
      .chartMenu {
        width: 100vw;
        height: 40px;
        background: #050505;
        color: rgb(0, 0, 0);
      }
      .chartMenu p {
        padding: 10px;
        font-size: 20px;
      }
      .chartCard {
        width: 100vw;
        height: calc(100vh - 40px);
        background: rgb(255, 255, 255);
        display: flex;
        align-items: center;
        justify-content: center;
      }
      .chartBox {
        width: 700px;
        padding: 20px;
        border-radius: 20px;
        border: solid 3px rgb(0, 0, 0);
        background:rgb(255, 255, 255);
      }
    </style>
  </head>
  <body>
    <div class="chartCard">
      <div class="chartBox">
        <canvas id="myChart"></canvas>
      </div>
    </div>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="js/apiData.js"></script>

    <script>
    let scenario = [];
    let final_cost = [];

    async function diplayChart(){
        await apiData()

        console.log(scenario);
        console.log(final_cost);

        // setup
        const data = {
        labels: scenario,
        datasets: [{
            label: 'Chipest Scenarios',
            data: final_cost,
            backgroundColor: 'rgba(45, 85, 255, 1)',
            borderColor: 'rgba(0, 0, 0, 1)',
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

    }

    diplayChart()

    </script>

  </body>
</html>
