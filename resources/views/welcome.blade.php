@extends('layouts.app')
@section('content')
    <div class="container"><div class="row">
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
                </tbody>
            </table>
        </div>
        @if($userType != true)
            <div class="row justify-content-center">
                {{$x->links()}}
            </div>
        @endif
    </div>
@endsection
