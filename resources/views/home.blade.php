@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">User Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged as <strong>USER</strong>
                </div>
            </div>
        </div>
    </div>
    {{--<form id="logout-form" action="{{ route('logout') }}" method="POST">--}}
        {{--@csrf--}}
        {{--<button type="submit">Hallo</button>--}}
    {{--</form>--}}
</div>
@endsection
