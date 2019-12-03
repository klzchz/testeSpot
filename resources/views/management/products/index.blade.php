@extends('adminlte::page')

@section('title', " {$title}")

@section('content_header')
    <h1>Produtos</h1>
@stop

@section('content') 
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.css">
<a href="{{route('products.create')}}" class="btn btn-primary">
    Cadastrar
</a>
<div class="card-body">
   <div id="example1_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">

       
      </div>
      <div class="row">
         <div class="col-sm-12">
            <table id="example1" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
               <thead>
                  <tr role="row">
                  <th rowspan="1" colspan="1">Name </th>
                  <th rowspan="1" colspan="1">Description</th>
                  <th rowspan="1" colspan="1">Price</th>
                  <th rowspan="1" colspan="1">Categoria</th>
                  <th rowspan="1" colspan="1">Action</th>

                    
                  </tr>
               </thead>
               <tbody>
            
                  @forelse($products as $product)
                    <tr>
                         <td>{{$product->name}}</td> 
                         <td>{{$product->description}}</td>
                        <td>{{$product->price}}</td> 
                        <td>{{$product->category->name}}</td>
                        
                        <td>
                            <a  class="mr-2" href="{{route('products.show',$product->cod_product)}}"> <i style="color:green;" class="fa fa-eye"></i></a>
                            <a  href="{{route('products.edit',$product->cod_product)}}"> <i style="color:blue;" class="fa fa-edit"></i></a>
                            <a class="ml-2" href="{{route('products.destroy',$product->cod_product)}}"> <i style="color:red;" class="fa fa-trash"></i></a>
                        </td>
                      
                    </tr>
                    @empty
                        <tr class="odd">
                            <td valign="top" colspan="5" class="dataTables_empty">No matching records found</td>
                        </tr>
                    @endforelse
                
                
               </tbody>
               <tfoot>
                  <tr>
                  <th rowspan="1" colspan="1">Name </th>
                  <th rowspan="1" colspan="1">Description</th>
                  <th rowspan="1" colspan="1">Price</th>
                  <th rowspan="1" colspan="1">Categoria</th>
                  <th rowspan="1" colspan="1">Action</th>

                    
                  </tr>
               </tfoot>
            </table>
         </div>
      </div>
      
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.js"></script>
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