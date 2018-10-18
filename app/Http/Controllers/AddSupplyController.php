<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
        //
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
        
        /*
        foreach($products as $product)
        {
            
            $supply = 0;
            $buying= 0;

            $addsupply = AddSupply::where('product_id', $product->id)->get();
            $buyingtrans = BuyingTransaction::where('product_id', 3)->get();

            foreach($addsupply as $sup)
            {
                $supply = (float)$supply + (float)$sup->quantity;
            }
            
            foreach($buyingtrans as $buy)
            {
                $buying = (float)$buying + (float)$buy->quantity;
            }
            
            $available_supply = $supply - $buying;
            

            if(is_numeric($available_supply))
            {
                $product->supply = $available_supply;
            }
            else
            {
                $product->supply = 0;
            } 
        }*/

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
