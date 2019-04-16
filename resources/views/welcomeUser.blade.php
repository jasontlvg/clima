@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center py-3">
            <h2>Fechas</h2>
        </div>
        <div class="row mb-2">
            <form action="{{route('home.consult')}}" method="post">
                @csrf
                <input type="date" name="from" value="2019-10-01" class="btn btn-dark">
                <input type="date" name="to" value="2022-10-01" class="btn btn-dark">
                <button type="submit" class="btn btn-primary mr-1">Buscar</button>
            </form>
            <a href="{{route('home')}}" class="btn btn-success">Ver todos</a>
            <a href="{{url('/download')}}" class="btn btn-success ml-1">Excel</a>
        </div>
        <div class="row">
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col" class="text-center">Fecha</th>
                        <th scope="col" class="text-center">temp_out</th>
                        <th scope="col" class="text-center">hi_temp</th>
                        <th scope="col" class="text-center">low_temp</th>
                        <th scope="col" class="text-center">out_hum</th>
                        <th scope="col" class="text-center">dew_pt</th>
                    </tr>
                </thead>
                <tbody>
                    @if($x != null)
                        @foreach($x as $data)
                            <tr>
                                <th scope="row" class="text-center">{{$data->date_time}}</th>
                                <td class="text-center">{{$data->temp_out}}</td>
                                <td class="text-center">{{$data->hi_temp}}</td>
                                <td class="text-center">{{$data->low_temp}}</td>
                                <td class="text-center">{{$data->out_hum}}</td>
                                <td class="text-center">{{$data->dew_pt}}</td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>
        @if(!$userType && $x!=null && $linksActive)
            <div class="row justify-content-center">
                {{$x->links()}}
            </div>
        @endif
    </div>
@endsection
