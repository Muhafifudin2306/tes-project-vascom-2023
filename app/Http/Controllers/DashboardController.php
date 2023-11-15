<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $totalUsers = User::count();
        $activeUsers = User::where('status', 'active')->count();
        $totalProducts = Product::count();
        $activeProducts = Product::where('status', 'active')->count();

        $latestProducts = Product::latest('updated_at')->take(10)->get();

        return view('home', compact('totalUsers', 'activeUsers', 'totalProducts', 'activeProducts', 'latestProducts'));
    }
    public function account()
    {
        $users = DB::table('users')->orderBy('updated_at', 'desc')->get();
        return view('account', compact('users'));
    }

    public function updateUser(Request $request, $id)
    {
        $user = User::find($id);

        $user->update([
            'status' => $request->input('status')
        ]);
        return redirect('/account');
    }

    public function product()
    {
        $products = Product::latest('updated_at')->get();
        return view('product', compact('products'));
    }

}
