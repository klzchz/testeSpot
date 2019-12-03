@extends('adminlte::page')

@section('title', " {$title}")

@section('content_header')
    <h1>Categoria {{$category->name}}</h1>
@stop

@section('content') 
<h3><b>Name: </b> {{$category->name}}</h3>
<h3><b>description: </b> {{$category->description}}</h3>
<hr>
<div class="card-body">
   <div id="example1_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
      <div class="row">
         <div class="col-sm-12 col-md-6">
            <div class="dataTables_length" id="example1_length">
               <label>
                  Mostrar 
                  <select name="example1_length" aria-controls="example1" class="form-control form-control-sm">
                     <option value="10">10</option>
                     <option value="25">25</option>
                     <option value="50">50</option>
                     <option value="100">100</option>
                  </select>
                  entries
               </label>
            </div>
         </div>
         <div class="col-sm-12 col-md-6">
            <div id="example1_filter" class="dataTables_filter"><label>Pesquisar:<input type="search" class="form-control form-control-sm" placeholder="" aria-controls="example1"></label></div>
         </div>
      </div>
      <div class="row">
         <div class="col-sm-12">
            <table id="example1" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
               <thead>
                  <tr role="row">
                  <th rowspan="1" colspan="1">Name </th>
                  <th rowspan="1" colspan="1">Description</th>
                  <th rowspan="1" colspan="1">Price</th>
              

                    
                  </tr>
               </thead>
               <tbody>
            
                  @forelse($products as $product)
                    <tr>
                        <td>{{$product->name}}</td>
                        <td>{{$product->description}}</td>
                        <td>{{$product->price}}</td>
                     
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
        

                    
                  </tr>
               </tfoot>
            </table>
         </div>
      </div>
      <div class="row">
         <div class="col-sm-12 col-md-5">
            <div class="dataTables_info" id="example1_info" role="status" aria-live="polite">Showing 0 to 0 of 0 entries (filtered from 57 total entries)</div>
         </div>
         <div class="col-sm-12 col-md-7">
            <div class="dataTables_paginate paging_simple_numbers" id="example1_paginate">
               <ul class="pagination">
                  <li class="paginate_button page-item previous disabled" id="example1_previous"><a href="#" aria-controls="example1" data-dt-idx="0" tabindex="0" class="page-link">Previous</a></li>
                  <li class="paginate_button page-item next disabled" id="example1_next"><a href="#" aria-controls="example1" data-dt-idx="1" tabindex="0" class="page-link">Next</a></li>
               </ul>
            </div>
         </div>
      </div>
   </div>
</div>
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