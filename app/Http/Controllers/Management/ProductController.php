<?php

namespace App\Http\Controllers\Management;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;

class ProductController extends Controller
{   
    private $product,$category;
    public function __construct(Product $product,Category $category)
    {
        $this->product = $product;
        $this->category = $category;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = "Products - Spot";//Titulo Dinâmico

        $products = $this->product->all(); //Produtos
     

        return view('management.products.index',compact('products','title'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = "Criar Produto - Spot";//Titulo Dinâmico
        //dando pluck no categories para o select
        $categories = $this->category->pluck('name','cod_category');
        return view('management.products.create',compact('title','categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {   
        
          //passando dados para o array afim de evitar um injection via formulario
        $data = [
            'name'=>$request->name,
            'description'=>$request->description,
            'price'=>$request->price,
            'cod_category'=>$request->cod_category,
        ];
        //criando novo produto
        $response = $this->product->create($data);

          //validação
          if($response)
          return redirect()->route('products.index');
            else
          return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         //Buscando produto
         $product = $this->product->where('cod_product',$id)->get()->first();

         //se nao existir redireciona de volta
         if(!$product)
             return redirect()->back();
 
         $title = " Ver produto - Spot";//Titulo dinâmico
         

        
         return view('management.products.show',compact('title','product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
          //Buscando produto
          $product = $this->product->where('cod_product',$id)->get()->first();

          //se nao existir redireciona de volta
          if(!$product)
              return redirect()->back();

              $title = " Editar product - Spot";//Titulo dinâmico
              $categories = $this->category->pluck('name','cod_category');
       
          return view('management.products.edit',compact('title','product','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, $id)
    {
        //Buscando produto
        $product = $this->product->where('cod_category',$id)->get()->first();
        
        //se nao existir redireciona de volta
        if(!$product)
          return redirect()->back();
      
      //passando dados para o array afim de evitar um injection via formulario
        $data = [
            'name'=>$request->name,
            'description'=>$request->description,
            'price'=>$request->price,
            'cod_category'=>$request->cod_category,
        ];
      //criação de novo produto
      $response = $product->update($data);
      //validação
      if($response)
          return redirect()->route('products.index');
      else
          return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         //Buscando produto
         $product = $this->product->where('cod_product',$id)->get()->first();
     
         //se nao existir redireciona de volta
         if(!$product)
            return redirect()->back();
         
      $response = $product->delete();

      if($response)
      return redirect()->route('products.index');
      else
      return redirect()->back();
    }
}
