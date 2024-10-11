@extends('adminlte::page')

@section('title', 'Editar Aspirante')

@section('content_header')
    <h1 class="text-center">Editar Aspirante</h1>
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

    <div class="card shadow">
        <div class="card-header bg-primary text-white">
            <h3 class="card-title">Formulario de Edición</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('aspirantes.update', $aspirante->id) }}" method="POST">
                @csrf
                @method('PUT')

                <!-- Campo de Cédula -->
                <div class="form-group mb-3">
                    <label for="cedula" class="form-label">Cédula</label>
                    <input type="text" class="form-control" id="cedula" name="cedula" value="{{ $aspirante->cedula }}" required>
                </div>

                <!-- Campo de Nombres -->
                <div class="form-group mb-3">
                    <label for="nombres" class="form-label">Nombres</label>
                    <input type="text" class="form-control" id="nombres" name="nombres" value="{{ $aspirante->nombres }}" required>
                </div>

                <!-- Campo de Apellidos -->
                <div class="form-group mb-3">
                    <label for="apellidos" class="form-label">Apellidos</label>
                    <input type="text" class="form-control" id="apellidos" name="apellidos" value="{{ $aspirante->apellidos }}" required>
                </div>

                <!-- Campo de Programa -->
                <div class="form-group mb-3">
                    <label for="programa" class="form-label">Programa</label>
                    <input type="text" class="form-control" id="programa" name="programa" value="{{ $aspirante->programa }}" required>
                </div>

                <!-- Campo de Celular -->
                <div class="form-group mb-3">
                    <label for="celular" class="form-label">Celular</label>
                    <input type="text" class="form-control" id="celular" name="celular" value="{{ $aspirante->celular }}" required>
                </div>

                <!-- Campo de Correo -->
                <div class="form-group mb-3">
                    <label for="correo" class="form-label">Correo</label>
                    <input type="email" class="form-control" id="correo" name="correo" value="{{ $aspirante->correo }}" required>
                </div>

                <!-- Campo de Fecha de Nacimiento -->
                <div class="form-group mb-3">
                    <label for="fecha_nacimiento" class="form-label">Fecha de Nacimiento</label>
                    <input type="date" class="form-control" id="fecha_nacimiento" name="fecha_nacimiento" value="{{ $aspirante->fecha_nacimiento }}" required>
                </div>

                <!-- Botones -->
                <div class="d-flex justify-content-between">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save"></i> Actualizar Aspirante
                    </button>
                    <a href="{{ route('aspirantes.index') }}" class="btn btn-secondary">
                        <i class="fas fa-times"></i> Cancelar
                    </a>
                </div>
            </form>
        </div>
    </div>
@stop

@section('css')
    <style>
        .card {
            border-radius: 10px;
            overflow: hidden;
        }
        .form-group label {
            font-weight: bold;
        }
        .form-control {
            border-radius: 5px;
        }
        .btn {
            padding: 0.5rem 1.5rem;
        }
    </style>
@stop

@section('js')
    <script> console.log("Página de edición de aspirantes activada."); </script>
@stop
