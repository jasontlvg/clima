@extends('layouts.app')

@section('content')
{{--    <h2>{{$users}}</h2>--}}
    <div class="container">
        <div class="row">
            <h2 class="col py-3 text-center">Usuarios Registrados</h2>
        </div>
        <div class="row">
            <form action="{{ route('admin.delete.users') }}" class="container" method="post">
                @csrf
                <table class="table table-striped">

                    <thead class="thead-dark">
                    <tr>
                        <th scope="col" class="text-center">#ID</th>
                        <th scope="col" class="text-center">Nombre</th>
                        <th scope="col" class="text-center">Email</th>
                        <th scope="col" class="text-center">Fecha de Solicitud</th>
                        <th scope="col" class="text-center">Eliminar</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $ur)
                        <tr>
                            <td class="text-center">{{$ur->id}}</td>
                            <td class="text-center">{{$ur->name}}</td>
                            <td class="text-center">{{$ur->email}}</td>
                            <td class="text-center">{{$ur->created_at->isoFormat('MMMM Do YYYY, h:mm:ss a')}}</td>
                            <th scope="row" class="d-flex justify-content-center">
                                <input type="checkbox" name="du[]" value="{{$ur->id}}">
                            </th>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <button type="submit" class="btn btn-dark">Enviar</button>
            </form>
        </div>
        <div class="row justify-content-center">
            @if(!count($users) >= 1)
                <h2>No hay peticiones</h2>
            @endif
        </div>
    </div>
@endsection