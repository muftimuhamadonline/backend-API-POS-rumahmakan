<?php

namespace App\Http\Controllers\kasir\order;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use DB;
use App\Order;
use App\Orderdetail;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('kasir.orders.orderlist');
    }

    public function datacart(){
        $userid =  Auth::id();
        return dd(
         response()->json([
            'pesanan' => DB::table('carts')
            ->where(['user_id'=>$userid])
            ->select(['carts.id','products.name','carts.qty','products.price'])
            ->join('users','users.id','=','carts.user_id')
            ->join('products','products.id','=','carts.product_id')
            ->get()
        ])
     );
    }

    public function payment(Request $request)
    {
     $request->validate([
        'pemesan' => 'required',
        'nomeja' => 'required',
        'total' => 'required',
        'dibayar' => 'required',
        'kembalian' => 'required',
    ]);
     //insert form order into orders
     $order = new Order;
     $order->user_id = Auth::id();
     $order->pemesan = $request->pemesan;
     $order->nomeja = $request->nomeja;
     $order->total = $request->total;
     $order->dibayar = $request->dibayar;
     $order->kembalian = $request->kembalian;
     $cekcart = DB::table('carts')->count(); 
     // dd($cekcart);
     if($cekcart>0)
     {
        $order->save();
    }
     //get data cart by user_id/Auth and then insert into orderdetails
    $carts = DB::table('carts')->where('user_id',Auth::id())->get();
    foreach($carts as $cart)
    {   
        $orderdetail = new Orderdetail;
        $orderdetail->order_id = $order->id;
        $orderdetail->product_id = $cart->product_id;
        $orderdetail->qty = $cart->qty;
        $orderdetail->save();
    }
    $cart = DB::table('carts')->where('user_id',Auth::id());
    $cart->delete();
       // dd($orderdetail); 
        // return response()->json($orderdetail);  
    $request->session()->flash('formorder', 'Pembayaran berhasil !');
}

public function getdataorder()
{
    // $orderdetails = DB::table('orderdetails')
    // ->select(
    //     [
    //             // 'users.name as caseername',
    //         'orderdetails.id',
    //         'users.name as caseername',
    //         'orders.pemesan',
    //         'products.name',
    //         'orderdetails.qty',
    //         'orders.nomeja',
    //         'orders.total',
    //         'orders.dibayar',
    //         'orders.kembalian',
    //         'orders.created_at'
    //     ])
    // ->join('orders','orders.id','=','orderdetails.order_id')
    // ->join('users','users.id','=','orders.user_id')
    // ->join('products','products.id','=','orderdetails.product_id')
    // ->where('user_id',Auth::id())
    // ->orderBy('created_at','desc')
    // ->get();
    // return response()->json([
    //     'orders' => $orderdetails 
    // ]);
    $orderbyid = DB::table('orders')
    ->select([
        'orders.id',
        'users.name as caseername',
        'orders.pemesan',
        'orders.nomeja',
        'orders.total',
        'orders.dibayar',
        'orders.kembalian',
        'orders.created_at',
    ])
    ->join('users','users.id','=','orders.user_id')
    ->where([
        'user_id'=>Auth::id()
    ])
    ->orderBy('created_at','desc')
    ->get();
    return response()->json([
        "order" => $orderbyid
    ]);

}

public function show($id)
{

    $orderdetails = DB::table('orderdetails')
    ->select(
        [
           'orders.id',
           'users.name as caseername',
           'orders.pemesan',
           'orders.nomeja',
           'orders.total',
           'orders.dibayar',
           'orders.kembalian',
           'products.name as pesanan',
           'products.price',
           'orderdetails.qty',
           'orders.created_at'
       ]
   )
    ->join('orders','orders.id','=','orderdetails.order_id')
    ->join('users','users.id','=','orders.user_id')
    ->join('products','products.id','=','orderdetails.product_id')
    ->where('order_id',$id)->get();
    return response()->json([
        "orderdetails" => $orderdetails
    ]);
}

}
