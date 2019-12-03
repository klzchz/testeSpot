@extends('adminlte::page')

@section('title', " {$title}")

@section('content_header')
    <h1>Cadastrar Categoria</h1>
@stop

@section('content') 
<div class="container">
    


{{Form::open(['route'=>'categories.store','method'=>'post'])}}
    @include('management.categories._form')


    <button type="submit" class="btn btn-primary btn-block">Enviar</button>

{{Form::close()}}
</div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')

@stop