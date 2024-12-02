@extends('adminlte::page')

@section('title', 'Task')

@section('content_header')
    <h1>Task</h1>
    @livewireStyles
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
@stop

@section('content')
    <livewire:main /> 
@stop

@livewireScripts