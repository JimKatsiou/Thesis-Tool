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
        <?php
            if (isset($_GET['setup'])) { exec('E:\Development\Laravel\Thesis_Tool\public\codes\Greedy-C\code_version2.c'); }
            function get_data() // this function fetch data table and it store into json formt and retutn data in json format
            {
                $connect = mysqli_connect("localhost", "root", "", "thesis_tool");
                $query = "SELECT * FROM scenarios WHERE display = 1" ;
                // $query = "SELECT cost, energy FROM sscenarios";
                $result = mysqli_query($connect, $query);
                $scenario_data = array();
                while($row = mysqli_fetch_array($result))
                {
                    $scenario_data[] = array(
                        'scenario'      => $row["id"],
                        'sensors5G'     => $row["sensors5G"],
                        'sensorsNB'     => $row["sensorsNB"],
                        'sensorsLoRa'   => $row["sensorsLoRa"],
                        'Gateaways'     => $row["Gateaways"],
                        'FinalCost'     => $row["FinalCost"],
                        'Energy'        => $row["Energy"],
                        'display'       => $row["display"] // it must be deleted, is for checkin.
                    );
                }
                return json_encode($scenario_data);
            }
            //For dynamic json file
            //$file_name = date('d-m-Y') . '.json'; //create dynamic json file name

            $file_name = date('d-m-Y') . '_scenarios' . '.json'; //create dynamic json file name

            // if(file_put_contents($file_name, get_data()))
            if(file_put_contents("MatlabCodes/json/scenarios.json", get_data()))
            {
                echo $file_name . ' file was created successfully!';
            }
            else
            {
                echo 'There is some error';
            }
        ?>
        </div>
    </div>
    <h5> <b> STEP 2: </b> Run which ever algorith you want. </h5>

    <div class="card">
        <div class="card-header">
            <h2>Greedy code, find chepest scenarios</h2>
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



