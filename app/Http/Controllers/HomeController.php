<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\User;
use App\Http\Requests;
use App\Models\Product as ProductModel;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home', ['products' => ProductModel::all()]);
    }

    public function search()
    {
        $category = ProductModel::join('category', 'product.id', 'category.id')
                                ->get('category.category_name', 'category.id');

        return view('search', ['products' => ProductModel::all(), 'category' => $category]);
    }
}
