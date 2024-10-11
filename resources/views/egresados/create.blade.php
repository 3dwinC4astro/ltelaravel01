@extends('adminlte::page')

@section('title', 'Agregar Egresado')

@section('content_header')
    <h1>Agregar Egresado</h1>
@stop

@section('content')
    <form action="{{ route('egresados.store') }}" method="POST">
        @csrf
        <!-- Campos -->
        <div class="form-group">
            <label for="cedula">Cédula</label>
            <input type="text" class="form-control" id="cedula" name="cedula" required>
        </div>

        <div class="form-group">
            <label for="nombres">Nombres</label>
            <input type="text" class="form-control" id="nombres" name="nombres" required>
        </div>

        <div class="form-group">
            <label for="apellidos">Apellidos</label>
            <input type="text" class="form-control" id="apellidos" name="apellidos" required>
        </div>

        <div class="form-group">
            <label for="programa">Programa</label>
            <input type="text" class="form-control" id="programa" name="programa" required>
        </div>

        <div class="form-group">
            <label for="celular">Celular</label>
            <input type="text" class="form-control" id="celular" name="celular" required>
        </div>

        <div class="form-group">
            <label for="correo">Correo</label>
            <input type="email" class="form-control" id="correo" name="correo" required>
        </div>

        <div class="form-group">
            <label for="fecha_nacimiento">Fecha de Nacimiento</label>
            <input type="date" class="form-control" id="fecha_nacimiento" name="fecha_nacimiento" required>
        </div>

        <div class="form-group">
            <label for="fecha_grado">Fecha de Grado</label>
            <input type="date" class="form-control" id="fecha_grado" name="fecha_grado" required>
        </div>

        <button type="submit" class="btn btn-primary">Guardar</button>
        <a href="{{ route('egresados.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
@stop
