@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center"><h2>Hola Mundo</h2></div>
        <div class="row">
            <form action="" method="post">
                @csrf
                <input type="date">
                <input type="date">
            </form>
        </div>
    </div>
@endsection
