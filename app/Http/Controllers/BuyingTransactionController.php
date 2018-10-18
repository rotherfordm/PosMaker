<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

use App\BuyingTransaction;
use App\Product;
use App\PointOfSale;
class BuyingTransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('buyingtransactions.show');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         #Get all Products in the cart
         $products = array();
         for($x = 1; Input::get('cartproduct'.$x) !== null ; $x++){
             array_push($products, 
                array(
                     'Name' => Input::get('cartproduct'.$x),
                     'Quantity' => Input::get('cartproduct'.$x.'amount')));
         }

         foreach($products as $product)
         {
             #Create buying transaction Object        
             $buyingtransaction = new BuyingTransaction;
             $buyingtransaction->product_id = $product['Name'];
             $buyingtransaction->quantity =  $product['Quantity'];
             $buyingtransaction->save();
         } 

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $point_of_sale = PointOfSale::find($id);
        $products = Product::where('pos_id',$id)->get();
        return view('buyingtransactions.show')->with('point_of_sale',$point_of_sale)->with('products',$products);
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
        //
    }
}
