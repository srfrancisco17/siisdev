@extends('adminlte::page')

@section('title', 'Ideas')

@section('content_header')
    <h1>Ideas</h1>
@stop

@section('content')
    
@if (session()->has('message'))
<div class="alert alert-info alert-dismissible fade show" role="alert">
    {{session("message")}}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
@endif


<a href="{{route("idea.create")}}" class="btn btn-primary" role="button" aria-pressed="true">Agregar</a>


<div class="list-group">
    @foreach ($ideas as $idea)
    <div class="list-group-item list-group-item-action flex-column align-items-start">
        <div class="d-flex w-100 justify-content-between">
            <h5 class="mb-1">
                {{$idea->title}} 
                @unless($idea->created_at->eq($idea->updated_at))
                    <span class="badge badge-secondary">Editado</span>
                @endunless
            </h5>
            <div class="dropdown">
                <button class="btn btn-light dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fa fa-ellipsis-v"></i>
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                  <a class="dropdown-item" href="{{route('idea.show', $idea)}}">Ver</a>
                  @can('update', $idea)
                    <a class="dropdown-item" href="{{route('idea.edit', $idea)}}">Editar</a>
                    <form method="POST" action="{{route('idea.delete', $idea)}}">
                        @csrf
                        @method('delete')
                        <a href="javascript:void(0);" class="dropdown-item" onclick="event.preventDefault(); this.closest('form').submit();">
                            Eliminar
                        </a>
                    </form>
                  @endcan
                </div>
            </div>

        </div>
        <p class="mb-1">{{$idea->description}}</p>
        <small>{{$idea->created_at->format("Y-m-d")}} | {{$idea->user->name}}</small>    
    </div>
    @endforeach
</div>
    
@stop