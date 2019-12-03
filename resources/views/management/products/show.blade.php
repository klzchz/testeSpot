@extends('adminlte::page')

@section('title', " {$title}")

@section('content_header')
    
@stop

@section('content') 
<h3><b>Name: </b> {{$product->name}}</h3>
<h3><b>Price: </b> {{$product->price}}</h3>
<h3><b>Categoria: </b> {{$product->category->name}}</h3>
<h3><b>Description: </b> {{$product->description}}</h3>

<hr>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
<script>
  $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });
  });
</script>
@stop