@extends('adminlte::page')

@section('title', 'Editar Egresado')

@section('content_header')
    <h1>Editar Egresado</h1>
@stop

@section('content')
    <form action="{{ route('egresados.update', $egresado->id) }}" method="POST">
        @csrf
        @method('PUT')

        <!-- Campos similares a create, llenando con los datos del egresado -->
        <div class="form-group">
            <label for="cedula">Cédula</label>
            <input type="text" class="form-control" id="cedula" name="cedula" value="{{ $egresado->cedula }}" required>
        </div>

        <div class="form-group">
            <label for="nombres">Nombres</label>
            <input type="text" class="form-control" id="nombres" name="nombres" value="{{ $egresado->nombres }}" required>
        </div>

        <div class="form-group">
            <label for="apellidos">Apellidos</label>
            <input type="text" class="form-control" id="apellidos" name="apellidos" value="{{ $egresado->apellidos }}" required>
        </div>

        <div class="form-group">
            <label for="programa">Programa</label>
            <input type="text" class="form-control" id="programa" name="programa" value="{{ $egresado->programa }}" required>
        </div>

        <div class="form-group">
            <label for="celular">Celular</label>
            <input type="text" class="form-control" id="celular" name="celular" value="{{ $egresado->celular }}" required>
        </div>

        <div class="form-group">
            <label for="correo">Correo</label>
            <input type="email" class="form-control" id="correo" name="correo" value="{{ $egresado->correo }}" required>
        </div>

        <div class="form-group">
            <label for="fecha_nacimiento">Fecha de Nacimiento</label>
            <input type="date" class="form-control" id="fecha_nacimiento" name="fecha_nacimiento" value="{{ $egresado->fecha_nacimiento }}" required>
        </div>

        <div class="form-group">
            <label for="fecha_grado">Fecha de Grado</label>
            <input type="date" class="form-control" id="fecha_grado" name="fecha_grado" value="{{ $egresado->fecha_grado }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Actualizar</button>
        <a href="{{ route('egresados.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
@stop
