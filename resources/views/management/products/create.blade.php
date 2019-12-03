@extends('adminlte::page')

@section('title', " {$title}")

@section('content_header')
    <h1>Cadastrar Produto</h1>
@stop

@section('content') 
<div class="container">
    


{{Form::open(['route'=>'products.store','method'=>'post'])}}
    @include('management.products._form')


    <button type="submit" class="btn btn-primary btn-block">Enviar</button>

{{Form::close()}}
</div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')

@stop