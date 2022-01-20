@extends('pages.charts.layouts.chart-layout')
@section('title','Profile')

<body>
@section('content')
<div class="topnav">
    <a href="{{ route('admin.index') }}" class="btn btn-primary">Back to Dashboard</a>
            {{-- <a href="#">Link</a> --}}
</div>
<div class="row">
  <div class="column">
    <h2>Table - View all data</h2>
    <a href="{{ route('insidetableView_1') }}" type="button" class="btn btn-primary btn-lg">Open</a>
  </div>
</div>
<hr>
<div class="row">
  <div class="column">
    <h2>Table - </h2>
    <button type="button" class="btn btn-primary btn-lg">Open</button>
    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
  </div>
</div>
<hr>

@endsection
<a id="back-to-top" href="{{ route('tableView') }}#" class="btn btn-primary back-to-top" role="button" aria-label="Scroll to top">
      <i class="fas fa-chevron-up"></i>
</a>
