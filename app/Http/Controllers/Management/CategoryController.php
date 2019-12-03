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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
