@extends('layouts.app')
@section('title','Scenarios')

@section('content')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <a href={{ route('admin.index') }} type="button" class="btn btn-danger">Back to Dashboard</a>
            <a href="{{ route('scnario.create') }}" class="btn btn-primary pull-left" style="float: right"> + Add </a>
            <br><br>
            <div class="card">
                <div class="card-header" align="center"><b>Scenario List</b></div>
                <div class="card-body">
                @if(session()->has('message'))
                      <div class="alert alert-success">
                        {{ session()->get('message') }}
                      </div>
                @endif
                @if($message = Session::get('success'))
                    <div class="alert alert-success">
                        <p>{{ $message }}</p>
                    </div>
                @endif

                <table class="table table-bordered table-hover">
                    <thead class="table-dark">
                    <tr align="center">
                        <th scope="col">#</th>
                        <th scope="col">5G Sensors</th>
                        <th scope="col">NB-IoT Sensors</th>
                        <th scope="col">LoRa Sensors</th>
                        <th scope="col">LoRa Gateways</th>
                        <th scope="col">Final Cost</th>
                        <th scope="col">Energy</th>
                        <th scope="col">Edit Scenario</th>
                        <th scope="col">Status</th>
                        <th scope="col">Delete</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($scenarios as $row)
                        <tr>
                            <td align="center">{{$row->id}}</td>
                            <td align="center">{{$row->sensors5G}}</td>
                            <td align="center">{{$row->sensorsNB}}</td>
                            <td align="center">{{$row->sensorsLoRa}}</td>
                            <td align="center">{{$row->Gateaways}}</td>
                            <td align="center">{{$row->FinalCost}}</td>
                            <td align="center">{{$row->Energy}}</td>
                            <td align="center"><a href="{{ route('scnario.create') }} , $row->id) }}" class="btn btn-warning"> Edit </a></td>
                            <td align="center">
                                @if($row->display == 1)
                                <a href="{{ url('/scenarios/scenario_display/'.$row->id.'/0') }}" class="btn btn-danger" onclick="return confirm('Are you sure want to enable ?')">Enable</a>
                                @elseif($row->display == 0)
                                <a href="{{ url('/scenarios/scenario_display/'.$row->id.'/1') }}" class="btn btn-success" onclick="return confirm('Are you sure want to disable ?')">Disable</a>
                                @endif
                            </td>
                            <td align="center"><a href="{{ route('scnario.create') }} , $row->id) }}" class="btn btn-danger"> Delete </a></td>


                            {{-- @if(Auth::user()->role == 2 || Auth::user()->role == 1)
                                @if($row->display == 0)
                                    <td class="badge-success" align="center">
                                        Διαθέσιμο
                                    </td>
                                @elseif($row->display == 1)
                                    <td class="badge-danger" align="center">
                                        Μη Διαθέσιμο
                                    </td>
                                @endif
                            @endif --}}
                        </tr>
                    </tbody>
                    @endforeach
                </table>
        </div>
    </div>
</div>

        <script>
            $(document).ready(function(){
                $('.delete_form').on('submit' , function(){
                    if(confirm("Are you sure you want to delete it?"))
                    {
                        return true;
                    }
                    else
                    {
                        return false;
                    }
                });
            });
        </script>
@endsection

