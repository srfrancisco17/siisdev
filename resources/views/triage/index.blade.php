@extends('adminlte::page')

@section('title', 'Triage')

@section('content_header')
    <h1>Triage</h1>
@stop

@section('content')

<div class="container mt-5">

    <div class="card">
        <div class="card-header">
            Busqueda de paciente:
        </div>
        <div class="card-body">
            <form class="form-inline">
                <div class="form-group mr-3">
                    <select class="form-control" id="plan_id" name="plan_id">
                        <option value="">Seleccione plan</option>
                        <option value="opcion1">Opción 1</option>
                        <option value="opcion2">Opción 2</option>
                        <option value="opcion3">Opción 3</option>
                    </select>
                </div>
                <div class="form-group mr-3">
                    <select class="form-control" id="tipo_id_paciente" name="tipo_id_paciente">
                        <option value="">Seleccione tipo de documento</option>
                        <option value="opcion1">Opción 1</option>
                        <option value="opcion2">Opción 2</option>
                        <option value="opcion3">Opción 3</option>
                    </select>
                </div>
                <div class="form-group mr-3">
                    <input type="text" class="form-control" id="paciente_id" name="paciente_id" placeholder="Ingrese numero documento">
                </div>
        
                <button type="submit" class="btn btn-primary">Buscar</button>
            </form>
        </div>
    </div>

</div>


@stop
