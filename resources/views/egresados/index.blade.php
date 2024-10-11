@extends('adminlte::page')

@section('title', 'Egresados')

@section('content_header')
    <h1 class="text-center">Gestión de Egresados</h1>
@stop

@section('content')

    <!-- Mensajes de éxito y error -->
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <!-- Mostrar el rol actual del usuario y sus permisos -->
    @if(auth()->user()->roles->isEmpty())
        <div class="alert alert-danger">Vista Denegada: No tienes permisos suficientes para acceder a esta sección.</div>
    @else

        <!-- Botón para agregar egresados si es administrador o director -->
        @if(auth()->user()->hasRole('administrador') || auth()->user()->hasRole('director'))
            <a href="{{ route('egresados.create') }}" class="btn btn-success mb-3">
                <i class="fas fa-plus"></i> Agregar Egresado
            </a>
        @endif

        <!-- Tabla de egresados -->
        <div class="card shadow">
            <div class="card-header bg-primary text-white">
                <h3 class="card-title">Lista de Egresados</h3>
            </div>
            <div class="card-body p-0">
                <table class="table table-hover table-striped table-responsive-md">
                    <thead class="table-dark">
                        <tr>
                            <th>Cédula</th>
                            <th>Nombres</th>
                            <th>Apellidos</th>
                            <th>Programa</th>
                            <th>Celular</th>
                            <th>Correo</th>
                            <th>Fecha de Nacimiento</th>
                            <th>Fecha de Grado</th>
                            @if(auth()->user()->hasRole('administrador') || auth()->user()->hasRole('director'))
                                <th>Acciones</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($egresados as $egresado)
                            <tr>
                                <td>{{ $egresado->cedula }}</td>
                                <td>{{ $egresado->nombres }}</td>
                                <td>{{ $egresado->apellidos }}</td>
                                <td>{{ $egresado->programa }}</td>
                                <td>{{ $egresado->celular }}</td>
                                <td>{{ $egresado->correo }}</td>
                                <td>{{ $egresado->fecha_nacimiento }}</td>
                                <td>{{ $egresado->fecha_grado }}</td>
                                @if(auth()->user()->hasRole('administrador') || auth()->user()->hasRole('director'))
                                    <td>
                                        <div class="d-flex justify-content-around">
                                            @if(auth()->user()->hasRole('administrador'))
                                                <form action="{{ route('egresados.destroy', $egresado->id) }}" method="POST" onsubmit="return confirm('¿Estás seguro de eliminar este egresado?');" class="d-inline-block">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger">
                                                        <i class="fas fa-trash-alt"></i> Eliminar
                                                    </button>
                                                </form>
                                            @endif
                                            @if(auth()->user()->hasRole('director') || auth()->user()->hasRole('administrador'))
                                                <a href="{{ route('egresados.edit', $egresado->id) }}" class="btn btn-warning">
                                                    <i class="fas fa-edit"></i> Modificar
                                                </a>
                                            @endif
                                        </div>
                                    </td>
                                @endif
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endif
@stop

@section('css')
    <style>
        .card {
            border-radius: 10px;
            overflow: hidden;
        }
        .table {
            margin-bottom: 0;
        }
        .table th, .table td {
            text-align: center;
            vertical-align: middle;
        }
        .btn {
            padding: 0.4rem 1rem;
        }
        .badge {
            font-size: 1em;
        }
    </style>
@stop

@section('js')
    <script> console.log("Gestión de egresados personalizada activada."); </script>
@stop
