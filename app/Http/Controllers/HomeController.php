<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\DB;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function landingPage()
    {
        $products = DB::table('products')->orderBy('updated_at', 'desc')->take(8)->get();

        $latest_products = Product::latest('updated_at')->take(7)->get();

        return view('landingPage', compact('latest_products', 'products'));
    }

   public function loadMore(Request $request)
   {
       $offset = $request->input('offset');
       $limit = 4;
   
       $products = DB::table('products')->orderBy('updated_at', 'desc')->skip($offset)->take($limit)->get();
   
       if ($products->isEmpty()) {
           return response()->json(['end' => true]);
       }
        return view('loadmore', compact('products'));
    }
    
}
