<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User as UserModel;
use App\Models\Product as ProductModel;
use App\Models\Category as CategoryModel;
use App\Models\DetailTransaction as DetailTransactionModel;
use App\Models\Transaction as TransactionModel;

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
                                ->get(['product.id', 'product.title', 'product.image', 'product.description', 'product.stock', 'product.price']);;

        return view('detailproduct', ['details' => $detail]);
    }

    public function cartInput(Request $request) {
        DetailTransactionModel::create([
            'product_id' => $request->product_id,
            'user_id' => $request->user_id,
            'quantity' => $request->quantity,
        ]);
        return redirect('cart');
    }

    public function transaction() {
        $data = TransactionModel::all();
        return view('transaction', compact('data'));
    }

    public function checkout(Request $request) {
        TransactionModel::create([
            'detail_transaction_id' => $request->id
        ]);
        return redirect('transaction');
    }

    public function detail($id) {
        $data = TransactionModel::join('detail_transaction', 'detail_transaction.id', 'transaction.detail_transaction_id')
                                ->join('product', 'product.id', 'detail_transaction.product_id')
                                ->where('transaction.id', $id)
                                ->get(['product.title', 'product.description', 'product.price', 'detail_transaction.quantity', 'detail_transaction.id']);
        return view('detailtransaction', compact('data'));
    }

    public function cart() {
        $cart = DetailTransactionModel::join('users', 'users.id', 'detail_transaction.user_id')
                                ->join('product', 'product.id', 'detail_transaction.product_id')
                                ->where('user_id', auth()->user()->id)
                                ->get(['product.title', 'product.price', 'detail_transaction.quantity', 'detail_transaction.id']);
        return view('cart', compact('cart'));
    }

    public function cartDelete($id) {
        DetailTransactionModel::where('id', $id)
                            ->delete();
        return redirect('cart');
    }

    public function insert() {
        $categories = CategoryModel::all();
        return view('insert', compact('categories'));
    }

    public function insertProduct(Request $request) {
        $products = ProductModel::create([
            'category_id' => $request->category,
            'title' => $request->title,
            'description' => $request->description,
            'price' => $request->price,
            'stock' => $request->stock,
            'image' => $request->image,
        ]);
        return redirect('insert');
    }

    public function update($title) {
        $detail = ProductModel::where('product.title', $title)
                                ->first();
        $categories = CategoryModel::all();
        return view('update', compact(['detail', 'categories']));
    }

    public function updateProduct(Request $request) {
        $products = ProductModel::where('id', $request->product_id)
                        ->update([
                            'category_id' => $request->category,
                            'title' => $request->title,
                            'description' => $request->description,
                            'price' => $request->price,
                            'stock' => $request->stock,
                            'image' => $request->image,
                        ]);
        return redirect('home');
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