<!-- ./wrapper -->
{{-- // ~~~~ 1os tropos ~~~~~~ me paei F:\Development\Laravel\Thesis_Tool\public
//exec("matlab.exe");
//system("matlab.exe");


// ~~~~ 2os tropos ~~~~~~ F:\Development\Laravel\Thesis_Tool\public
// $cmd = 'D:\Programs Files\Matlab\R2020a\bin\matlab';
//  exec($cmd);

// ~~~~ 3os tropos ~~~~~~ not working
// $mpla = "F:\Development\Laravel\Thesis_Tool\public\MatlabCodes";
// exec($mpla);
// $mpla = "F:/Development/Laravel/Thesis_Tool/public/MatlabCodes/version_2.m";
// exec($mpla);


// ~~~~ 4os tropos ~~~~~~ not working
// $cmd = 'D:\Programs Files\Matlab\R2020a\bin\matlab -automation -r "run('F:/Development/Laravel/Thesis_Tool/public/MatlabCodes/version_2.m')"';
// $cmd = 'D:\Programs Files\Matlab\R2020a\bin\matlab -automation -r "run('F:\Development\Laravel\Thesis_Tool\public\MatlabCodes\version_2.m')"';
// $cmd = 'D:\Programs Files\Matlab\R2020a\bin\matlab -automation -r "run('G:/Thesis_Matlab/Codes/version_2.m')"';
// $cmd = 'D:\Programs Files\Matlab\R2020a\bin\matlab -automation -r "run('G:\Thesis_Matlab\Codes\version_2.m')"';

// $cmd = 'D:/Programs Files/Matlab/R2020a/bin/matlab -automation -r "run('F:/Development/Laravel/Thesis_Tool/public/MatlabCodes/version_2.m')"';
// $cmd = 'D:/Programs Files/Matlab/R2020a/bin/matlab -automation -r "run('F:\Development\Laravel\Thesis_Tool\public\MatlabCodes\version_2.m')"';
// $cmd = 'D:/Programs Files/Matlab/R2020a/bin/matlab -automation -r "run('G:/Thesis_Matlab/Codes/version_2.m')"';
// $cmd = 'D:/Programs Files/Matlab/R2020a/bin/matlab -automation -r "run('G:\Thesis_Matlab\Codes\version_2.m')"';

//$cmd = 'D:\Programs Files\Matlab\R2020a\bin\matlab -automation -r "run(\'/F:/Development/Laravel/Thesis_Tool/public/MatlabCodes/version_2.m\')"';
//$cmd = 'D:\Programs Files\Matlab\R2020a\bin\matlab -automation -r "run(\'\F:\Development\Laravel\Thesis_Tool\public\MatlabCodes\version_2.m\')"';
// $cmd = 'D:\Programs Files\Matlab\R2020a\bin\matlab -automation -r "run(\'/G:/Thesis_Matlab/Codes/version_2.m\')"';
// $cmd = 'D:\Programs Files\Matlab\R2020a\bin\matlab -automation -r "run(\'\G:\Thesis_Matlab\Codes\version_2.m\')"';

// $cmd = 'D:/Programs Files/Matlab/R2020a/bin/matlab -automation -r "run(\'/F:/Development/Laravel/Thesis_Tool/public/MatlabCodes/version_2.m\')"';
// $cmd = 'D:/Programs Files/Matlab/R2020a/bin/matlab -automation -r run"(\'/F:/Development/Laravel/Thesis_Tool/public/MatlabCodes/version_2.m\')"';
// $cmd = 'D:/Programs Files/Matlab/R2020a/bin/matlab -automation -r run"(\'\G:\Thesis_Matlab\Codes\version_2.m\')"';
// $cmd = 'D:/Programs Files/Matlab/R2020a/bin/matlab -automation -r "run(\'\G:\Thesis_Matlab\Codes\version_2.m\')"';

// $cmd = 'D:/Programs Files/Matlab/R2020a/bin/matlab -automation -r "run(\'F:/Development/Laravel/Thesis_Tool/public/MatlabCodes/version_2.m\')"';
// $cmd = 'D:\Programs Files\Matlab\R2020a\bin\matlab -automation -r "run(\'F:\Development\Laravel\Thesis_Tool\public\MatlabCodes\version_2.m\')"';
// $cmd = 'D:/Programs Files/Matlab/R2020a/bin/matlab -automation -r "run(\'G:\Thesis_Matlab\Codes\version_2.m\')"';
// $cmd = 'D:\Programs Files\Matlab\R2020a\bin\matlab -automation -r "run(\'G:/Thesis_Matlab/Codes/version_2.m\')"';


//$cmd = "D:\Programs Files\Matlab\R2020a\bin\matlab -automation -r 'run 'F:/Development/Laravel\Thesis_Tool/public/MatlabCodes/version_2.m'' ";
//$cmd = "D:\Programs Files\Matlab\R2020a\bin\matlab -automation -r 'run 'F:/Development/Laravel\Thesis_Tool/public/MatlabCodes/version_2.m'' ";

// $cmd = 'D:\Programs Files\Matlab\R2020a\bin\matlab -automation -r "F:/Development/Laravel\Thesis_Tool/public/MatlabCodes/version_2.m"';
//exec($cmd);

// ~~~~~~~~~~ DIRECTLY EXEC ~~~~~~~~~~~~~
//exec("'D:\Programs Files\Matlab\R2020a\bin\matlab -automation -r "run('F:/Development/Laravel/Thesis_Tool/public/MatlabCodes/version_2.m')"'");
// exec("'D:\Programs Files\Matlab\R2020a\bin\matlab -automation -r "run('F:\Development\Laravel\Thesis_Tool\public\MatlabCodes\version_2.m')"'");
// exec("'D:\Programs Files\Matlab\R2020a\bin\matlab -automation -r "run('G:/Thesis_Matlab/Codes/version_2.m')"'");
// exec("'D:\Programs Files\Matlab\R2020a\bin\matlab -automation -r "run('G:\Thesis_Matlab\Codes\version_2.m')"'");

//exec("'D:/Programs Files/Matlab/R2020a/bin/matlab -automation -r "run('F:/Development/Laravel/Thesis_Tool/public/MatlabCodes/version_2.m')"'");
// exec("'D:/Programs Files/Matlab/R2020a/bin/matlab -automation -r "run('F:\Development\Laravel\Thesis_Tool\public\MatlabCodes\version_2.m')"'");
// exec("'D:/Programs Files/Matlab/R2020a/bin/matlab -automation -r "run('G:/Thesis_Matlab/Codes/version_2.m')"'");
// exec("'D:/Programs Files/Matlab/R2020a/bin/matlab -automation -r "run('G:\Thesis_Matlab\Codes\version_2.m')"'");

// exec("'D:\Programs Files\Matlab\R2020a\bin\matlab -automation -r "run(\'/F:/Development/Laravel/Thesis_Tool/public/MatlabCodes/version_2.m\')"'");
// exec("'D:\Programs Files\Matlab\R2020a\bin\matlab -automation -r "run(\'\F:\Development\Laravel\Thesis_Tool\public\MatlabCodes\version_2.m\')"'");
// exec("'D:\Programs Files\Matlab\R2020a\bin\matlab -automation -r "run(\'/G:/Thesis_Matlab/Codes/version_2.m\')"'");
// exec("'D:\Programs Files\Matlab\R2020a\bin\matlab -automation -r "run(\'\G:\Thesis_Matlab\Codes\version_2.m\')"'");

// exec("'D:/Programs Files/Matlab/R2020a/bin/matlab -automation -r "run(\'/F:/Development/Laravel/Thesis_Tool/public/MatlabCodes/version_2.m\')"'");
// exec("'D:/Programs Files/Matlab/R2020a/bin/matlab -automation -r "run(\'/F:/Development/Laravel/Thesis_Tool/public/MatlabCodes/version_2.m\')"'");
// exec("'D:/Programs Files/Matlab/R2020a/bin/matlab -automation -r "run(\'\G:\Thesis_Matlab\Codes\version_2.m\')"'");
// exec("'D:/Programs Files/Matlab/R2020a/bin/matlab -automation -r "run(\'\G:\Thesis_Matlab\Codes\version_2.m\')"'");

// exec("'D:/Programs Files/Matlab/R2020a/bin/matlab -automation -r "run(\'F:/Development/Laravel/Thesis_Tool/public/MatlabCodes/version_2.m\')"'");
// exec("'D:\Programs Files\Matlab\R2020a\bin\matlab -automation -r "run(\'F:\Development\Laravel\Thesis_Tool\public\MatlabCodes\version_2.m\')"'");
// exec("'D:/Programs Files/Matlab/R2020a/bin/matlab -automation -r "run(\'G:\Thesis_Matlab\Codes\version_2.m\')"'");
// exec("'D:\Programs Files\Matlab\R2020a\bin\matlab -automation -r "run(\'G:/Thesis_Matlab/Codes/version_2.m\')"'");


// exec("D:\Programs Files\Matlab\R2020a\bin\matlab -automation -r 'run 'F:/Development/Laravel\Thesis_Tool/public/MatlabCodes/version_2.m'");
// exec("D:\Programs Files\Matlab\R2020a\bin\matlab -automation -r 'run 'F:/Development/Laravel\Thesis_Tool/public/MatlabCodes/version_2.m'");


//system("calc");
// echo "<pre>";
// system ("cmd");
// echo "<hr>";
// system ("dir");
// echo "<hr>";
// echo "</pre>";

//exec("\'C:\Program Files\MATLAB\R2019a\bin\matlab.exe\' -nosplash -nodesktop -r \'run('G:\MATLAB_Scripts\sample.m')\" 2>&1");
//system('matlab -nodesktop -nosplash -r "F:\Development\Laravel\Thesis_Tool\public\MatlabCodes version_2;"');
// // Get current working directory
// // magicSquare.m exists in this directory
// $pwd = getcwd();
// // Set command. Please use -r option and remember to add exit in the last
// $cmd = 'D:\Programs Files\Matlab\R2020a\bin\matlab -automation -sd ' . $pwd . ' -r "magicSquare(5);exit" -wait -logfile log.txt';

// //$cmd = 'D:\Programs Files\Matlab\R2020a\bin\matlab.exe -automation -sd ' . $pwd . 'r "G:\Matlab\Codes;exit"';
// // exec
// $last_line = exec($cmd, $output, $retval);
// if ($retval == 0){
// // Read from CSV file which MATLAB has created
//    $lines = file('result.csv');
//    echo '<p>Results:<br>';
//    foreach($lines as $line)
//    {
//      echo $line.'<br>';
//    }
//    echo '</p>';
//  } else {
//    // When command failed
//    echo '<p>Failed!</p>';
//  } --}}




