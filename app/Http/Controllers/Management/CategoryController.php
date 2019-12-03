<?php

namespace App\Http\Controllers\Management;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;

class CategoryController extends Controller
{   
    private $category;
    public function __construct(Category $category)
    {   
        //Usei esse objeto como atributo dessa classe para
        //usar nos metodos dessa classe sem atribuir um novo objeto
        $this->category = $category;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = "Categoria - Spot";//Titulo dinâmico

        $categories = $this->category->all();//Pegando todas as categorias
        
        return view('management.categories.index',compact('categories','title'));//retornando para view
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $title = "Criar Categoria";//Titulo dinâmico
        return view('management.categories.create',compact('title'));//retornando view
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
        //passando dados para o array afim de evitar um injection
        $data = [
            'name'=>$request->name,
            'description'=>$request->description
        ];
        //criação de nova categoria
        $response = $this->category->create($data);
        //validação
        if($response)
            return redirect()->route('categories.index');
        else
            return redirect()->withErrors('Falha ao cadastrar categoria')->back();
        

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {   
        //Buscando Categoria
        $category = $this->category->with(['products'])->where('cod_category',$id)->get()->first();

        //se nao existir redireciona de volta
        if(!$category)
            return redirect()->back();

        $title = " Ver categoria - Spot";//Titulo dinâmico
        
        //buscando produtos da categoria
        $products = $category->products()->get();
       
        return view('management.categories.show',compact('title','category','products'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
          //Buscando Categoria
          $category = $this->category->where('cod_category',$id)->get()->first();

          //se nao existir redireciona de volta
          if(!$category)
              return redirect()->back();

              $title = " Editar categoria - Spot";//Titulo dinâmico
        
       
          return view('management.categories.edit',compact('title','category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryRequest $request, $id)
    {
          //Buscando Categoria
          $category = $this->category->where('cod_category',$id)->get()->first();
        
          //se nao existir redireciona de volta
          if(!$category)
            return redirect()->back();
        
        //passando dados para o array afim de evitar um injection via formulario
        $data = [
            'name'=>$request->name,
            'description'=>$request->description
        ];
        //criação de nova categoria
        $response = $category->update($data);
        //validação
        if($response)
            return redirect()->route('categories.index');
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
        
        //Buscando Categoria
        $category = $this->category->where('cod_category',$id)->get()->first();
     
          //se nao existir redireciona de volta
          if(!$category)
             return redirect()->back();
          
       $response = $category->delete();

       if($response)
       return redirect()->route('categories.index');
       else
       return redirect()->back();
    }
}
