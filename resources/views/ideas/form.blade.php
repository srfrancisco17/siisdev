<?php
    $isNew = empty($idea);
    $title = $isNew ? "Crear" : "Editar";
?>

@extends('adminlte::page')

@section('title', $title.' Ideas')

@section('content_header')
    <h1>{{$title}} Ideas</h1>
@stop

@section('content')

<div class="card">
    <div class="card-body">
        <form method="POST" action="{{empty($idea) ? route('idea.store') : route('idea.update', $idea)}}">
            @csrf
            @if (empty($idea))
              @method('post')
            @else
              @method('put')
            @endif
            <div class="form-group">
                <label for="title">Titulo</label>
                <input type="text" class="form-control" id="title" name="title" placeholder="Titulo de tu idea" value="{{old('title', $idea->title ?? '')}}">
                <x-input-error :messages="$errors->get('title')" class="mt-2" />
            </div>
            <div class="form-group">
                <label for="description">Descripcion</label>
                <textarea class="form-control" id="description" name="description" rows="3" placeholder="Escribe una descripcion para la idea">{{ old('description', $idea->description ?? '') }}</textarea>
                <x-input-error :messages="$errors->get('description')" class="mt-2" />
            </div>

            <button type="submit" class="btn btn-{{$isNew ? "success" : "primary"}}">{{$title}}</button> 

            <a href="{{route('idea.index')}}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
</div>


@stop