@extends('layouts.app')
@section('title','Setttings')

@section('content')

<script>
    function myFunction() {
      alert("ALERT THIS FUNCTION HAS RUNNED");
    }
</script>


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
        <a href={{ route('admin.index') }} type="button" class="btn btn-danger">Back to Dashboard</a>
{{-- <head>
    <title>Application Executer</title>
    <HTA:APPLICATION ID="oMyApp"
	    APPLICATIONNAME="Application Executer"
	    BORDER="no"
	    CAPTION="no"
	    SHOWINTASKBAR="yes"
	    SINGLEINSTANCE="yes"
	    SYSMENU="yes"
	    SCROLL="no"
	    WINDOWSTATE="normal">
    <script type="text/javascript" language="javascript">
        function RunFile() {
		WshShell = new ActiveXObject("WScript.Shell");
		WshShell.Run("c:/windows/system32/notepad.exe", 1, false);
        }
    </script>
</head>
<body>
	<input type="button" value="Run Notepad" onclick="RunFile();"/>
</body> --}}

{{-- <script language="VBScript">
    Sub RunProgram
        Set objShell = CreateObject("Wscript.Shell")
        objShell.Run "notepad.exe"
    End Sub
</script> --}}

        <div class="container mt-3">
        <h2>Card titles, text, and links</h2>
        <div class="card">
        </div>
        </div>

        <hr>
        <div class="container mt-3">
            <div class="card">
                <h3>Greedy code, find chepest scenarios (Cost)</h3>
            <div class="card-body">
                <?php if (isset($_GET['setup'])) { exec('E:\Development\Laravel\Thesis_Tool\public\codes\Greedy-C\code_version2.c'); } ?>
                <form method="get">
                    <button name="setup">Click to setup</button>
                </form>
            </div>
            </div>
        </div>

        {{-- <a onclick="window.open(document.URL, '_blank', 'location=yes,height=570,width=520,scrollbars=yes,status=yes');">
            Open New Window
        </a> --}}

        <hr>
        <div class="container mt-3">
            <div class="card">
                <h3>Greedy code, find chepest scenarios (Energy)</h3>
            <div class="card-body">
                <?php if (isset($_GET['setup'])) { exec('E:\Development\Laravel\Thesis_Tool\public\codes\Greedy-C\code_new.c'); } ?>
                <form method="get">
                    <button name="setup">Click to setup</button>
                </form>
            </div>
            </div>
        </div>
        </div>
    </div>
</div>

@endsection

