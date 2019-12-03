@extends('adminlte::page')

@section('title', " {$title}")

@section('content_header')
    <h1>Editar Produto</h1>
@stop

@section('content') 
<div class="container">
    


{{Form::model($product,['route'=>['products.update',$product->cod_product],'method'=>'put'])}}
    @include('management.products._form')


    <button type="submit" class="btn btn-primary btn-block">Salvar</button>

{{Form::close()}}
</div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')

@stop