<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User as UserModel;
use App\Models\Product as ProductModel;
use App\Models\Category as CategoryModel;
use App\Models\DetailTransaction as DetailTransactionModel;
use App\Models\Transaction as TransactionModel;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class PageController extends Controller
{
    public function search() {
        $products = ProductModel::simplePaginate(6);
        return view('search', compact('products'));
    }

    public function profile() {
        return view('profile');
    }

    public function updateProfile(Request $request) {
        $user = $request->validate([
            'name' => 'required|max:30',
            'password' => 'required|min:8|confirmed',
            'gender' => 'sometimes|required',
        ]);

        UserModel::where('id', '=', $request->id)
                    ->update([
                        'name' => $request->name,
                        'password' => Hash::make($request['password']),
                        'gender' => $request->gender,
                    ]);
                    
        return redirect('profile');
    }

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
        $stock = ProductModel::where('id', $request->product_id)
                            ->get('product.stock');
        foreach($stock as $stock) {
            $max = $stock->stock;
        }
        
        $cartValidation = $request->validate([
            'quantity' => ['required', 'gte:1', 'lte:' .$max]
        ]);                   
        $transaction = TransactionModel::latest('created_at')->first();

        // dd($transaction);

        // , 'max:' .$stock, 
        // dd($cartValidation);
        // TransactionModel::create([]);
        // $transaction += 1;

        DetailTransactionModel::create([
            'transaction_id' => $transaction->id,
            'product_id' => $request->product_id,
            'user_id' => $request->user_id,
            'quantity' => $request->quantity,
        ]);

        return redirect('cart');
    }

    public function transaction() {
        $transaction = TransactionModel::latest('created_at')->first();
        $data = TransactionModel::where('id', '!=', $transaction->id)
                                ->get();
        return view('transaction', compact('data'));
    }

    public function checkout(Request $request) {
        $products = DetailTransactionModel::join('users', 'users.id', 'detail_transaction.user_id')
                                        ->where('user_id', '=', auth()->user()->id)
                                        ->get('detail_transaction.id');
        // $checkout = array();
        // foreach($products as $p) {
        //     if(!empty($p)) {
        //         $checkout[] = [
        //             $products,
        //         ];
        //     }
        // }
        // TransactionModel::create(array(
        // ));
        TransactionModel::create();
        return redirect('transaction');
    }

    public function detail($id) {
        $data = DetailTransactionModel::join('transaction', 'transaction.id', 'detail_transaction.transaction_id')
                                ->join('product', 'product.id', 'detail_transaction.product_id')
                                ->where('detail_transaction.transaction_id', $id)
                                ->get(['product.title', 'product.description', 'product.price', 'detail_transaction.quantity', 'detail_transaction.id']);
        return view('detailtransaction', compact('data'));
    }

    public function cart() {
        $transaction = TransactionModel::latest('created_at')->first();

        $cart = DetailTransactionModel::join('users', 'users.id', 'detail_transaction.user_id')
                                ->join('product', 'product.id', 'detail_transaction.product_id')
                                ->join('transaction', 'transaction.id', 'detail_transaction.transaction_id')
                                ->where('user_id', '=', auth()->user()->id)
                                ->where('transaction_id', $transaction->id)
                                ->get(['product.title', 'product.price', 'detail_transaction.quantity', 'detail_transaction.id']);

        $products = DetailTransactionModel::join('users', 'users.id', 'detail_transaction.user_id')
                                ->where('user_id', '=', auth()->user()->id)
                                ->get('detail_transaction.id');
        return view('cart', compact('cart', 'products', 'transaction'));
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

        $products = $request->validate([
            'title' => ['required', 'min:5', 'max:25'],
            'description' => ['required', 'min:10', 'max:100'],
            'price' => ['required', 'min:1000', 'max:10000000', 'numeric'],
            'stock' => ['required', 'min:1', 'numeric'],
        ]);

        $products['category_id'] = $request->category;

        $image =  $request->file('image');
        $name = time() . '.' . $image->getClientOriginalExtension();;
        $location = 'images/' . $name;
        Storage::putFileAs('public/images', $image, $name);
        $products['image'] = $location;

        ProductModel::create($products);

        return redirect('insert');
    }

    public function update($title) {
        $detail = ProductModel::where('product.title', $title)
                                ->first();
        $categories = CategoryModel::all();
        return view('update', compact(['detail', 'categories']));
    }

    public function updateProduct(Request $request) {
        if($request->hasFile('image')){
            $filename = $request->image->getClientOriginalName();
            $request->image->storeAs('images',$filename,'public');
            ProductModel::where('id', $request->product_id)
                        ->update(['image'=>$filename]);
        }

        $products = $request->validate([
            'title' => ['required', 'min:5', 'max:25'],
            'description' => ['required', 'min:10', 'max:100'],
            'price' => ['required', 'min:1000', 'max:10000000', 'numeric'],
            'stock' => ['required', 'min:1', 'numeric'],
        ]);

        ProductModel::where('id', $request->product_id)
                        ->update($products);

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
