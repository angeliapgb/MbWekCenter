<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User as UserModel;

class PageController extends Controller
{
    public function profile() {
        return view('profile');
    }

    public function updateProfile(Request $request) {
        UserModel::where('id', '=', $request->id)
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

    public function transaction() {
        return view('transaction');
    }

    public function cart() {
        return view('cart');
    }

    public function insert() {
        return view('insert');
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
