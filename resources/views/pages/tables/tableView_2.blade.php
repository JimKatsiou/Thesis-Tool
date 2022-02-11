@extends('layouts.app')
@section('title','??')

@section('content')

<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
            <a href={{ route('admin.index') }} type="button" class="btn btn-danger">Back to Dashboard</a>
            </div>
        </div>
        <hr>
        <div class="card">
            <div class="card-header">
                <h4>Table - Chipest</h4>
            </div>
            <div class="card-body">
                <button type="button" class="btn btn-primary btn-lg">Open</button>
            </div>
        </div>
        <hr>
        <div class="card">
            <div class="card-header">
                <h4>Pie Chart - Chipest Scenarios</h4>
            </div>
            <div class="card-body">
                <button type="button" class="btn btn-primary btn-lg">Open</button>
            </div>
        </div>
        <hr>
    </div>
    @endsection
