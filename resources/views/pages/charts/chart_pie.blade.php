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
    <h2>Pie Chart - ???</h2>
    <p>Some text.</p>
    <button type="button" class="btn btn-primary btn-lg">Open</button>
  </div>
</div>
<hr>
<div class="row">
  <div class="column">
    <h2>Pie Chart - ???</h2>
    <p>Some text.</p>
    <button type="button" class="btn btn-primary btn-lg">Open</button>
  </div>
</div>
<hr>


@endsection
<a id="back-to-top" href="{{ route('chartViewPie') }}#" class="btn btn-primary back-to-top" role="button" aria-label="Scroll to top">
      <i class="fas fa-chevron-up"></i>
</a>
