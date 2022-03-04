@extends('layouts.app')
@section('title','??')

@section('content')

<?php
exec("matlab.exe");
?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
        <a href={{ route('admin.index') }} type="button" class="btn btn-danger">Back to Dashboard</a>
        </div>
    </div>
    <hr>
    <div class="card">
        <div class="card-header">
            <h2 aling="center">MATLAB was opened, wait a while for the necessary processes to load </h2>
        </div>
        <div class="card-body">
            <h3></h3>
        </div>
    </div>
    <h5> <b> STEP 1: </b> Update inpunt with the curent enabled scenarios </h5>
    <div class="card">
        <div class="card-header">
            <h2>Update</h2>
        </div>
        <div class="card-body">

            <p>Scenario: <strong>Water quality - 5G Techonoly</strong></p>

            @php
                function get_data() // this function fetch data table and it store into json formt and retutn data in json format
                {
                    $connect = mysqli_connect("localhost", "root", "", "thesis_tool");
                    $query = "SELECT number_of_5g_sensors_type_a, number_of_5g_sensors_type_b, number_of_5g_sensors_type_c FROM 5g_solutions ORDER BY RAND()LIMIT 20";
                    $result = mysqli_query($connect, $query);
                    $scenario_data = array();
                    while($row = mysqli_fetch_array($result))
                    {
                        $scenario_data[] = array(
                            'numberOf5gSensorsTypeA' => $row["number_of_5g_sensors_type_a"],
                            'numberOf5gSensorsTypeB' => $row["number_of_5g_sensors_type_b"],
                            'numberOf5gSensorsTypeC' => $row["number_of_5g_sensors_type_c"]
                        );
                    }
                    return json_encode($scenario_data);
                }
                //For dynamic json file
                //$file_name = date('d-m-Y') . '.json'; //create dynamic json file name
                $file_name = date('d-m-Y') . '_5g_scenario' . '.json'; //create dynamic json file name

                // if(file_put_contents($file_name, get_data()))
                if(file_put_contents("MatlabCodes\Inputs-json/5g_scenario.json", get_data()))
                {
                    echo $file_name . ' file was created successfully!';
                }
                else
                {
                    echo 'There is some error';
                }
            @endphp
            <hr>
            <p>Scenario: <strong>Water quality - NB-Iot Techonoly</strong></p>
            @php
                function get_data_4() // this function fetch data table and it store into json formt and retutn data in json format
                {
                    $connect = mysqli_connect("localhost", "root", "", "thesis_tool");
                    $query_4 = "SELECT number_of_nb_iot_sensors_type_a, number_of_nb_iot_sensors_type_b, number_of_nb_iot_sensors_type_c FROM nb_iot_solutions ORDER BY RAND()LIMIT 20";
                    $result_4 = mysqli_query($connect, $query_4);
                    $scenario_data_4 = array();
                    while($row = mysqli_fetch_array($result_4))
                    {
                        $scenario_data_4[] = array(
                            'numberOfNBSensorsTypeA' => $row["number_of_nb_iot_sensors_type_a"],
                            'numberOfNBSensorsTypeB' => $row["number_of_nb_iot_sensors_type_b"],
                            'numberOfNBSensorsTypeC' => $row["number_of_nb_iot_sensors_type_c"]
                        );
                    }
                    return json_encode($scenario_data_4);
                }
                //For dynamic json file
                //$file_name = date('d-m-Y') . '.json'; //create dynamic json file name
                $file_name = date('d-m-Y') . '_nb_scenario' . '.json'; //create dynamic json file name

                // if(file_put_contents($file_name, get_data()))
                if(file_put_contents("MatlabCodes\Inputs-json/nb_scenario.json", get_data_4()))
                {
                    echo $file_name . ' file was created successfully!';
                }
                else
                {
                    echo 'There is some error';
                }
            @endphp
            <hr>
            <p>Scenario: <strong>Water quality - LoRa Techonoly</strong></p>
            @php
                function get_data_5() // this function fetch data table and it store into json formt and retutn data in json format
                {
                    $connect = mysqli_connect("localhost", "root", "", "thesis_tool");
                    $query_5 = "SELECT number_of_lora_sensors_type_a, number_of_lora_sensors_type_b, number_of_lora_sensors_type_c, number_of_lora_gateways_type_a FROM lora_solutions ORDER BY RAND()LIMIT 20";
                    $result_5 = mysqli_query($connect, $query_5);
                    $scenario_data_5 = array();
                    while($row = mysqli_fetch_array($result_5))
                    {
                        $scenario_data_5[] = array(
                            'numberOfLoraSensorsTypeA' => $row["number_of_lora_sensors_type_a"],
                            'numberOfLoraSensorsTypeB' => $row["number_of_lora_sensors_type_b"],
                            'numberOfLoraSensorsTypeC' => $row["number_of_lora_sensors_type_c"],
                            'numberOfLoraGatewayTypeA' => $row["number_of_lora_gateways_type_a"]
                        );
                    }
                    return json_encode($scenario_data_5);
                }
                //For dynamic json file
                //$file_name = date('d-m-Y') . '.json'; //create dynamic json file name
                $file_name = date('d-m-Y') . '_lora_scenario' . '.json'; //create dynamic json file name

                // if(file_put_contents($file_name, get_data()))
                if(file_put_contents("MatlabCodes\Inputs-json/lora_scenario.json", get_data_5()))
                {
                    echo $file_name . ' file was created successfully!';
                }
                else
                {
                    echo 'There is some error';
                }
            @endphp
            <hr>
            <p><strong>Extras:</strong></p>
            @php
                function get_data_2() // this function fetch data table and it store into json formt and retutn data in json format
                {
                    $connect = mysqli_connect("localhost", "root", "", "thesis_tool");
                    $query_2 = "SELECT * FROM sensors_cost";
                    //$query2 = "SELECT 'cost_5g_type_a', 'installation_cost_5g_type_a', 'cost_5g_type_b', 'installation_cost_5g_type_b', 'cost_5g_type_c', 'installation_cost_5g_type_c', 'capacity_5g_type_a', 'conusmption_cost_5g_type_a', 'capacity_5g_type_b', 'conusmption_cost_5g_type_b', 'capacity_5g_type_c', 'conusmption_cost_5g_type_c' FROM sensors_cost,sensors_battery";
                    $result_2 = mysqli_query($connect, $query_2);
                    $scenario_data_2 = array();
                    while($row = mysqli_fetch_array($result_2))
                    {
                        $scenario_data_2[] = array(
                            'cost_5g_type_a'              => $row["cost_5g_type_a"],
                            'installation_cost_5g_type_a' => $row["installation_cost_5g_type_a"],
                            'cost_5g_type_b'              => $row["cost_5g_type_b"],
                            'installation_cost_5g_type_b' => $row["installation_cost_5g_type_b"],
                            'cost_5g_type_c'              => $row["cost_5g_type_c"],
                            'installation_cost_5g_type_c' => $row["installation_cost_5g_type_c"],

                            'cost_nb_type_a'              => $row["cost_nb_type_a"],
                            'installation_cost_nb_type_a' => $row["installation_cost_nb_type_a"],
                            'cost_nb_type_b'              => $row["cost_nb_type_b"],
                            'installation_cost_nb_type_b' => $row["installation_cost_nb_type_b"],
                            'cost_nb_type_c'              => $row["cost_nb_type_c"],
                            'installation_cost_nb_type_c' => $row["installation_cost_nb_type_c"],

                            'cost_lora_type_a'              => $row["cost_lora_type_a"],
                            'installation_cost_lora_type_a' => $row["installation_cost_lora_type_a"],
                            'cost_lora_type_b'              => $row["cost_lora_type_b"],
                            'installation_cost_lora_type_b' => $row["installation_cost_lora_type_b"],
                            'cost_lora_type_c'              => $row["cost_lora_type_c"],
                            'installation_cost_lora_type_c' => $row["installation_cost_lora_type_c"],
                            'cost_lora_gateway_type_a'      => $row["cost_lora_gateway_type_a"],
                            'installation_lora_gateway_type_a' => $row["installation_lora_gateway_type_a"]
                        );
                    }
                    return json_encode($scenario_data_2);
                }
                //For dynamic json file
                //$file_name = date('d-m-Y') . '.json'; //create dynamic json file name

                $file_name = date('d-m-Y') . '_cost' . '.json'; //create dynamic json file name

                // if(file_put_contents($file_name, get_data()))
                if(file_put_contents("MatlabCodes\Inputs-json/cost.json", get_data_2()))
                {
                    echo $file_name . ' file was created successfully!';
                }
                else
                {
                    echo 'There is some error';
                }
            @endphp
            <br>
            @php
                function get_data_3()
                {
                    $connect = mysqli_connect("localhost", "root", "", "thesis_tool");
                    $query_3 = "SELECT * FROM sensors_battery";
                    $result_3 = mysqli_query($connect, $query_3);
                    $scenario_data_3 = array();
                    while($row = mysqli_fetch_array($result_3))
                    {
                        $scenario_data_3[] = array(
                            'capacity_5g_type_a'         => $row["capacity_5g_type_a"],
                            'conusmption_cost_5g_type_a' => $row["conusmption_cost_5g_type_a"],
                            'capacity_5g_type_b'         => $row["capacity_5g_type_b"],
                            'conusmption_cost_5g_type_b' => $row["conusmption_cost_5g_type_b"],
                            'capacity_5g_type_c'         => $row["capacity_5g_type_c"],
                            'conusmption_cost_5g_type_c' => $row["conusmption_cost_5g_type_c"],

                            'capacity_nb_type_a'         => $row["capacity_nb_type_a"],
                            'conusmption_cost_nb_type_a' => $row["conusmption_cost_nb_type_a"],
                            'capacity_nb_type_b'         => $row["capacity_nb_type_b"],
                            'conusmption_cost_nb_type_b' => $row["conusmption_cost_nb_type_b"],
                            'capacity_nb_type_c'         => $row["capacity_nb_type_c"],
                            'conusmption_cost_nb_type_c' => $row["conusmption_cost_nb_type_c"],

                            'capacity_lora_type_a'          => $row["capacity_lora_type_a"],
                            'conusmption_cost_lora_type_a'  => $row["conusmption_cost_lora_type_a"],
                            'capacity_lora_type_b'          => $row["capacity_lora_type_b"],
                            'conusmption_cost_lora_type_b'  => $row["conusmption_cost_lora_type_b"],
                            'capacity_lora_type_c'          => $row["capacity_lora_type_c"],
                            'conusmption_cost_lora_type_c'  => $row["conusmption_cost_lora_type_c"],
                            'capacity_lora_gateway_type_a'  => $row["capacity_lora_gateway_type_a"],
                            'conusmption_lora_gateway_type_a' => $row["conusmption_lora_gateway_type_a"]
                        );
                    }
                    return json_encode($scenario_data_3);
                }
                $file_name = date('d-m-Y') . '_battery' . '.json'; //create dynamic json file name

                if(file_put_contents("MatlabCodes\Inputs-json/battery.json", get_data_3()))
                {
                    echo $file_name . ' file was created successfully!';
                }
                else
                {
                    echo 'There is some error';
                }
            @endphp
            <br>
        </div>
    </div>

    <h5> <b> STEP 2: </b> Run which ever algorith you want. </h5>

    <div class="card">
        <div class="card-header">
            <h2>Greedy code, find cheapest scenarios</h2>
        </div>
        <div class="card-body">
        <ul>
            <li>
                <h5> For cost-effective scenario: <button> Run button </button> <br> </h5>
                <h6> Direcory: <b> MattlabCodes/Greedy_CostEffective_Scenrio.m </b> </h6>
            </li>
            <hr>
            <li>
                <h5> For energy-effective scenario: <button> Run button </button> <br> </h5>
                <h6> Direcory: <b> MattlabCodes/Greedy_EnergyEffective_Scenrio.m </b> </h6>
            </li>
            <hr>
            <li>
                <h5> For most-effective scenario (both cost and energy): <button> Run button </button> <br> </h5>
                <h6> Direcory: <b> MattlabCodes/Greedy_MostEffective_Scenrio.m </b> </h6>
            </li>
        </ul>
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            <h2>Genetic Algorithm</h2>
        </div>
        <div class="card-body">
        <ul>
            <li>
            </li>
            <hr>
            <li>
            </li>
            <hr>
            <li>
            </li>
        </ul>
        </div>
    </div>

</div>
@endsection
<!-- Google Font: Source Sans Pro -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
<!-- Font Awesome -->
<link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
<!-- pace-progress -->
<link rel="stylesheet" href="../../plugins/pace-progress/themes/black/pace-theme-flat-top.css">
<!-- adminlte-->
<link rel="stylesheet" href="../../dist/css/adminlte.min.css">

<!-- jQuery -->
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- pace-progress -->
<script src="../../plugins/pace-progress/pace.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>
</body>
</html>
