<?php

namespace App\Http\Controllers\admin\product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Product;
use App\Category;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = DB::table('products')
            ->join('categorys', 'categorys.id', '=', 'products.category_id')
            ->get();
        // dd($products);
        $categorys = DB::table('categorys')->get();
        return view('admin.product.productlist',compact('products','categorys'));
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
          // dd($request->all());
          $filename = $request->file('image')->getClientOriginalName();
          // dd($filename);
          $getfilename = pathinfo($filename, PATHINFO_FILENAME);
          $fileext = $request->file('image')->getClientOriginalExtension();
          $namefix = $getfilename."_".time().".".$fileext;
          $storepath = $request->file('image')->storeAs('public/image',$namefix);
         
          $products = new Product;

          $products->name = $request->name;
          $products->stock = $request->stock;
          $products->category_id = $request->category;
          $products->price = $request->price;
          $products->description = $request->description;
          $products->image = $storepath;

          if($products->save()) return redirect('dashboard/product');
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
        
    }
}
