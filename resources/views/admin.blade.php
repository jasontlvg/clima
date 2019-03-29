@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <h2 class="col py-3 text-center">Administrador de Usuarios</h2>
        </div>
        <div class="row">
            <form action="{{ route('registerInRegisterUsers') }}" class="container" method="post">
                @csrf
                <table class="table table-striped">

                    <thead class="thead-dark">
                        <tr>
                            <th scope="col" class="text-center">Aceptar</th>
                            <th scope="col" class="text-center">#ID</th>
                            <th scope="col" class="text-center">Nombre</th>
                            <th scope="col" class="text-center">Email</th>
                            <th scope="col" class="text-center">Fecha de Solicitud</th>
                        </tr>
                    </thead>
                        <tbody>
                            @foreach($urs as $ur)
                                <tr>
                                    <th scope="row" class="d-flex justify-content-center">
                                        <input type="checkbox" name="au[]" value="{{$ur->id}}">
                                    </th>
                                    <td class="text-center">{{$ur->id}}</td>
                                    <td class="text-center">{{$ur->name}}</td>
                                    <td class="text-center">{{$ur->email}}</td>
                                    <td class="text-center">{{$ur->created_at}}</td>
                                </tr>
                            @endforeach
                        </tbody>
                </table>
                <button type="submit" class="btn btn-dark">Enviar</button>
            </form>
        </div>
        <div class="row justify-content-center">
            @if(!count($urs) >= 1)
                <h2>No hay peticiones</h2>
            @endif
        </div>
    </div>
@endsection
