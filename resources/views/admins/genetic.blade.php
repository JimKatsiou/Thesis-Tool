@extends('layouts.app')
@section('title','??')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
        <a href={{ route('admin.index') }} type="button" class="btn btn-danger">Back to Dashboard</a>
        </div>
    </div>
    <hr>
    @php
    // how to compile java program:
    //exec("javac abc.java");

    //echo exec("java XYZ");
    //exec("cmd");
    //system("run_java.bat");
    system("E:/Development/Laravel/Thesis_Tool/public/GA/run_java.bat");
    //system("cmd");
    //system("cmd /c C:[path to file]");
    @endphp

</div>

@endsection
