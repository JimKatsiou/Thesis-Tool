@extends('layouts.master')


@section('content')

    <div class="row">
        <div class="col-md-12">
            <br />
            <h3 aling="center"> Add new scenario</h3>
            <hr>

            <!--ALERT-->
            @if(count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            @if(\Session::has('success'))
                <div class="alert alert-success">
                    <p>{{ \Session::get('success') }}</p>
                </div>
            @endif

            <form method="POST" action="{{ route('add_scenario') }}">
                {{ csrf_field() }}
                <div class="form-group">
                    <b>sensors5G</b>
                    <input type="number" name="sensors5G" class="form-control" placeholder="sensors5G" />
                </div>
                <div class="form-group">
                    <b>sensorsNB</b>
                    <input type="number" name="sensorsNB" min="0" class="form-control" placeholder="sensorsNB" />
                </div>
                <div class="form-group">
                    <b>sensorsLoRa</b>
                    <input type="number" name="sensorsLoRa" class="form-control" placeholder="sensorsLoRa" />
                </div>
                <div class="form-group">
                    <b>Gateaways</b>
                    <input type="number" name="Gateaways" class="form-control" placeholder="Gateaways" />
                </div>
                <div class="form-group">
                    <b>FinalCost</b>
                    <input type="number" name="FinalCost" class="form-control" placeholder="FinalCost" />
                </div>
                <div class="form-group">
                    <b>Energy</b>
                    <input type="number" name="Energy" class="form-control" placeholder="Energy" />
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Sumbit</button>
                    <a href="{{ route('scnario.index') }}" type="button" class="btn btn-secondary pull-right"> Cancel</a>
                </div>
            </form>
        </div>
    </div>

@endsection
