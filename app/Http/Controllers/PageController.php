<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User as UserModel;
use App\Models\Product as ProductModel;
use App\Models\Category as CategoryModel;

class PageController extends Controller
{
    public function search() {
        return view('search');
    }

    public function profile() {
        return view('profile');
    }

    public function updateProfile(Request $request) {
        UserModel::where('id', '=', $request->id)
                    ->validate($request, [
                        'name' => 'required|max:30',
                        'password' => 'required|min:8',
                        'gender' => 'required',
                    ])
                    ->update([
                        'name' => $request->name,
                        'password' => $request->password,
                        'gender' => $request->gender,
                    ]);
        return redirect('profile');
    }

    // public function update(Request $request, $id) {
    //     $users = User::all();
    //     $users = DB::table('users')
    //     ->where('id',$request->id)
    //     ->update([
    //         'name' => $request->name,
    //         'password' => $request->password,
    //         'gender' => $request->gender,
    //     ]);

    //     return view('profile', compact('users'));
    // }

    public function searchProduct(){
        $query = request('search_query');
        $query2 = request('category');
        $products = ProductModel::join('category', 'category.id', 'product.category_id')
                                ->where('title', 'like', '%' . request('search_query') . '%')
                                ->where('category_name', $query2)
                                ->get();

        return view('products', ['products' => $products]);
    }

    public function viewCategory($id){
        $category = CategoryModel::where('category.id', $id)->first();

        return view('products', ['products' => $category->products]);
    }

    public function productdetail($title){
        $detail = ProductModel::where('product.title', $title)
                                ->get(['product.title', 'product.image', 'product.description', 'product.stock', 'product.price']);;

        return view('detailproduct', ['details' => $detail]);
    }

    public function transaction() {
        return view('transaction');
    }

    public function cart() {
        return view('cart');
    }

    public function insert() {
        $categories = CategoryModel::all();
        return view('insert', compact('categories'));
    }

    public function insertProduct(Request $request) {
        // $products = ProductModel::join('category', 'category.id', 'product.category_id')
        //     ->where(['product.category_id' => 'category.id'])
        //     ->get();
        $products = ProductModel::create([
            'category_id' => $request->category,
            'title' => $request->title,
            'description' => $request->description,
            'price' => $request->price,
            'stock' => $request->stock,
            'image' => $request->image,
            // 'id' => 1,
        ]);
        return redirect('insert');
    }

    public function update() {
        return view('update');
    }

    public function manage() {
        $data = UserModel::all();
        return view('manage', compact('data'));
    }

    public function deleteUser(Request $request) {
        UserModel::where('id', '=', $request->id)
                ->delete();
        return redirect('manage');
    }
}
