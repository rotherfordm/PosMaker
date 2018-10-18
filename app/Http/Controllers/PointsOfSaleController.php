<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Attribute;
use App\PointOfSale;

class PointsOfSaleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        #$pos = POS::orderBy('created_at','desc')->paginate(10); //pagination   
        return view('pointsofsale.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pointsofsale.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /*
        $this->validate($request, [
            'pos_name' => 'required',
            'description' => 'required',
            'cover_image' => 'image|nullable|max:1999|required'
        ]); */

        //Cover Image upload
        if($request->hasFile('cover_image')){
            $filenameWithExt = $request->file('cover_image')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('cover_image')->getClientOriginalExtension();
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            $path = $request->file('cover_image')->storeAs('public/cover_images', $fileNameToStore);
        }else{
            $fileNameToStore = 'noimage.jpg';
        }

        #Create POS Object        
        $pos = new PointOfSale;
        $pos->name = $request->input('pos_name');
        $pos->description = $request->input('description');
        $pos->cover_image = $fileNameToStore;
        $pos->user_id = auth()->user()->id;
        $pos->save();

        #Get all Product Names
        $products = array();
        for($x = 0; $request->input('product'.$x) !== null ; $x++){
            array_push($products, $request->input('product'.$x));
        }

        for($i = 0; $i < count($products); $i++){
            $product = new Product; //Create Product Object
            $product->name = $products[$i]; //Product Name
            $product->pos_id = $pos->id;
            $product->save();

            for($x = 0; $x < 20; $x++){ //20 attributes max?
                #Create Attributes
                if($request->input('product'.$i.'a'.$x.'name') != '' 
                && $request->input('product'.$i.'a'.$x.'value') != ''){
                    $attribute = new Attribute;
                    $attribute->name = $request->input('product'.$i.'a'.$x.'name');
                    $attribute->value = $request->input('product'.$i.'a'.$x.'value');
                    $attribute->product_id = $product->id;
                    $attribute->save();  
                }
            }
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
        

        $new_products = array();
        foreach($products as $product)
        {
            $new_products[] = array("ProductName" =>  $product->name, "Attributes" => Attribute::where('product_id', $product->id)->get());
        }
        /*
        foreach($new_products as $new_product)
        {
            print_r($new_product['ProductName']);
            foreach($new_product['Attributes'] as $attribute)
            {
                print_r($attribute->name);
            }
        } */
        return view('pointsofsale.show')->with('point_of_sale', $point_of_sale)->with('products',  $new_products);
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
