<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    private $user,$product,$category;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Product $product, Category $category, User $user)
    {
        $this->middleware('auth');
        $this->user =$user;
        $this->category = $category;
        $this->product = $product;
    
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {   
        $user= $this->user;
        $category = $this->category;
        $product = $this->product;
        return view('home',compact('user','category','product'));
    }
}
