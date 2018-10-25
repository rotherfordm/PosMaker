<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

use App\Product;
use App\Attribute;
use App\PointOfSale;
use App\AddSupply;
use App\BuyingTransaction;

class AddSupplyController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
          #Get all addsupply
          #print_r($request->all());
          
          $products = array();
          for($x = 1; $request->input('productid'.$x) !== null ; $x++){
              array_push($products, 
                    array(
                        "ProductID" => Input::get('productid'.$x),
                        "Supply" => Input::get('supplyq'.$x)
                    ));
          }

            foreach($products as $product)
            {
                $addsupply = new AddSupply;
                $addsupply->quantity = $product['Supply'];
                $addsupply->product_id = $product['ProductID'];
                $addsupply->save();
            }

        $pos = PointOfSale::where('user_id', auth()->user()->id)->get();
        return view('pointsofsale.index')->with('points_of_sale',$pos);
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
        
        $i = 1;
        foreach($products as $product)
        {
            $product->count = $i;
            $i++;
        }

        return view('addsupply.show')->with('point_of_sale',$point_of_sale)->with('products',$products);
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
