@extends('adminlte::page')

@section('title', 'Spot -Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content') 

<div class="row">


    <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>{{$user->count()}}</h3>

                <p>Usuarios Cadastrados</p>
              </div>
              <div class="icon">
                <i class="fa fa-users"></i>
              </div>
              <a href="{{route('users.index')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>

          <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>{{$product->count()}}</h3>

                <p>Produtos Cadastrados</p>
              </div>
              <div class="icon">
                <i class="fa fa-gift"></i>
              </div>
              <a href="{{route('products.index')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>

          <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>{{$category->count()}}</h3>

                <p>Categorias Cadastrados</p>
              </div>
              <div class="icon">
                <i class="fa fa-boxes"></i>
              </div>
              <a href="{{route('categories.index')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>

        </div><!--Row -->
    </div><!--Container -->
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop