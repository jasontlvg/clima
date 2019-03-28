@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Hiakl</h2>
    {{--<div class="row justify-content-center">--}}
        {{--<div class="col-md-8">--}}
            {{--<div class="card">--}}
                {{--<div class="card-header">Admin Dashboard</div>--}}

                {{--<div class="card-body">--}}
                    {{--@if (session('status'))--}}
                        {{--<div class="alert alert-success" role="alert">--}}
                            {{--{{ session('status') }}--}}
                        {{--</div>--}}
                    {{--@endif--}}

                    {{--You are logged as <strong>ADMIN</strong>--}}
                    {{--<form action="">--}}

                        {{--@foreach($urs as $ur)--}}
                            {{--<div class="p">{{$ur->id}}</div>--}}
                            {{--<a href="{{route('requestRegisterStore', $ur)}}">Lala</a>--}}
                            {{--<input type="checkbox" name="cb_{{$ur->id}}" value="Bike">{{$ur->email}}<br>--}}
                        {{--@endforeach--}}
                    {{--</form>--}}

                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
</div>
@endsection
