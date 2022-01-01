<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>MATLAB PAGE</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
  <!-- pace-progress -->
  <link rel="stylesheet" href="../../plugins/pace-progress/themes/black/pace-theme-flat-top.css">
  <!-- adminlte-->
  <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
</head>
<body>

<?php
exec("matlab.exe");
?>
<!-- Default box -->
<div class="card">
    <div class="card-header">
        <h1>MATLAB was opened </h1>
    </div>
    <div class="card-body">
        <a type="button" href="{{ route('admin.index') }}" class="btn btn-primary">Back to Dashboard</a>
        <hr>
        <h3> Wait a while for the necessary processes to load </h3>
        <br>
    </div>
    <!-- /.card-body -->
</div>
<!-- /.card -->

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




