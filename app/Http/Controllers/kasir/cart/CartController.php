<?php

namespace App\Http\Controllers\kasir\cart;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Cart;
use Auth;
use DB;
// use \stdClass;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userid =  Auth::id();
        $user =  Auth::user();
        // dd($user);
        return response()->json([
            'pesanan' => DB::table('carts')
            ->where(['user_id'=>$userid])
            ->select(['carts.id','products.name as product_name','carts.qty','products.price','users.name as user_name'])
            ->join('users','users.id','=','carts.user_id')
            ->join('products','products.id','=','carts.product_id')
            ->get()
            ]);  
            
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $userid = Auth::id();
        $menuid = $request->idmenu;
        $carts = new Cart;
        $qty =1;
        if (Cart::where(['user_id'=>$userid,'product_id'=>$menuid])->get()->count()>0) 
         {
            $updateqty = Cart::where(['user_id'=>$userid,'product_id'=>$menuid])->first();
            $updateqty->qty = $updateqty->qty+1;
            $updateqty->save();
        }
        else
        {
            $carts->user_id = $userid;
            $carts->product_id = $menuid;
            $carts->qty = $qty;
            $carts->save();
        }

        return response()->json([
            'data' => DB::table('carts')
            ->select('carts.id')
            ->join('users','users.id','=','carts.user_id')
            ->join('products','products.id','=','carts.product_id')
            ->get()
        ]); 
        // $count = Cart::count();
        //  dd($count);
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
    public function update(Request $request, $id)
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
        dd($id);
    }
}
