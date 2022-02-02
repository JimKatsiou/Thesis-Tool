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
                <h4>Pie Chart - ENERGY CONSUMPTION (5G VS LoRa VS NB-IoT)</h4>
            </div>
            <div class="card-body">
                {{-- <canvas id="sales-chart"></canvas> --}}
                <button onclick="updateChart_2()">Update</button>
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
        <div class="card">
            <div class="card-header">
                <h4>Pie Chart - Total Score </h4>
            </div>
            <div class="card-body">
                <canvas id="myChart"></canvas>
                <button onclick="updateChart()">View</button>
            </div>
        </div>
        <div class="card">
            <div class="card-header">
                <h4>Pie Chart - Total Score </h4>
            </div>
            <div class="card-body">
                <button type="button" class="btn btn-primary btn-lg">Open</button>
            </div>
        </div>
        <hr>
        <div class="card">
            <div class="card-header">
                <h4>Pie Chart - Total Score </h4>
            </div>
            <div class="card-body">
                <button type="button" class="btn btn-primary btn-lg">Open</button>
            </div>
        </div>
        <hr>
        <div class="card">
            <div class="card-header">
                <h4>Pie Chart - Total Score </h4>
            </div>
            <div class="card-body">
                <button type="button" class="btn btn-primary btn-lg">Open</button>
            </div>
        </div>
        <hr>
        <div class="card">
            <div class="card-header">
                <h4>Pie Chart - Total Score </h4>
            </div>
            <div class="card-body">
                <button type="button" class="btn btn-primary btn-lg">Open</button>
            </div>
        </div>
        <hr>
    </div>
    @endsection
